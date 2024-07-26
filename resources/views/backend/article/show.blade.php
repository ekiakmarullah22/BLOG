@extends('backend.layout.template')

@section('title', 'Detail Article - Admin')
    

@section('content')

{{-- CONTENT SECTION --}}
    
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Detail Article</h1>
    </div>

    <div class="mt-3">
        
        <table class="table table-striped table-bordered" style="width:100%">
            <tr>
                <th>Title</th>
                <td>: {{ $article->title }}</td>
            </tr>

            <tr>
                <th>Category</th>
                <td>: {{ $article->Category->title }}</td>
            </tr>

            <tr>
                <th>Description</th>
                <td>: {{ $article->desc }}</td>
            </tr>

            <tr>
                <th>Image</th>
                <td>
                    <a href="{{ asset('storage/backEnd/'.$article->img) }}" target="__blank">
                        <img src="{{ asset('storage/backEnd/'.$article->img) }}" alt="" class="img-thumbnail" width="200">
                    </a>
                    
                </td>
            </tr>

            <tr>
                <th>Views</th>
                <td>: {{ $article->views }} views</td>
            </tr>

            <tr>
                <th>Status</th>
                @if ($article->status == 1)
                    <td>: <span class="badge text-bg-success">Published</span></td>
                @else
                <td>: <span class="badge text-bg-danger">Private</span></td>
                @endif
            </tr>

            <tr>
                <th>Published Date</th>
                <td>: {{ $article->publish_date }}</td>
            </tr>
        </table>

        <div class="float-end">
            <div class="mb-3">
                <a href="{{ url('articles') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>

        
    </div>
</main>

@endsection