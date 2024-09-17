@extends('frontend.layout.template')

@section('title', 'Laravel Blog | Articles Page')

@section('content')

<!-- Page content-->
<div class="container">
    <div class="mb-3">
        <form action="{{ route('search') }}" method="POST">
            @csrf
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" name="keyword"/>
                <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
            </div>
        </form>
    </div>

    @if ($keyword)
    <div class="mb-3">
        <p>Showing Post Based on Keyword : <strong>{{ $keyword }}</strong></p>
        <a href="{{ url('posts') }}" class="btn btn-sm btn-success mb-3">Reset</a>
    </div>
    @endif
    

    <div class="row">
        @forelse ($articles as $article)

        <div class="col-lg-6" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300">
            <!-- Blog post-->
            <div class="card mb-4 shadow-sm">
                <a href="{{ url('post/'.$article->slug) }}"><img class="card-img-top post-img img-fluid" src="{{ asset('storage/backEnd/'.$article->img) }}" alt="{{ $article->slug }}" /></a>
                <div class="card-body card-height">
                    <div class="small text-muted">
                        <span class="ml-3"><i class="fa-regular fa-calendar-days mx-2"></i>{{ $article->created_at->format('d-m-Y') }}</span>
                        <span class="ml-3">
                            <i class="fa-solid fa-hashtag"></i>
                            <a href="{{ url('category/'.$article->category->slug) }}">{{ $article->category->title }}</a>
                        </span>
                    </div>
                    <h2 class="card-title h4">{{ $article->title }}</h2>
                    <p class="card-text">{{ Str::limit(strip_tags($article->desc), 150, '...') }}</p>
                    <a class="btn btn-primary" href="{{ url('post/'.$article->slug) }}">Read more →</a>
                </div>
            </div>
        
        </div>
            
        @empty
            <h4>Data Articles tidak ditemukan...</h4>
        @endforelse
    </div>

        {{ $articles->links() }}
</div>
    
@endsection


        

        
