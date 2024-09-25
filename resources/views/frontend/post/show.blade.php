@extends('frontend.layout.template')

@push('meta')

<meta name="description" content="Watabe Orenji Blog merupakan project sederhana dari website blog menggunakan framework Laravel versi 10 dan template dari Bootstrap 5" />
<meta name="keyword" content="watabe orenji, eki akmarullah, blog, laravel 10, bootstrap 5, about watabe orenji blog" />
<meta property="og:title" content="Laravel Blog | "{{ $article->title }} />
<meta property="og:site_name" content="Watabe Orenji Blog" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:description" content="Watabe Orenji Blog merupakan project sederhana dari website blog menggunakan framework Laravel versi 10 dan template dari Bootstrap 5" />
<meta property="og:image" content="{{ asset('storage/backEnd/'.$article->img) }}">


@endpush

@section('title', $article->title)

@section('content')

<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4">
                <img class="card-img-top post-img img-fluid" src="{{ asset('storage/backEnd/'.$article->img) }}" alt="{{ $article->slug }}" />
                <div class="card-body">
                    <div class="small text-muted">
                        <span class="ml-3"><i class="fa-regular fa-calendar-days mx-2"></i>{{ $article->created_at->format('d-m-Y') }}</span>
                        
                        <span class="ml-3">
                            <i class="fa-solid fa-hashtag mx-2"></i>
                            <a href="{{ url('category/'.$article->category->slug) }}">{{ $article->category->title }}</a>
                        </span>

                        <span class="ml-3"><i class="fa-solid fa-user mx-2"></i>{{ $article->User->name }}</span>
                        
                        <span class="ml-3"><i class="fa-regular fa-eye mx-2"></i>{{ $article->views }} views</span>
                        
                    </div>
                    <h1 class="card-title">{{ $article->title }}</h1>
                    <p class="card-text">{!! $article->desc !!}</p>
                    <div class="my-2">
                        <h4>Share this article on social media</h4>
                        <a href="https://www.facebook.com/sharer.php?u={{ url()->current() }}" class="btn btn-sm btn-primary" target="__blank"><i class="fa-brands fa-facebook mx-2"></i>Facebook</a>

                        <a href="https://api.whatsapp.com/send?text={{ url()->current() }}" class="btn btn-sm btn-success" target="__blank"><i class="fa-brands fa-whatsapp mx-2"></i>Whatsapp</a>

                        <a href="https://twitter.com/intent/tweet?text={{ url()->current() }}" class="btn btn-sm btn-info text-light" target="__blank"><i class="fa-brands fa-twitter mx-2"></i>Twitter</a>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- Side widgets-->
        @include('frontend.layout.side-widget')
    </div>
</div>
    
@endsection


        

        
