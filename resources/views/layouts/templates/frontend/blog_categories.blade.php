@if($blogCategories->count() > 0)
    <!-- blog categories -->
    <h2 class="my-3">Categories</h2>
    <ul class="list-inline dev-icons">
        @foreach ($blogCategories as $blogCategory)
            @if ($blogCategory->blogPosts->count() == 1 && $blogCategory->blogPosts[0]->status == 1)
                <a href="{{ route('frontend.blog.category', $blogCategory->slug) }}"><li class="list-inline-item text-bn font-weight-bold">{{ $blogCategory->name . ' (' . $blogCategory->blogPosts->count() . ')' }}</li></a>
            @elseif($blogCategory->blogPosts->count() > 1)
                <a href="{{ route('frontend.blog.category', $blogCategory->slug) }}"><li class="list-inline-item text-bn font-weight-bold">{{ $blogCategory->name . ' (' . $blogCategory->blogPosts->count() . ')' }}</li></a>
            @endif
        @endforeach
    </ul>
@endif