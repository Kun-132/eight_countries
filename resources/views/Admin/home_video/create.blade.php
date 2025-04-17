@extends('admin.layout')

@section('content')
<h2>Create New Video</h2>

<form action="{{ route('admin.home_video.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="video_title">Video Title</label>
        <input type="text" name="video_title" id="video_title" class="form-control" value="{{ old('video_title') }}" required>
        @error('video_title') 
            <small class="text-danger">{{ $message }}</small> 
        @enderror
    </div>

    <div class="form-group">
        <label for="video_url">Video URL</label>
        <input type="url" name="video_url" id="video_url" class="form-control" value="{{ old('video_url') }}" required>
        @error('video_url') 
            <small class="text-danger">{{ $message }}</small> 
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Save Video</button>
</form>
@endsection
