@extends('layouts.frontend_app')

@section('frontend_meta_tags')
    @include('layouts.templates.frontend.meta_tags')
@endsection

@section('frontend_title')
    {{ 'Home' }}
@endsection

@section('frontend_content')
    <!-- about section -->
    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
        <div class="w-100">
          <h2 class="mb-0">Abdul
            <span class="text-primary">Majid</span>
          </h2>
          <div class="subheading mb-5">Web Developer.
          </div>
          <p class="lead mb-5 text-justify">Hi, I'm Md Abdul Majid. I'm a Laravel Developer. I develop web applications using PHP language and Laravel framework. Programming is my love, not only a profession! You can develop your web application with your choice and always I'll able to you!</p>
          <div class="social-icons">
            <h4 class="text-capitalize">Connect with me</h4>
            <a href="https://www.github.com/abdulmajidcse" data-toggle="tooltip" data-placement="top" title="Github" target="_blank">
              <i class="fab fa-github"></i>
            </a>
            <a href="https://www.linkedin.com/in/abdulmajidcse" data-toggle="tooltip" data-placement="top" title="LinkedIn" target="_blank">
              <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="https://twitter.com/abdulmajidcse" data-toggle="tooltip" data-placement="top" title="Twitter" target="_blank">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.facebook.com/abdulmajidcse" data-toggle="tooltip" data-placement="top" title="Facebook" target="_blank">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://www.youtube.com/channel/UC74l6d0jcefsx0JvHvW4K2Q" data-toggle="tooltip" data-placement="top" title="YouTube" target="_blank">
              <i class="fab fa-youtube"></i>
            </a>
          </div>
        </div>
    </section> <!-- end of about section -->
  
    <hr class="m-0">
  
    <!-- skill section -->
    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="skills">
        <div class="w-100">
          <h2 class="mb-5">Skills</h2>
  
          <div class="subheading  mt-4 text-capitalize">Professional Experience</div>
          <p> I am professional on these Technologies. Most of the time I work on these </p>
  
          <ul class="list-inline dev-icons">
            <li class="list-inline-item">PHP</li>
            <li class="list-inline-item">SQL</li>
            <li class="list-inline-item">MySql</li>
            <li class="list-inline-item">WordPress</li>
            <li class="list-inline-item">Laravel</li>
          </ul>
          
          <ul class="list-inline dev-icons">  
            <li class="list-inline-item">HTML</li>
            <li class="list-inline-item">CSS</li>
            <li class="list-inline-item">JavaScript</li>
            <li class="list-inline-item">JQuery</li>
            <li class="list-inline-item">Ajax</li>
            <li class="list-inline-item">Bootstrap</li>
          </ul>
          
          <ul class="list-inline dev-icons">
            <li class="list-inline-item">Git</li>
            <li class="list-inline-item">Linux</li>
            <li class="list-inline-item">Windows</li>
          </ul>
  
  
          <div class="subheading  mt-4 text-capitalize">Familiar</div>
          <p> I have basic knowledge of these but not skilled for development. </p>
          <ul class="list-inline dev-icons">
            <li class="list-inline-item">C</li>
            <li class="list-inline-item">C#</li>
            <li class="list-inline-item">Python</li>
            <li class="list-inline-item">Java</li>
          </ul>
  
          <div class="subheading  mt-4 text-capitalize">IDE and Text Editors</div>
          <ul class="list-inline dev-icons">
            <li class="list-inline-item">PhpStrom</li>
            <li class="list-inline-item">VS Code</li>
            <li class="list-inline-item">Subllime Text</li>
            <li class="list-inline-item">Bracket</li>
            <li class="list-inline-item">Notepad++</li>
          </ul>
          
        </div>

    </section> <!-- end of skill section -->

    <hr class="m-0">
  
    <!-- recent posts section -->
    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="recent-posts">
        <div class="w-100">
            <h2 class="mb-5">Recent Posts</h2>

            @include('layouts.templates.frontend.all_post')

            <p class="text-center mt-1"><a href="{{ route('frontend.blog.index') }}" class="btn btn-flat btn-danger font-weight-bold"> See More Posts </a></p>

        </div>

    </section> <!-- end of recent posts section -->

@endsection