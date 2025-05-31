@extends('admin.layout')

@section('content')

<div class="alert alert-warning">
    <strong>Important Reminder:</strong> Please make sure the section ID and side navigation link name are the same. The media section is optional and depends on the section design.
</div>

<div class="card shadow p-4">
    <h3 class="mb-4">Create New Country Content</h3>

    <form action="{{ route('admin.country_content.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="country_id" class="form-label">Choose Country:</label>
            <select class="form-select" name="country_id" required>
                <option value="">Select Country</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label" for="section_id">Section ID:</label>
                <input type="text" class="form-control" name="section_id" required>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="side_nav_link_name">Side Nav Link Name:</label>
                <input type="text" class="form-control" name="side_nav_link_name" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label" for="title">General Section Title:</label>
            <input type="text" class="form-control" name="title" required>
        </div>

        <!-- Flexible Content Block -->
        <div class="mb-4">
            <label class="form-label">Content Blocks:</label>
            <div id="blocks-container" class="d-flex flex-column gap-3"></div>
            <button type="button" class="btn btn-outline-primary mt-2" onclick="addBlock()">+ Add Block</button>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>

<script>
function addBlock() {
    const container = document.getElementById('blocks-container');
    const index = container.children.length;

    const wrapper = document.createElement('div');
    wrapper.classList.add('p-3', 'border', 'rounded');

    wrapper.innerHTML = `
        <div class="row g-2">
            <div class="col-md-4">
                <select class="form-select" name="blocks[${index}][type]" onchange="handleBlockTypeChange(this, ${index})" required>
                    <option value="">Choose Type</option>
                    <option value="title">Title</option>
                    <option value="paragraph">Paragraph</option>
                    <option value="image">Image</option>
                    <option value="video">Video</option>
                </select>
            </div>
            <div class="col-md-8" id="block-input-${index}">
                <!-- Dynamic input will be inserted here -->
            </div>
        </div>
    `;

    container.appendChild(wrapper);
}

function handleBlockTypeChange(select, index) {
    const inputWrapper = document.getElementById(`block-input-${index}`);
    const type = select.value;

    let inputHTML = '';
    if (type === 'title' || type === 'video') {
        inputHTML = `<input type="text" class="form-control mt-2" name="blocks[${index}][content]" placeholder="Enter ${type}" required>`;
    } else if (type === 'paragraph') {
        inputHTML = `<textarea class="form-control mt-2" name="blocks[${index}][content]" rows="3" placeholder="Enter paragraph" required></textarea>`;
    } else if (type === 'image') {
        inputHTML = `<input type="file" class="form-control mt-2" name="blocks[${index}][media]" accept="image/*" required>`;
    }

    inputWrapper.innerHTML = inputHTML;
}
</script>

@endsection
