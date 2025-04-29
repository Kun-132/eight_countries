<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CountryContent;
use App\Models\Country;
use Illuminate\Support\Facades\Storage;

class CountryContentController extends Controller
{
    public function index()
    {
        $contents = CountryContent::all();
        return view('admin.country_content.index', compact('contents'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('admin.country_content.create', compact('countries'));
    }
    public function edit($id)
{
    $content = CountryContent::findOrFail($id); // Find content by ID
    $countries = Country::all(); // Get all countries for dropdown
    return view('admin.country_content.edit', compact('content', 'countries'));

 
}
public function destroy($id)
{
    // Find the content by ID
    $content = CountryContent::findOrFail($id);

    // Delete the associated media file if it's an image
    if ($content->media_type === 'image' && $content->media_path) {
        Storage::delete('public/' . $content->media_path);
    }

    // Delete the content from the database
    $content->delete();

    // Redirect with success message
    return redirect()->route('admin.country_content.index')->with('success', 'Content deleted successfully.');
}

public function update(Request $request, $id)
{
    $request->validate([
        'country_id' => 'required',
        'section_id' => 'required',
        'side_nav_link_name' => 'required',
        'title' => 'required',
        'paragraph' => 'required',
        'media_type' => 'required|in:image,video',
        'image' => 'nullable|image|max:10240',
        'media_path' => 'nullable|string',
        'image1' => 'nullable|image|max:10240',
        'image2' => 'nullable|image|max:10240',
    ]);

    $content = CountryContent::findOrFail($id);

    $content->country_id = $request->country_id;
    $content->section_id = $request->section_id;
    $content->side_nav_link_name = $request->side_nav_link_name;
    $content->title = $request->title;
    $content->paragraph = $request->paragraph;
    $content->media_type = $request->media_type;

    if ($request->media_type === 'image' && $request->hasFile('image')) {
        $mediaPath = $request->file('image')->store('uploads', 'public');
        $content->media_path = $mediaPath;
    } elseif ($request->media_type === 'video') {
        $content->media_path = $request->media_path;
    }

    if ($request->hasFile('image1')) {
        $image1Path = $request->file('image1')->store('uploads', 'public');
        $content->image1 = $image1Path;
    }

    if ($request->hasFile('image2')) {
        $image2Path = $request->file('image2')->store('uploads', 'public');
        $content->image2 = $image2Path;
    }

    $content->save();

    return redirect()->route('admin.country_content.index')->with('success', 'Content updated successfully!');
}



public function store(Request $request)
{
    $request->validate([
        'country_id' => 'required|exists:countries,id',
        'section_id' => 'required|string|max:255',
        'side_nav_link_name' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'paragraph' => 'required|string',
        'media_type' => 'required|in:image,video',
        'image' => 'required_if:media_type,image|image|max:10240',
        'media_path' => 'required_if:media_type,video|string|nullable',
        'image1' => 'nullable|image|max:10240',
        'image2' => 'nullable|image|max:10240',
    ]);

    $mediaPath = null;
    if ($request->media_type === 'image' && $request->hasFile('image')) {
        $mediaPath = $request->file('image')->store('uploads', 'public');
    } elseif ($request->media_type === 'video') {
        $mediaPath = $request->media_path;
    }

    $image1Path = $request->hasFile('image1') ? $request->file('image1')->store('uploads', 'public') : null;
    $image2Path = $request->hasFile('image2') ? $request->file('image2')->store('uploads', 'public') : null;

    CountryContent::create([
        'country_id' => $request->country_id,
        'section_id' => $request->section_id,
        'side_nav_link_name' => $request->side_nav_link_name,
        'title' => $request->title,
        'paragraph' => $request->paragraph,
        'media_type' => $request->media_type,
        'media_path' => $mediaPath,
        'image1' => $image1Path,
        'image2' => $image2Path,
    ]);

    return redirect()->route('admin.country_content.index')->with('success', 'Content added successfully!');
}

}