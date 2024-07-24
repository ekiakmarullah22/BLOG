@extends('backend.layout.template')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.0/css/dataTables.bootstrap5.min.css">
@endpush

@section('title', 'All Articles - Admin')
    

@section('content')

{{-- CONTENT SECTION --}}
    
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Articles</h1>
    </div>

    <div class="mt-3">
        <button class="my-3 btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalCreate">Create New Article</button>

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

        <table class="table table-striped table-bordered" id="myTable" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Category</th>
                    <td>Views</td>
                    <th>Status</th>
                    <th>Published Date</th>
                    <th class="text-center">Function</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        
    </div>
</main>

@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.1.0/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.0/js/dataTables.bootstrap5.min.js"></script>
    
    

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                processing: true,
                serverside: true,
                ajax: '{{ url()->current() }}',
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'category_id',
                        name: 'category_id'
                    },
                    {
                        data: 'views',
                        name: 'views'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'publish_date',
                        name: 'publish_date'
                    },
                    {
                        data: 'button',
                        name: 'button'
                    },
                ]
            });
        });
    </script>
@endpush