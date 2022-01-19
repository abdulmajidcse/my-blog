<div class="row">
    @foreach ($blogPosts as $blogPost)
      <div class="blog-post col-md-4 mb-4">
        {{-- post thumbnail --}}
        @if ($blogPost->image)
          <a href="{{ route('frontend.blog.post', $blogPost->slug) }}"><img src="{{ $blogPost->image }}" alt="{{ $blogPost->name }}" class="img-fluid img-thumbnail"></a>
        @endif
        <h4 class="text-normal text-bn mt-1"><a href="{{ route('frontend.blog.post', $blogPost->slug) }}"> {{ $blogPost->name }} </a></h4>
      </div>
    @endforeach
</div>