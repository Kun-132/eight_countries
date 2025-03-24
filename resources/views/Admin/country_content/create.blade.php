@extends('admin.layout')

@section('content')

<!-- Important Reminder -->
<div class="alert alert-warning" style="background-color: #fff3cd; border-left: 5px solid #ff9800; padding: 15px; margin-bottom: 20px;">
    <strong>Important Reminder:</strong> Please make sure the section ID and side navigation link name are the same. If using an image, upload a high-quality file. If using a video, provide a valid URL.
</div>

<h2>Create New Content</h2>
<form action="{{ route('admin.country_content.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="country_id">Country</label>
        <select name="country_id" class="form-control" required>
            @foreach($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="section_id">Section ID</label>
        <input type="text" name="section_id" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="side_nav_link_name">Side Navigation Link Name</label>
        <input type="text" name="side_nav_link_name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="paragraph" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="media_type">Media Type</label>
        <select name="media_type" class="form-control" required onchange="toggleMediaInput(this.value)">
            <option value="image">Image</option>
            <option value="video">Video</option>
        </select>
    </div>

    <div class="form-group" id="image_input">
        <label for="image">Upload Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <div class="form-group" id="video_input" style="display: none;">
        <label for="media_path">Video URL</label>
        <input type="text" name="media_path" class="form-control">
    </div>

    <div class='button-group' style="margin-top:15px;">
        <button type="submit" class="btn btn-primary">Save Content</button>
    <a href="{{ route('admin.country_content.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<script>
function toggleMediaInput(value) {
    document.getElementById('image_input').style.display = value === 'image' ? 'block' : 'none';
    document.getElementById('video_input').style.display = value === 'video' ? 'block' : 'none';
}
</script>

@endsection
