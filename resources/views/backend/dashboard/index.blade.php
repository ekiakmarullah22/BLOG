@extends('backend.layout.template')

@section('title', 'Dashboard - Admin')

@section('content')

{{-- CONTENT SECTION --}}
    
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Dashboard</h1>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="card text-bg-success mb-3" style="max-width: 100%;">
          <div class="card-header">Amount of Articles</div>
          <div class="card-body">
            <h5 class="card-title">All Articles that Has Been Submitted</h5>
            <p class="card-text">
              <a href="{{ url('articles') }}" class="btn btn-primary position-relative">
                Articles
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  {{ $totalArticles }}
                  <span class="visually-hidden">unread messages</span>
                </span>
              </a>
            </p>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card text-bg-secondary mb-3" style="max-width: 100%;">
          <div class="card-header">Amount of Categories</div>
          <div class="card-body">
            <h5 class="card-title">All Categories that Has Been Submitted</h5>
            <p class="card-text">
              <a href="{{ url('categories') }}" class="btn btn-primary position-relative">
                Categories
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  {{ $totalCategories }}
                  <span class="visually-hidden">unread messages</span>
                </span>
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="row my-2">
      <div class="col-lg-12">
        <h4>Latest Articles</h4>

        <table class="table table-bordered table-striped table-responsive">
          <thead>
            <tr>
              <th>No.</th>
              <th>Title</th>
              <th>Category</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($latestArticles as $article)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $article->title }}</td>
                  <td>{{ $article->Category->title }}</td>
                  <td>{{ $article->created_at->diffForHumans() }}</td>
                  <td>
                    <a href="{{ url('articles/'.$article->id) }}" class="btn btn-sm btn-secondary">Detail</a>
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="row my-2">
      <div class="col-lg-12">
        <h4>Popular Articles</h4>

        <table class="table table-bordered table-striped table-responsive">
          <thead>
            <tr>
              <th>No.</th>
              <th>Title</th>
              <th>Cateory</th>
              <th>Views</th>
              <td>Action</td>
            </tr>
          </thead>

          <tbody>
            @foreach ($popularArticles as $article)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $article->title }}</td>
                  <td>{{ $article->Category->title }}</td>
                  <td>{{ $article->views }} views</td>
                  <td>
                    <a href="{{ url('articles/'.$article->id) }}" class="btn btn-sm btn-secondary">Detail</a>
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>


    
    
  </main>
  {{-- END CONTENT SECTION --}}
    
@endsection
    
    
