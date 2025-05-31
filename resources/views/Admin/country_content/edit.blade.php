@extends('admin.layout')

@section('content')
<div class="container my-4">
    <h2 class="mb-4">Edit Country Content</h2>

    <form action="{{ route('admin.country_content.update', $content->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="country_id" class="form-label">Choose Country</label>
                <select name="country_id" class="form-select" required>
                    <option value="">Select Country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}" {{ $content->country_id == $country->id ? 'selected' : '' }}>
                            {{ $country->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label for="section_id" class="form-label">Section ID</label>
                <input type="text" name="section_id" value="{{ $content->section_id }}" class="form-control" required>
            </div>

            <div class="col-md-3">
                <label for="side_nav_link_name" class="form-label">Side Nav Link Name</label>
                <input type="text" name="side_nav_link_name" value="{{ $content->side_nav_link_name }}" class="form-control" required>
            </div>
        </div>

        <div class="mb-4">
            <label for="title" class="form-label">General Section Title</label>
            <input type="text" name="title" value="{{ $content->title }}" class="form-control" required>
        </div>

        <h4 class="mb-3">Content Blocks</h4>
        <div id="blocks-container">
            @foreach ($content->blocks as $index => $block)
                <div class="card mb-3 block-wrapper" id="block-{{ $block->id }}" data-index="{{ $index }}">
                    <div class="card-body">
                        <input type="hidden" name="blocks[{{ $index }}][id]" value="{{ $block->id }}">

                        <div class="row align-items-center mb-3">
                            <div class="col-md-4">
                                <label class="form-label">Content Type</label>
                                <select name="blocks[{{ $index }}][type]" class="form-select" onchange="handleBlockTypeChange(this, {{ $index }})" required>
                                    <option value="">Choose Type</option>
                                    <option value="title" {{ $block->type == 'title' ? 'selected' : '' }}>Title</option>
                                    <option value="paragraph" {{ $block->type == 'paragraph' ? 'selected' : '' }}>Paragraph</option>
                                    <option value="image" {{ $block->type == 'image' ? 'selected' : '' }}>Image</option>
                                    <option value="video" {{ $block->type == 'video' ? 'selected' : '' }}>Video</option>
                                </select>
                            </div>
                            <div class="col-md-6" id="block-input-{{ $index }}">
                                @if ($block->type === 'title' || $block->type === 'video')
                                    <input type="text" name="blocks[{{ $index }}][content]" class="form-control" value="{{ $block->content }}" required>
                                @elseif ($block->type === 'paragraph')
                                    <textarea name="blocks[{{ $index }}][content]" class="form-control" rows="3" required>{{ $block->content }}</textarea>
                                @elseif ($block->type === 'image')
                                    <div>
                                        @if ($block->media_path)
                                            <div id="image-block-{{ $block->id }}" class="mb-2">
                                                <img src="{{ asset('storage/' . $block->media_path) }}" style="max-width: 150px;" class="img-thumbnail mb-2">
                                                
                                            </div>
                                        @endif
                                        <input type="file" name="blocks[{{ $index }}][media]" class="form-control" accept="image/*">
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-2 text-end">
                                <button type="button" class="btn btn-sm btn-danger mt-4" onclick="removeBlock(this)" data-id="{{ $block->id }}">
                                    Remove
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button type="button" class="btn btn-outline-primary" onclick="addBlock()">+ Add Block</button>

        <div class="mt-4">
            <button type="submit" class="btn btn-success">Update Content</button>
        </div>

        <div id="confirm-modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(0,0,0,0.6); z-index:1000;">
    <div style="background:white; padding:20px; border-radius:8px; width:300px; max-width:90%; margin:150px auto; text-align:center;">
        <p id="confirm-message">Are you sure you want to delete this block?</p>
        <button id="confirm-yes" style="margin-right:10px;">Yes</button>
        <button id="confirm-no">Cancel</button>
    </div>
</div>
    </form>
<script>
    function removeImage(blockId) {
    if (confirm('Are you sure you want to delete this image?')) {
        fetch(`/admin/block/${blockId}/remove-image`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'Image deleted successfully') {
                document.getElementById(`image-block-${blockId}`).remove();
            } else {
                alert(data.message || 'Failed to delete image');
            }
        })
        .catch(error => {
            console.error('AJAX Error:', error);
            alert('AJAX request failed');
        });
    }
}
let blockIndex = {{ $content->blocks->count() }};

function addBlock() {
    const container = document.getElementById('blocks-container');

    const wrapper = document.createElement('div');
    wrapper.classList.add('block-wrapper');
    wrapper.dataset.index = blockIndex;

    wrapper.innerHTML = `
        <select name="blocks[${blockIndex}][type]" onchange="handleBlockTypeChange(this, ${blockIndex})" required>
            <option value="">Choose Type</option>
            <option value="title">Title</option>
            <option value="paragraph">Paragraph</option>
            <option value="image">Image</option>
            <option value="video">Video</option>
        </select>

        <div class="block-input" id="block-input-${blockIndex}"></div>

        <button type="button" onclick="removeUnsavedBlock(this)">Remove Block</button>
        <hr>
    `;

    container.appendChild(wrapper);
    blockIndex++;
}

function removeUnsavedBlock(button) {
    if (confirm('Are you sure you want to remove this unsaved block?')) {
        button.closest('.block-wrapper').remove();
    }
}

function removeBlock(button) {
    const blockId = button.getAttribute('data-id');
    if (blockId && confirm('Are you sure you want to delete this block?')) {
        fetch(`/admin/block/${blockId}/delete`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            button.closest('.block-wrapper').remove();
            alert(data.message || 'Deleted successfully');
        })
        .catch(error => {
            alert('Error deleting block');
        });
    } else if (!blockId) {
        if (confirm('Are you sure you want to remove this unsaved block?')) {
            button.closest('.block-wrapper').remove();
        }
    }
}

function handleBlockTypeChange(select, index) {
    const type = select.value;
    const inputWrapper = document.getElementById(`block-input-${index}`);
    let inputHTML = '';

    if (type === 'title' || type === 'video') {
        inputHTML = `<input type="text" name="blocks[${index}][content]" required>`;
    } else if (type === 'paragraph') {
        inputHTML = `<textarea name="blocks[${index}][content]" required></textarea>`;
    } else if (type === 'image') {
        inputHTML = `
            <input type="file" name="blocks[${index}][media]" accept="image/*">
        `;
    }

    inputWrapper.innerHTML = inputHTML;
}
</script>
@endsection
