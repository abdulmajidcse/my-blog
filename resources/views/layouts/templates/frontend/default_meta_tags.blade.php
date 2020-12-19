{{-- <meta name='google-site-verification' content="" /> --}}
<!-- [ Meta Tag SEO ] -->
<meta name='language' content='English, Bangla'/>
<meta name='url' content="{{ Request::url() }}" />
<meta name='identifier-URL' content="{{ Request::url() }}" />
<meta name='type' content='article' />
<meta name="author" content="Abdul Majid" />
<meta property="og:url" content="{{ Request::url() }}" />
<meta property="og:type" content="article" />

{{-- Default meta keyword and meta description --}}
@php
    $defaultTitle       = 'Web Design, Web Development';
    $defaultKeyword     = 'Web Design, Web Development, HTML, CSS, JavaScript, JQuery, Bootstrap, Vuejs, Reactjs, PHP, MySQL, WordPress, Laravel, Codeigniter';
    $defaultDescription = 'Hello! This is Abdul Majid. I am a web developer. I love to learn and share knowledge with others. This is my personal blog. I think this blog will be helpful. Thank you!';
    $defaultImage       = 'assets/static_uploads/abdulmajid.jpg';
@endphp

@if (isset($blogPost))
    
    {{-- Single post page --}}
    <meta name="title" content="{{ $blogPost->name }}" />
    <meta name="description" content="{{ $blogPost->meta_description }}" />
    <meta name="keywords" content="{{ $blogPost->meta_keyword }}" />
    @if ($blogPost->image)
        <meta name="image" content="{{ asset('assets/uploads/'.$blogPost->image) }}" />
    @else
        <meta name="image" content="{{ asset($defaultImage) }}" />
    @endif

    <meta property="og:title" content="{{ $blogPost->name }}" />
    <meta property="og:description" content="{{ $blogPost->meta_description }}">
    <meta property="og:keywords" content="{{ $blogPost->meta_keyword }}" />

    @if ($blogPost->image)
        <meta property="og:image" content="{{ asset('assets/uploads/'.$blogPost->image) }}" />
    @else
        <meta property="og:image" content="{{ asset($defaultImage) }}" />
    @endif

@elseif (isset($blogPosts) && isset($blogCategory))
    
    {{-- Posts by Category page --}}    
    <meta name="title" content="{{ $blogCategory->name }}" />
    <meta name="description" content="{{ $blogCategory->meta_description }}" />
    <meta name="keywords" content="{{ $blogCategory->meta_keyword }}" />
    <meta name="image" content="{{ asset($defaultImage) }}" />

    <meta property="og:title" content="{{ $blogCategory->name }}" />
    <meta property="og:description" content="{{ $blogCategory->meta_description }}">
    <meta property="og:keywords" content="{{ $blogCategory->meta_keyword }}" />
    <meta property="og:image" content="{{ asset($defaultImage) }}" />

@else

    {{-- Default page --}}    
    <meta name="title" content="{{ $defaultTitle }}" />
    <meta name="description" content="{{ $defaultDescription }}" />
    <meta name="keywords" content="{{ $defaultKeyword }}" />
    <meta name="image" content="{{ asset($defaultImage) }}" />

    <meta property="og:title" content="{{ $defaultTitle }}" />
    <meta property="og:description" content="{{ $defaultKeyword }}">
    <meta property="og:keywords" content="{{ $defaultKeyword }}" />
    <meta property="og:image" content="{{ asset($defaultImage) }}" />

@endif