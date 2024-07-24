@extends('backend.layout.template')

@section('title', 'All Categories - Admin')

@section('content')

{{-- CONTENT SECTION --}}
    
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Categories</h1>
    </div>

    <div class="mt-3">
        <button class="my-3 btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalCreate">Create New Category</button>

        @if ($errors->any())
            <div class="my-3">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                        <strong>Form Error!</strong> {{ $error }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    @endforeach
                    
                  </div>
            </div>
        @endif

        @if (session('success'))
            <div class="my-3">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Form Message!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    
                  </div>
            </div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Creted At</th>
                    <th class="text-center">Function</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#modalUpdate{{ $category->id }}">Edit</button>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $category->id }}">Delete</button>
                        </td>
                    </tr>
                @empty
                    <h4>Data Categories Tidak Ditemukan...</h4>
                @endforelse
            </tbody>
        </table>

        {{ $categories->links() }}
      </div>

      @include('backend.category.create-modal')

      @include('backend.category.update-modal')

      @include('backend.category.delete-modal')

  </main>
  {{-- END CONTENT SECTION --}}
    
@endsection
    
    
