<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CountryContent;
use App\Models\Country;
use Illuminate\Support\Facades\Storage;
use App\Models\CountryContentBlock;


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
        'country_id' => 'required|exists:countries,id',
        'section_id' => 'required|string',
        'side_nav_link_name' => 'required|string',
        'title' => 'required|string',
        'blocks' => 'array',
        'blocks.*.type' => 'required|string|in:title,paragraph,image,video',
    ]);

    $content = CountryContent::findOrFail($id);
    $content->update([
        'country_id' => $request->country_id,
        'section_id' => $request->section_id,
        'side_nav_link_name' => $request->side_nav_link_name,
        'title' => $request->title,
    ]);

    $existingBlockIds = [];

    if ($request->has('blocks')) {
        foreach ($request->blocks as $blockData) {
            $type = $blockData['type'];
            $blockId = $blockData['id'] ?? null;

            // Existing block
            if ($blockId) {
                $block = CountryContentBlock::find($blockId);
                if (!$block) continue;
                $existingBlockIds[] = $block->id;

                $block->type = $type;

                if ($type === 'image') {
                    // Remove image if requested
                    if (isset($blockData['remove_image']) && $block->media_path) {
                        Storage::delete('public/' . $block->media_path);
                        $block->media_path = null;
                        $block->content = null;
                    }

                    // Upload new image if provided
                    if (isset($blockData['media'])) {
                        $file = $blockData['media'];
                        $path = $file->store('uploads', 'public');

                        // Delete old image
                        if ($block->media_path) {
                            Storage::delete('public/' . $block->media_path);
                        }

                        $block->media_path = $path;
                        $block->content = null;
                    }

                } else {
                    // Title, paragraph, or video
                    $block->content = $blockData['content'] ?? null;
                    // ⚠️ Do not clear media_path for non-image blocks — only if previously was image
                    if ($block->media_path && $block->type !== 'image') {
                        $block->media_path = null;
                    }
                }

                $block->save();
            }

            // New block
            else {
                $newBlock = new CountryContentBlock();
                $newBlock->country_content_id = $content->id;
                $newBlock->type = $type;

                if ($type === 'image' && isset($blockData['media'])) {
                    $file = $blockData['media'];
                    $path = $file->store('uploads', 'public');
                    $newBlock->media_path = $path;
                } else {
                    $newBlock->content = $blockData['content'] ?? null;
                }

                $newBlock->save();
                $existingBlockIds[] = $newBlock->id;
            }
        }
    }

    // Delete removed blocks
    $content->blocks()->whereNotIn('id', $existingBlockIds)->each(function ($block) {
        if ($block->media_path) {
            Storage::delete('public/' . $block->media_path);
        }
        $block->delete();
    });

    return redirect()->route('admin.country_content.index')->with('success', 'Content updated successfully!');
}







public function store(Request $request)
{
    $request->validate([
        'country_id' => 'required',
        'section_id' => 'required',
        'side_nav_link_name' => 'required',
        'title' => 'required',
    ]);

    $content = CountryContent::create([
        'country_id' => $request->country_id,
        'section_id' => $request->section_id,
        'side_nav_link_name' => $request->side_nav_link_name,
        'title' => $request->title,
    ]);

    // Save blocks
    if ($request->has('blocks')) {
        foreach ($request->blocks as $index => $block) {
            $type = $block['type'];
            $contentValue = null;
            $mediaPath = null;

            if ($type === 'image' && isset($block['media'])) {
                $file = $request->file("blocks.$index.media");
                if ($file) {
                    $mediaPath = $file->store('uploads', 'public');
                }
            } elseif ($type === 'video') {
                $contentValue = $block['content']; // video URL
            } else {
                $contentValue = $block['content'];
            }

            CountryContentBlock::create([
                'country_content_id' => $content->id,
                'type' => $type,
                'content' => $contentValue,
                'media_path' => $mediaPath,
                'order' => $index,
            ]);
        }
    }

    return redirect()->route('admin.country_content.index')->with('success', 'Content created successfully.');
}
public function removeBlockImage($id)
{
    $block = CountryContentBlock::findOrFail($id);

    if ($block->type !== 'image' || !$block->media_path) {
        return response()->json(['message' => 'No image found'], 404);
    }

    Storage::delete('public/' . $block->media_path);

    $block->media_path = null;
    $block->content = null; // Optional: clear text content as well if any
    $block->save();

    return response()->json(['message' => 'Image deleted successfully']);
}

public function deleteBlock($id)
{
    $block = CountryContentBlock::findOrFail($id);

    if ($block->type === 'image' && $block->media_path) {
        Storage::delete('public/' . $block->media_path);
    }

    $block->delete();

    return response()->json(['message' => 'Block deleted successfully.']);
}

}