<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Validasi form, termasuk file gambar
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048', // Validasi gambar
        ]);

        // Menyiapkan data yang akan disimpan
        $data = $request->only(['title', 'description']);
        $data['user_id'] = auth()->id();

        \Log::info('Image upload:', [
            'hasFile' => $request->hasFile('image'),
            'file' => $request->file('image'),
        ]);
        
        // Cek jika ada file gambar yang diupload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Simpan gambar ke folder 'images' di dalam storage/public
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs('images', $imageName, 'public');
            
            // Tambahkan path gambar ke data
            $data['image'] = $imagePath;
        }


        // Simpan data post ke database
        $post = Post::create($data);

        // Redirect ke halaman show setelah data disimpan
        return redirect()->route('posts.show', $post)
                         ->with('success', 'Post created successfully!');

    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }
}
