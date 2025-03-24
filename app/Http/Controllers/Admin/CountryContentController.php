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
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'media_path' => 'nullable|string'
    ]);

    $content = CountryContent::findOrFail($id);
    
    $content->country_id = $request->country_id;
    $content->section_id = $request->section_id;
    $content->side_nav_link_name = $request->side_nav_link_name;
    $content->title = $request->title;
    $content->paragraph = $request->paragraph;
    $content->media_type = $request->media_type;

    // Handle media upload
    if ($request->media_type === 'image' && $request->hasFile('image')) {
        $mediaPath = $request->file('image')->store('uploads', 'public');
        $content->media_path = $mediaPath;
    } elseif ($request->media_type === 'video') {
        $content->media_path = $request->media_path;
    }

    $content->save();

    return redirect()->route('admin.country_content.index')->with('success', 'Content updated successfully!');
}


    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'country_id' => 'required|exists:countries,id',
            'section_id' => 'required|string|max:255',
            'side_nav_link_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'paragraph' => 'required|string',  // ✅ Correct field name
            'media_type' => 'required|in:image,video', // Ensure media type is either image or video
            // Image validation: required only if media_type is 'image'
            'image' => 'required_if:media_type,image|image|max:2048',
            // Video validation: required only if media_type is 'video'
            'media_path' => 'required_if:media_type,video|string|nullable',
        ]);;
        
        
        // Handle media upload
        if ($request->media_type === 'image' && $request->hasFile('image')) {
            // Store the image and get the file path
            $mediaPath = $request->file('image')->store('uploads', 'public');
        } elseif ($request->media_type === 'video' && $request->filled('media_path')) {
            // Use the provided video URL (string)
            $mediaPath = $request->media_path;
        }
        CountryContent::create([
            'country_id' => $request->country_id,
            'section_id' => $request->section_id,
            'side_nav_link_name' => $request->side_nav_link_name,
            'title' => $request->title,
            'paragraph' => $request->paragraph,  // ✅ Correct column name
            'media_type' => $request->media_type,
            'media_path' => $mediaPath, // ✅ Now always defined
        ]);


        
        // Retrieve the country to dynamically route to the correct view
        $country = Country::find($request->country_id);

        // Redirect to the country's specific view page
        return redirect()->route('admin.country_content.index')->with('success', 'Content added successfully!');

}
}