<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeVideo;

class HomeVideoController extends Controller
{
    // Show all videos in a table
    public function index()
    {
        $videos = HomeVideo::all();
        return view('admin.home_video.index', compact('videos'));
    }

    // Show create form
    public function create()
    {
        return view('admin.home_video.create');
    }

    // Store new video data
    public function store(Request $request)
    {
        $request->validate([
            'video_title' => 'required|string|max:255',
            'video_url' => 'required|url',
        ]);

        HomeVideo::create([
            'video_title' => $request->video_title,
            'video_url' => $request->video_url,
        ]);

        return redirect()->route('admin.home_video.index')->with('success', 'Video created successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $video = HomeVideo::findOrFail($id);
        return view('admin.home_video.edit', compact('video'));
    }

    // Update video data
    public function update(Request $request, $id)
    {
        $request->validate([
            'video_title' => 'required|string|max:255',
            'video_url' => 'required|url',
        ]);

        $video = HomeVideo::findOrFail($id);
        $video->update([
            'video_title' => $request->video_title,
            'video_url' => $request->video_url,
        ]);

        return redirect()->route('admin.home_video.index')->with('success', 'Video updated successfully!');
    }

    // Optional: Delete video
    public function destroy($id)
    {
        $video = HomeVideo::findOrFail($id);
        $video->delete();

        return redirect()->route('admin.home_video.index')->with('success', 'Video deleted successfully!');
    }
}
