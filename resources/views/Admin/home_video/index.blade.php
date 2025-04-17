@extends('admin.layout')

@section('content')
<a href="{{ route('admin.home_video.create') }}" class="btn btn-primary mb-3">Create New Video</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Video URL</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($videos as $video)
        <tr>
            <td>{{ $video->video_title }}</td>
            <td><a href="{{ $video->video_posting }}" target="_blank">{{ $video->video_posting }}</a></td>
            <td>
                <a href="{{ route('admin.home_video.edit', $video->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.home_video.destroy', $video->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure to delete this video?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
