<div class="col-lg-4">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
            <form action="{{ route('search') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" name="keyword"/>
                    <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                </div>
            </form>
            
        </div>
    </div>
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div class="row">
                @forelse ($categories as $category)
                <div class="col-sm-6">
                    <ul class="list-unstyled mb-0">
                        <li>
                            
                            <a href="{{ url('category/'.$category->slug) }}" class="nav-link"><i class="fa-solid fa-hashtag mx-1"></i>{{ $category->title }} ({{ $category->articles_count }})</a>
                        
                        </li>
                    </ul>
                </div>
                @empty
                    <h4>Data Kategori tidak ditemukan...</h4>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Side widget-->
    <div class="card mb-4">
        <div class="card-header">Side Widget</div>
        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
    </div>

    <!-- Popular Post -->
    <div class="card mb-4">
        <div class="card-header">Popular Post</div>
        <div class="card-body">
            @forelse ($posts as $post)
            
                <div class="card my-2">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/backEnd/'.$post->img) }}" alt="{{ $post->slug }}" class="img-fluid">
                        </div>

                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="card-title">
                                    <a href="{{ url('post/'.$post->slug) }}" class="nav-link">{{ $post->title }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h4>Data Popular Post tidak ditemukan...</h4>
            @endforelse
        </div>
    </div>
</div>