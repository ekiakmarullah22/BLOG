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
                        <li><a href="#!" class="nav-link">{{ $category->title }}</a></li>
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
</div>