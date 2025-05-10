<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|string',
        ]);

        $data = $request->only(['title', 'description']);
        $data['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                // Workaround for Laravel 11 storage issue: manually move the file
                $destinationPath = storage_path('app/public/images');
                $fileName = time() . '_' . $file->getClientOriginalName();

                // Ensure destination directory exists
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $moved = $file->move($destinationPath, $fileName);

                if ($moved) {
                    // Store relative path to the image
                    $data['image'] = 'images/' . $fileName;
                } else {
                    return back()->withErrors(['image' => 'Failed to move the uploaded image.'])->withInput();
                }
            } else {
                return back()->withErrors(['image' => 'Uploaded image file is not valid.'])->withInput();
            }
        }   

        $post = Post::create($data);

        // Attach category
        if ($request->has('category_id')) {
            $post->categories()->sync([$request->input('category_id')]);
        }

        // Handle tags
        $tags = $request->input('tags');
        if ($tags) {
            $tagNames = array_map('trim', explode(',', $tags));
            $tagIds = [];
            foreach ($tagNames as $tagName) {
                $tag = \App\Models\Tag::firstOrCreate(['name' => $tagName]);
                $tagIds[] = $tag->id;
            }
            $post->tags()->sync($tagIds);
        }

        return redirect()->route('admin.posts.index', $post)
                         ->with('success', 'Post created successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable|string',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                $destinationPath = storage_path('app/public/images');
                $fileName = time() . '_' . $file->getClientOriginalName();

                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $moved = $file->move($destinationPath, $fileName);

                if ($moved) {
                    $post->image = 'images/' . $fileName;
                } else {
                    return back()->withErrors(['image' => 'Failed to move the uploaded image.'])->withInput();
                }
            } else {
                return back()->withErrors(['image' => 'Uploaded image file is not valid.'])->withInput();
            }
        }

        $post->save();

        // Attach category
        if ($request->has('category_id')) {
            $post->categories()->sync([$request->input('category_id')]);
        }

        // Handle tags
        $tags = $request->input('tags');
        if ($tags) {
            $tagNames = array_map('trim', explode(',', $tags));
            $tagIds = [];
            foreach ($tagNames as $tagName) {
                $tag = \App\Models\Tag::firstOrCreate(['name' => $tagName]);
                $tagIds[] = $tag->id;
            }
            $post->tags()->sync($tagIds);
        } else {
            $post->tags()->sync([]);
        }

        return redirect()->route('admin.posts.index')->with('success', 'Post berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post berhasil dihapus.');
    }
}
