@extends('frontend.layout.template')

@section('title', 'Laravel Blog | Category Page')

@section('content')

<!-- Page content-->
<div class="container">
    

    
    <div class="mb-3">
        <p>Showing Post Based on category : <strong>{{ $category }}</strong></p>
    </div>
    
    

    <div class="row">
        @forelse ($articles as $article)

        <div class="col-lg-6">
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
            <h4>Data Articles tidak ditemukan...</h4>
        @endforelse
    </div>

        {{ $articles->links() }}
</div>
    
@endsection


        

        
