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

        <div class="swal" data-swal = "{{ session('success') }}"></div>

        <table class="table table-striped table-bordered table-responsive">
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
                @forelse ($categories as $category => $key)
                    <tr>
                        <td>{{ $categories->firstItem() + $category }}</td>
                        <td>{{ $key->title }}</td>
                        <td>{{ $key->slug }}</td>
                        <td>{{ $key->created_at }}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#modalUpdate{{ $key->id }}">Edit</button>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $key->id }}">Delete</button>
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

@push('js')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
<script>
    const swal = $(".swal").data("swal");

    if(swal) {
        Swal.fire({
        position: "top-end",
        icon: "success",
        title: swal,
        showConfirmButton: false,
        timer: 1500
        });
    }
</script>
@endpush
    
    
