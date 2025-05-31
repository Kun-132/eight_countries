@extends('admin.layout')

@section('content')
<a href="{{ route('admin.country_content.create') }}" class="btn btn-primary">Create New</a>

<table class="table">
    <thead>
        <tr>
            <th>Country</th>
            <th>Section ID</th>
            <th>Side Nav Link</th>
            <th>Title</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contents as $content)
        <tr>
            <td>{{ $content->country->name }}</td>
            <td>{{ $content->section_id }}</td>
            <td>{{ $content->side_nav_link_name }}</td>
            <td>{{ $content->title }}</td>
            <td>
            <a href="{{ route('admin.country_content.edit', $content->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('admin.country_content.destroy', $content->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
