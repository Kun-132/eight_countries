@extends('admin.layout')

@section('content')

<!-- Important Reminder -->
<div class="alert alert-warning" style="background-color: #fff3cd; border-left: 5px solid #ff9800; padding: 15px; margin-bottom: 20px;">
    <strong>Important Reminder:</strong> Please make sure the section ID and side navigation link name are the same. If using an image, upload a high-quality file. If using a video, provide a valid URL.
</div>

<h2>Create New Content</h2>
<form action="{{ route('admin.country_content.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Country -->
    <div class="form-group">
        <label for="country_id">Country</label>
        <select name="country_id" class="form-control" required>
            @foreach($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Section ID -->
    <div class="form-group">
        <label for="section_id">Section ID</label>
        <input type="text" name="section_id" class="form-control" required>
    </div>

    <!-- Side Nav Link Name -->
    <div class="form-group">
        <label for="side_nav_link_name">Side Navigation Link Name</label>
        <input type="text" name="side_nav_link_name" class="form-control" required>
    </div>

    <!-- Title -->
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <!-- Content -->
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="paragraph" class="form-control" required></textarea>
    </div>

    <!-- Media Type -->
    <div class="form-group">
        <label for="media_type">Media Type</label>
        <select name="media_type" class="form-control" required onchange="toggleMediaInput(this.value)">
            <option value="image">Image</option>
            <option value="video">Video</option>
        </select>
    </div>

    <!-- Media Input Section -->
    <div id="image_input">

        <!-- Main Image Block -->
        <label>Main Image</label>
        <div style="width: 100%; height: 300px; border: 2px dashed #aaa; position: relative; margin-bottom: 15px; overflow: hidden;">
            <input type="file" name="image" id="mainImageInput" style="width: 100%; height: 100%; opacity: 0; cursor: pointer; position: absolute; z-index: 2;" onchange="previewImage(this, 'mainImagePreview')">
            <img id="mainImagePreview" src="" style="width: 100%; height: 100%; object-fit: cover; display: none; position: absolute; top: 0; left: 0; z-index: 1;">
            <span style="position: absolute; color: #888; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 0;">Click to upload main image</span>
        </div>

        <!-- Additional Images -->
        <label>Additional Images</label>
        <div style="display: flex; gap: 10px; margin-bottom: 15px;">
            <!-- Image 1 -->
            <div style="flex: 1; height: 150px; border: 2px dashed #aaa; position: relative; overflow: hidden;">
                <input type="file" name="image1" id="image1Input" style="width: 100%; height: 100%; opacity: 0; cursor: pointer; position: absolute; z-index: 2;" onchange="previewImage(this, 'image1Preview')">
                <img id="image1Preview" src="" style="width: 100%; height: 100%; object-fit: cover; display: none; position: absolute; top: 0; left: 0; z-index: 1;">
                <span style="position: absolute; color: #888; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 0;">Image 1</span>
            </div>

            <!-- Image 2 -->
            <div style="flex: 1; height: 150px; border: 2px dashed #aaa; position: relative; overflow: hidden;">
                <input type="file" name="image2" id="image2Input" style="width: 100%; height: 100%; opacity: 0; cursor: pointer; position: absolute; z-index: 2;" onchange="previewImage(this, 'image2Preview')">
                <img id="image2Preview" src="" style="width: 100%; height: 100%; object-fit: cover; display: none; position: absolute; top: 0; left: 0; z-index: 1;">
                <span style="position: absolute; color: #888; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 0;">Image 2</span>
            </div>
        </div>
    </div>

    <!-- Video Input -->
    <div class="form-group" id="video_input" style="display: none;">
        <label for="media_path">Video URL</label>
        <input type="text" name="media_path" class="form-control">
    </div>

    <!-- Buttons -->
    <div class="button-group" style="margin-top:15px;">
        <button type="submit" class="btn btn-primary">Save Content</button>
        <a href="{{ route('admin.country_content.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</form>

<!-- Error Messages -->
@if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- JavaScript -->
<script>
    function toggleMediaInput(value) {
        document.getElementById('image_input').style.display = value === 'image' ? 'block' : 'none';
        document.getElementById('video_input').style.display = value === 'video' ? 'block' : 'none';
    }

    function previewImage(input, previewId) {
        const file = input.files[0];
        const preview = document.getElementById(previewId);
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    }
</script>

@endsection
