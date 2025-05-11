@extends('admin-layouts.main')


@section('title', 'Search Result')

@section('header-title', 'Search Result')

@section('content')
<div class="container pt-4">
    <h4 class="mb-4">🔍 Search results for: "<strong>{{ request('query') }}</strong>"</h4>

    @php
        $hasResult = !$users->isEmpty() || !$posts->isEmpty() || !$comments->isEmpty() || !$categories->isEmpty() || !$tags->isEmpty();
    @endphp

    @if($hasResult)
        {{-- USERS --}}
        @if(!$users->isEmpty())
        <div class="mb-4">
            <h5>👤 Users ({{ $users->total() }})</h5>
            <ul class="list-group">
                @foreach ($users->take(5) as $user)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $user->name }} ({{ $user->email }}) <i>{{ ucfirst($user->role) }}</i>
                    </li>
                @endforeach
            </ul>
            <a href="{{ route('admin.users.index') }}" class="btn btn-link mt-2">Lihat semua Users</a>
        </div>
        @endif

        {{-- POSTS --}}
        @if(!$posts->isEmpty())
        <div class="mb-4">
            <h5>📝 Posts ({{ $posts->total() }})</h5>
            <ul class="list-group">
                @foreach ($posts->take(5) as $post)
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col-auto">
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="max-height: 100px;">
                                @else
                                    <i>No image available</i>
                                @endif
                            </div>
                            <div class="col px-4">
                                <div>
                                    <div class="float-right">by {{ $post->user->name ?? 'Unknown' }}</div>
                                    <h3>{{ $post->title }}</h3>
                                    <p class="mb-0">{{ Str::limit($post->description, 50) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </ul>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-link mt-2">Lihat semua Posts</a>
        </div>
        @endif

        {{-- COMMENTS --}}
        @if(!$comments->isEmpty())
        <div class="mb-4">
            <h5>💬 Comments ({{ $comments->total() }})</h5>
            <ul class="list-group">
                @foreach ($comments->take(5) as $comment)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ Str::limit($comment->content, 50) }} by {{ $comment->user->name ?? 'Unknown' }}
                    </li>
                @endforeach
            </ul>
            <a href="{{ route('admin.comments.index') }}" class="btn btn-link mt-2">Lihat semua Comments</a>
        </div>
        @endif

        {{-- CATEGORIES --}}
        @if(!$categories->isEmpty())
        <div class="mb-4">
            <h5>📂 Categories ({{ $categories->total() }})</h5>
            <ul class="list-group">
                @foreach ($categories->take(5) as $category)
                    <li class="list-group-item">
                        {{ $category->name }} ({{ $category->posts_count ?? 0 }} Posts)
                    </li>
                @endforeach
            </ul>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-link mt-2">Lihat semua Categories</a>
        </div>
        @endif

        {{-- TAGS --}}
        @if(!$tags->isEmpty())
        <div class="mb-4">
            <h5>🏷️ Tags ({{ $tags->total() }})</h5>
            <ul class="list-group">
                @foreach ($tags->take(5) as $tag)
                    <li class="list-group-item">
                        {{ $tag->name }} ({{ $tag->posts_count ?? 0 }} Posts)
                    </li>
                @endforeach
            </ul>
            <a href="{{ route('admin.tags.index') }}" class="btn btn-link mt-2">Lihat semua Tags</a>
        </div>
        @endif

    @else
        <div class="alert alert-warning">No results found for "<strong>{{ request('query') }}</strong>".</div>
    @endif
</div>
@endsection
