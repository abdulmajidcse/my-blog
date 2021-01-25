{{-- Social Share --}}
<div class="my-3 text-dark social-icons">

    <span class="h5 font-weight-bold"><i class="fas fa-share"></i> Share on: </span>
    
    {{-- Facebook --}}
    <a href="https://www.facebook.com/sharer.php?u={{ Request::url() }}" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fab fa-facebook-f"></i></a>

    {{-- Twitter --}}
    <a href="https://twitter.com/intent/tweet?url={{ Request::url() }}" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fab fa-twitter"></i></a>

    {{-- LinkedIn --}}
    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ Request::url() }}" data-toggle="tooltip" data-placement="top" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>

    {{-- WhatsApp --}}
    <a href="https://api.whatsapp.com/send?text={{ Request::url() }}" data-toggle="tooltip" data-placement="top" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>

    {{-- Email --}}
    <a href="https://mail.google.com/mail/u/0/?view=cm&fs=1&tf=1&source=mailto&su={{ $blogPost->name }}&body={{ Request::url() }}" data-toggle="tooltip" data-placement="top" title="Email"><i class="fas fa-envelope"></i></a>

    <a href="javascript:void(0)" data-toggle="modal" data-target="#copyLinkModal"><span data-toggle="tooltip" data-placement="top" title="Post Link"><i class="fas fa-link"></i></span></a>

</div>