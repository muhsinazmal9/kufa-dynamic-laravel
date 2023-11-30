@extends('layouts.backend_master')

@section('main_content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">You are editing <a href="#">{{ $item->title }}</a> <a href="{{ route('portfolios.index') }}" class="badge badge-success badge-style-light">Back to portfolio items</a></h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('portfolios.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('Patch')
                        {{-- title --}}
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="portfolioTitle" placeholder="Title" name="title" value="{{ old('title', $item->title) }}">
                            <label for="portfolioTitle">Title</label>
                        </div>

                        {{-- category id --}}
                        <div class="form-group mb-3">
                            <label for="portfolioCategory" class="form-label">Select Category</label>
                            <select id="portfolioCategory" name="category_id" class="js-states form-control d-none" style="width: 100%;" tabindex="-1">
                                <optgroup>
                                    @foreach ($categories as $category)
                                        <option
                                            @selected(old('category_id', $item->category_id) == $category->id) 
                                            value="{{ $category->id }}">{{ $category->name }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>

                        {{-- thumbnail_image --}}
                        <div class="card mb-4 align-items-center">
                            <img class="mt-4" width="100" src="{{ asset($item->thumbnail_image) }}" alt="thumbnail_image">
                            <div class="card-body">
                                <div class="input-group">
                                    <span class="input-group-text">Thumbnail Image</span>
                                    <input type="file" class="form-control" name="thumbnail_image" accept="image/*">
                                </div>
                            </div>
                        </div>

                        {{-- description (summernote) --}}
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Item Description</label>
                            <textarea id="summernote" name="description" class="form-control" id="description">{{ old('description', $item->description) }}</textarea>
                        </div>

                        <button class="btn btn-success">Update portfolio item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('specific_css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link href="{{ asset('backend_assets') }}/plugins/select2/css/select2.min.css" rel="stylesheet" />
@endpush

@push('specific_js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="{{ asset('backend_assets') }}/plugins/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('backend_assets') }}/js/pages/text-editor.js"></script>
    <script>
        $('select').select2({
            "language": {
                "noResults": function(){
                    return "No Results Found <a href='{{ route('portfolio-categories.index') }}' class='btn btn-success align-middle'>Create One</a>";
                }
            },
            escapeMarkup: function (markup) {
                return markup;
            }
        });

    </script>
@endpush