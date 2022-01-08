{{-- <meta name='google-site-verification' content="" /> --}}
<!-- [ Meta Tag SEO ] -->
<meta name="robots" content="ALL, FOLLOW, INDEX" />
<meta name='language' content='English, Bangla' />
<meta name='url' content="{{ Request::url() }}" />
<meta name='identifier-URL' content="{{ Request::url() }}" />
<meta name='type' content='article, blog, portfolio' />
<meta name="author" content="Abdul Majid" />
<meta property="og:url" content="{{ Request::url() }}" />
<meta property="og:type" content="article, blog, portfolio" />

{{-- Default meta keyword and meta description --}}
@php
$defaultTitle = $setting && $setting->app_title ? $setting->app_title : 'A Blog About ICT';
$defaultKeyword = $setting && $setting->seo_keyword ? $setting->seo_keyword : 'HTML, CSS, JavaScript, JQuery, Reactjs, Vuejs, PHP, MySQL, WordPress, Laravel';
$defaultDescription = $setting && $setting->seo_description ? $setting->seo_description : "Hi, I'm Md. Abdul Majid. I'm a Web Developer. I'm currently working on Laravel and ReactJS. Programming is my love, not only a profession! I share my journey on this blog, mostly technical. I enjoy building new things and maybe at this very moment I am building something new. Follow me to stay updated.";
$defaultImage = $setting && $setting->seo_image ? 'assets/uploads/' . $setting->seo_image : 'assets/static_uploads/abdulmajid.jpg';
@endphp

@if (isset($blogPost))

    {{-- Single post page --}}
    <meta name="title" content="{{ $blogPost->name }}" />
    <meta name="description"
        content="{{ $blogPost->seo_description ? $blogPost->seo_description : $defaultDescription }}" />
    <meta name="keywords" content="{{ $blogPost->seo_keyword ? $blogPost->seo_keyword : $defaultKeyword }}" />
    <meta name="image"
        content="{{ $blogPost->image ? asset('assets/uploads/' . $blogPost->image) : asset($defaultImage) }}" />

    <meta property="og:title" content="{{ $blogPost->name }}" />
    <meta property="og:description"
        content="{{ $blogPost->seo_description ? $blogPost->seo_description : $defaultDescription }}">
    <meta property="og:keywords" content="{{ $blogPost->seo_keyword ? $blogPost->seo_keyword : $defaultKeyword }}" />
    <meta property="og:image"
        content="{{ $blogPost->image ? asset('assets/uploads/' . $blogPost->image) : asset($defaultImage) }}" />

@elseif (isset($blogPosts) && isset($blogCategory))

    {{-- Posts by Category page --}}
    <meta name="title" content="{{ $blogCategory->name }}" />
    <meta name="description"
        content="{{ $blogCategory->seo_description ? $blogCategory->seo_description : $defaultDescription }}" />
    <meta name="keywords"
        content="{{ $blogCategory->seo_keyword ? $blogCategory->seo_keyword : $defaultKeyword }}" />
    <meta name="image" content="{{ asset($defaultImage) }}" />

    <meta property="og:title" content="{{ $blogCategory->name }}" />
    <meta property="og:description"
        content="{{ $blogCategory->seo_description ? $blogCategory->seo_description : $defaultDescription }}">
    <meta property="og:keywords"
        content="{{ $blogCategory->seo_keyword ? $blogCategory->seo_keyword : $defaultKeyword }}" />
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
