<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            // Redirect back with a message or show empty results
            return redirect()->back()->with('error', 'Please enter a search query.');
        }

        // Search users by name or email with pagination
        $users = User::where('name', 'LIKE', "%{$query}%")
            ->orWhere('email', 'LIKE', "%{$query}%")
            ->paginate(10);

        // Search posts by title or description with eager loading user and pagination
        $posts = Post::with('user')
            ->where('title', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->paginate(10);

        // Search comments by content or user name/email with eager loading user and pagination
        $comments = Comment::with('user')
            ->where('content', 'LIKE', "%{$query}%")
            ->orWhereHas('user', function ($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhere('email', 'LIKE', "%{$query}%");
            })
            ->paginate(10);

        // Search categories by name with posts count and pagination
        $categories = Category::where('name', 'LIKE', "%{$query}%")
            ->withCount('posts')
            ->paginate(10);

        // Search tags by name with posts count and pagination
        $tags = Tag::where('name', 'LIKE', "%{$query}%")
            ->withCount('posts')
            ->paginate(10);

        // Return the correct view with paginated results
        return view('admin.search-result', compact('users', 'posts', 'comments', 'categories', 'tags'));
    }
}
