<div>
    @foreach ($blogPosts as $blogPost)
        <h4 class="text-normal text-bn my-2"><a href="{{ route('frontend.blog.post', $blogPost->slug) }}">
                {{ $blogPost->name }} </a></h4>
    @endforeach
</div>
