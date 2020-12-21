{{-- Social Share --}}
<div class="m-2 text-dark social-share">

    <span class="h6 font-weight-bold mr-1"><i class="fas fa-share"></i> Share on: </span>
    
    {{-- Facebook --}}
    <a target="__blank" class="text-primary" href="https://www.facebook.com/sharer.php?u={{ Request::url() }}"><i class="fab fa-facebook-square"></i></a>

    {{-- Twitter --}}
    <a target="__blank" class="text-info" href="https://twitter.com/intent/tweet?url={{ Request::url() }}"><i class="fab fa-twitter-square"></i></a>

    {{-- LinkedIn --}}
    <a target="__blank" class="text-primary" href="https://www.linkedin.com/sharing/share-offsite/?url={{ Request::url() }}"><i class="fab fa-linkedin"></i></a>

    {{-- WhatsApp --}}
    <a target="__blank" class="text-success" href="https://api.whatsapp.com/send?text={{ Request::url() }}"><i class="fab fa-whatsapp-square"></i></a>

    {{-- Email --}}
    <a target="__blank" class="text-dark" href="https://mail.google.com/mail/u/0/?view=cm&fs=1&tf=1&source=mailto&su={{ $blogPost->name }}&body={{ Request::url() }}"><i class="fas fa-envelope-square"></i></a>

    <a href="javascript:void(0)" data-toggle="modal" data-target="#copyLinkModal"><i class="fas fa-link"></i></a>
    

</div>