<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        $data = $request->only(['title', 'description']);
        $data['user_id'] = auth()->id();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs('images', $imageName, 'public');
            $data['image'] = $imagePath;
        }

        $post = Post::create($data);

        return redirect()->route('posts.show', $post)
                         ->with('success', 'Post created successfully!');
    }

    public function show($id)
    {
        $post = Post::with(['comments' => function ($query) {
            $query->whereNull('parent_id')->with('replies.user')->with('user');
        }])->findOrFail($id);

        $totalCommentsCount = Comment::where('post_id', $id)->count();

        return view('posts.show', compact('post', 'totalCommentsCount'));
    }

    public function storeComment(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $comment = new Comment();
        $comment->post_id = $postId;
        $comment->user_id = Auth::id();
        $comment->parent_id = $request->input('parent_id');
        $comment->content = $request->input('content');
        $comment->save();

        return redirect()->route('posts.show', $postId);
    }

    public function explore()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(9);
        return view('explore', compact('posts'));
    }
}
