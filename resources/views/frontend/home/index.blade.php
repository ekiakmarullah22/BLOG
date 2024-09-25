@extends('frontend.layout.template')

@push('meta')

<meta name="description" content="Watabe Orenji Blog merupakan project sederhana dari website blog menggunakan framework Laravel versi 10 dan template dari Bootstrap 5" />
<meta name="keyword" content="watabe orenji, eki akmarullah, blog, laravel 10, bootstrap 5" />
<meta property="og:title" content="Laravel Blog | Home Page" />
<meta property="og:site_name" content="Watabe Orenji Blog" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:description" content="Watabe Orenji Blog merupakan project sederhana dari website blog menggunakan framework Laravel versi 10 dan template dari Bootstrap 5" />
<meta property="og:image" content="{{ asset('storage/backEnd/'.$latest_post->img) }}">


@endpush

@section('title', 'Laravel Blog | Home Page')
    

@section('content')

<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
            <!-- Featured blog post-->
            <div class="card mb-4 shadow">
                <a href="{{ url('post/'.$latest_post->slug) }}"><img class="card-img-top featured-img img-fluid" src="{{ asset('storage/backEnd/'.$latest_post->img) }}" alt="{{ $latest_post->slug }}" /></a>
                <div class="card-body">
                    <div class="small text-muted">
                        <span class="ml-3"><i class="fa-solid fa-calendar-days mx-2"></i>{{ $latest_post->created_at->format('d-m-Y') }}</span>

                        <span class="ml-3"><i class="fa-solid fa-user mx-2"></i>{{ $latest_post->User->name }}</span>

                        <span class="ml-3">
                            <i class="fa-solid fa-hashtag"></i>
                            <a href="{{ url('category/'.$latest_post->category->slug) }}">{{ $latest_post->category->title }}</a>
                        </span>
                    </div>
                    <h2 class="card-title"><a href="{{ url('post/'.$latest_post->slug) }}" class="nav-link">{{ $latest_post->title }}</a></h2>
                    <p class="card-text">{{ Str::limit(strip_tags($latest_post->desc), 250, '...') }}</p>
                    <a class="btn btn-primary" href="{{ url('post/'.$latest_post->slug) }}">Read more →</a>
                </div>
            </div>
            <!-- Nested row for non-featured blog posts-->
            <div class="row">
                @forelse ($articles as $article)

                <div class="col-lg-6" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="600">
                    <!-- Blog post-->
                    <div class="card mb-4 shadow-sm">
                        <a href="{{ url('post/'.$article->slug) }}"><img class="card-img-top post-img img-fluid" src="{{ asset('storage/backEnd/'.$article->img) }}" alt="{{ $article->slug }}" /></a>
                        <div class="card-body card-height">
                            <div class="small text-muted">
                                <span class="ml-3"><i class="fa-regular fa-calendar-days mx-2"></i>{{ $article->created_at->format('d-m-Y') }}</span>

                                <span class="ml-3"><i class="fa-solid fa-user mx-2"></i>{{ $article->User->name }}</span>

                                <span class="ml-3">
                                    <i class="fa-solid fa-hashtag"></i>
                                    <a href="{{ url('category/'.$article->category->slug) }}">{{ $article->category->title }}</a>
                                </span>
                            </div>
                            <h2 class="card-title h4"><a href="{{ url('post/'.$article->slug) }}" class="nav-link">{{ $article->title }}</a></h2>
                            <p class="card-text">{{ Str::limit(strip_tags($article->desc), 150, '...') }}</p>
                            <a class="btn btn-primary" href="{{ url('post/'.$article->slug) }}">Read more →</a>
                        </div>
                    </div>
                
                </div>
                    
                @empty
                    <h4>Data Artikel tidak ditemukan...</h4>
                @endforelse
                
            </div>
            <!-- Pagination-->
            {{-- <nav aria-label="Pagination">
                <hr class="my-0" />
                <ul class="pagination justify-content-center my-4">
                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                    <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                    <li class="page-item"><a class="page-link" href="#!">2</a></li>
                    <li class="page-item"><a class="page-link" href="#!">3</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                    <li class="page-item"><a class="page-link" href="#!">15</a></li>
                    <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                </ul>
            </nav> --}}

            <div class="pagination justify-content-center my-4">
                {{ $articles->links() }}
            </div>
        </div>

        <!-- Side widgets-->
        @include('frontend.layout.side-widget')
    </div>
</div>
    
@endsection


        

        
