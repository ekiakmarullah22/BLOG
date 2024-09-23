@extends('backend.layout.template')

@section('title', 'All Configs - Admin')

@section('content')

{{-- CONTENT SECTION --}}
    
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Configurations</h1>
    </div>

    <div class="mt-3">

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
                    <th>Value</th>
                    <th class="text-center">Function</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($configs as $config => $key)
                    <tr>
                        <td>{{ $configs->firstItem() + $config }}</td>
                        <td>{{ $key->name }}</td>
                        <td>{{ $key->value }}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#modalUpdate{{ $key->id }}">Edit</button>
                        </td>
                    </tr>
                @empty
                    <h4>Data Config Tidak Ditemukan...</h4>
                @endforelse
            </tbody>
        </table>

        {{ $configs->links() }}
      </div>

      

      @include('backend.config.update-modal')

      

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
    
    
