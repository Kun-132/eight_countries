@extends('admin.layout')

@section('content')
<h2>Edit Content</h2>
<form action="{{ route('admin.country_content.update', $content->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="country_id">Country</label>
        <select name="country_id" class="form-control" required>
            @foreach($countries as $country)
                <option value="{{ $country->id }}" {{ $country->id == $content->country_id ? 'selected' : '' }}>
                    {{ $country->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="section_id">Section ID</label>
        <input type="text" name="section_id" class="form-control" value="{{ $content->section_id }}" required>
    </div>

    <div class="form-group">
        <label for="side_nav_link_name">Side Navigation Link Name</label>
        <input type="text" name="side_nav_link_name" class="form-control" value="{{ $content->side_nav_link_name }}" required>
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="{{ $content->title }}" required>
    </div>

    <div class="form-group">
        <label for="paragraph">Paragraph</label>
        <textarea name="paragraph" class="form-control" required>{{ $content->paragraph }}</textarea>
    </div>

    <div class="form-group">
        <label for="media_type">Media Type</label>
        <select name="media_type" class="form-control" required onchange="toggleMediaInput(this.value)">
            <option value="image" {{ $content->media_type == 'image' ? 'selected' : '' }}>Image</option>
            <option value="video" {{ $content->media_type == 'video' ? 'selected' : '' }}>Video</option>
        </select>
    </div>

    <div class="form-group" id="image_input" style="{{ $content->media_type == 'image' ? 'display: block;' : 'display: none;' }}">
        <label for="image">Upload New Image (optional)</label>
        <input type="file" name="image" class="form-control">
        @if($content->media_type == 'image' && $content->media_path)
            <p>Current Image:</p>
            <img src="{{ asset('storage/' . $content->media_path) }}" width="100">
        @endif
    </div>

    <div class="form-group">
        <label for="image1">Additional Image 1 (optional)</label>
        <input type="file" name="image1" class="form-control">
        @if($content->image1)
            <p>Current Image 1:</p>
            <img src="{{ asset('storage/' . $content->image1) }}" width="100">
        @endif
    </div>

    <div class="form-group">
        <label for="image2">Additional Image 2 (optional)</label>
        <input type="file" name="image2" class="form-control">
        @if($content->image2)
            <p>Current Image 2:</p>
            <img src="{{ asset('storage/' . $content->image2) }}" width="100">
        @endif
    </div>

    <div class="form-group" id="video_input" style="{{ $content->media_type == 'video' ? 'display: block;' : 'display: none;' }}">
        <label for="media_path">Video URL</label>
        <input type="text" name="media_path" class="form-control" value="{{ $content->media_path }}">
    </div>

    <div class="button-group" style="margin-top:15px">
        <button type="submit" class="btn btn-primary">Update Content</button>
        <a href="{{ route('admin.country_content.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</form>

@if ($errors->any())
    <div class="alert alert-danger mt-3">
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
