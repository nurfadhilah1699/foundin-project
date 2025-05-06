<div class="widgets-container">

    <!-- Search Widget -->
    <div class="search-widget widget-item">

        <h3 class="widget-title">Search</h3>
        <form action="{{ route('explore') }}" method="GET">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search posts...">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>

    </div><!--/Search Widget -->

    <!-- Categories Widget -->
    <div class="categories-widget widget-item">

        <h3 class="widget-title">Categories</h3>
        <ul class="mt-3">
        @foreach(\App\Models\Category::all() as $category)
            <li>
                <a href="{{ route('explore', ['category' => $category->id]) }}">
                    {{ $category->name }} <span>({{ $category->posts()->count() }})</span>
                </a>
            </li>
        @endforeach
        </ul>

    </div><!--/Categories Widget -->

    <!-- Tags Widget -->
    <div class="tags-widget widget-item">

        <h3 class="widget-title">Tags</h3>
        <ul>
        @foreach(\App\Models\Tag::all() as $tag)
            <li>
                <a href="{{ route('explore', ['tag' => $tag->id]) }}">
                    {{ $tag->name }}
                </a>
            </li>
        @endforeach
        </ul>

    </div><!--/Tags Widget -->

</div>
