@extends('admin.layout')

@section('content')
<div class="container mt-5">
    <h2>Edit Homepage Video</h2>

    <form method="POST" action="{{ route('admin.home_video.update', $video->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group mt-3">
            <label for="video_title">Video Title</label>
            <input type="text" class="form-control" id="video_title" name="video_title" value="{{ old('video_title', $video->video_title) }}">
        </div>

        <div class="form-group mt-3">
            <label for="video_url">Video URL (Embed Link)</label>
            <input type="text" class="form-control" id="video_url" name="video_url" value="{{ old('video_url', $video->video_url) }}">
        </div>

        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
@endsection
