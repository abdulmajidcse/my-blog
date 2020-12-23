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
    // Setting
    $setting = \App\Models\Setting::first();

    $defaultTitle       = $setting ? $setting->app_title : 'A Bengali Blog About ICT';
    $defaultKeyword     = $setting ? $setting->meta_keyword : 'HTML, CSS, JavaScript, JQuery, Reactjs, Vuejs, PHP, MySQL, WordPress, Laravel';
    $defaultDescription = $setting ? $setting->meta_description : 'This is a bengali blog about ICT. You can get more information about ICT. I mean Web Design, Development, Computer Science, Software Development etc.';
    $defaultImage       = $setting ? 'assets/uploads/'.$setting->meta_image : 'assets/static_uploads/abdulmajid.jpg';
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
    <meta property="og:description" content="{{ $defaultDescription }}">
    <meta property="og:keywords" content="{{ $defaultKeyword }}" />
    <meta property="og:image" content="{{ asset($defaultImage) }}" />

@endif