{{-- Social Share --}}
<div class="m-2 text-dark">

    <span class="h6 font-weight-bold mr-1"><i class="fas fa-share"></i> Share on: </span>
    
    {{-- Facebook --}}
    <a target="__blank" href="https://www.facebook.com/sharer.php?u={{ 'https://prothomalo.com' }}"><i class="fab fa-facebook-square"></i></a>

    {{-- Twitter --}}
    <a target="__blank" href="https://twitter.com/intent/tweet?url={{ 'https://prothomalo.com' }}"><i class="fab fa-twitter-square"></i></a>

    {{-- LinkedIn --}}
    <a target="__blank" href="https://www.linkedin.com/sharing/share-offsite/?url={{ 'https://prothomalo.com' }}"><i class="fab fa-linkedin"></i></a>

    {{-- WhatsApp --}}
    <a target="__blank" href="https://api.whatsapp.com/send?text={{ 'https://prothomalo.com' }}"><i class="fab fa-whatsapp-square"></i></a>

    {{-- Email --}}
    <a target="__blank" href="https://mail.google.com/mail/u/0/?view=cm&fs=1&tf=1&source=mailto&su={{ $blogPost->name }}&body={{ 'https://prothomalo.com' }}"><i class="fas fa-envelope-square"></i></a>

</div>