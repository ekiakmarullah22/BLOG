@extends('frontend.layout.template')

@section('title', 'Laravel Blog | About Page')
    

@section('content')

<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4 shadow">
                <a href="javascript:void(0)"><img class="card-img-top featured-img img-fluid" src="{{ asset('frontend/assets/Laravel.png') }}" alt="Laravel Blog" /></a>
                <div class="card-body">
                    <div class="small text-muted">
                        <span class="ml-3"><i class="fa-regular fa-calendar-days mx-2"></i>{{ date('d/m/Y') }}</span>
                    </div>
                    <h2 class="card-title">About Laravel Blog</h2>
                    <p class="card-text">
                        Laravel Blog is simple blog project that use Framework Laravel, This is just sample project. I create this sample project to learn more about Laravel Framework.

                        If you found some bugs or miss leading words or mulfunction on this website please report it to me through my github page on <span><a href="https://github.com/ekiakmarullah22" target="__blank" class="nav-link"><i class="fa-brands fa-github-alt mx-2"></i>Github</a></span>
                    </p>
                </div>
            </div>
            <!-- Nested row for non-featured blog posts-->
        </div>

        <!-- Side widgets-->
        @include('frontend.layout.side-widget')
    </div>
</div>
    
@endsection


        

        
