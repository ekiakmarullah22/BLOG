@extends('backend.layout.template')

@section('title', 'Update Article - Admin')

@section('content')

{{-- CONTENT SECTION --}}
    
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Update Article</h1>
    </div>

    <div class="mt-3">

        <form action="{{ url('articles/'.$article->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <input type="hidden" name="oldImage" value="{{ $article->img }}">

            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="title">Article Title</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $article->title) }}">

                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control @error('title') is-invalid @enderror">

                            @forelse ($categories as $category)
                            @if ($category->id == $article->category_id)
                            <option value="{{ $category->id }}" selected>{{ $category->title }}</option>  
                            @else
                            <option value="{{ $category->id }}">{{ $category->title }}</option> 
                            @endif
                            @empty
                                <h4>Data Category Tidak Ditemukan....</h4>
                            @endforelse
                        </select>

                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="desc">Description</label>
                <textarea id="my-editor" name="desc" class="form-control">{!! old('desc', $article->desc) !!}</textarea>

                @error('desc')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="img">Image (Max: 2MB)</label>
                <input type="file" name="img" id="img" class="form-control @error('img') is-invalid @enderror">
                <div class="my-2">
                    <img src="{{ asset('storage/backEnd/'.$article->img) }}" alt="" class="img-thumbnail img-preview" width="200">
                </div>

                @error('img')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="status">Article Status</label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="1" {{ $article->status == 1 ? 'selected' : null }}>Publish</option>
                            <option value="0" {{ $article->status == 0 ? 'selected' : null }}>Private</option>
                        </select>

                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="publish_date">Published Date</label>
                        <input type="date" name="publish_date" id="publish_date" class="form-control @error('publish_date') is-invalid @enderror" value="{{ old('publish_date', $article->publish_date) }}">

                        @error('publish_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="float-end">
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Update Article</button>
                </div>
            </div>
        </form>

        
    </div>
</main>

@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

    <script>
        var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
        clipboard_handleImage: false
        };
    </script>

    <script>
    CKEDITOR.replace('my-editor', options);
    </script>

<script>
    $("#img").change(function() {
        previewImage(this);
    });

    function previewImage(input) {
        if(input.files && input.files[0]){
            var reader = new FileReader();

            reader.onload = function(e) {
                $(".img-preview").attr("src", e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush