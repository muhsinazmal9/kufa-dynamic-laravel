@extends('layouts.backend_master')

@section('main_content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">

            {{-- edit --}}
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('brands.index') }}" class="btn btn-secondary">Back to brands</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">You are editing brand > <a href="{{ $brand->brand_url }}" target="_blank">{{ $brand->brand_url }}</a></h3>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <img src="{{ asset($brand->image_url) }}" alt="brand_img">
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">Image</span>
                                    <input type="file" class="form-control" name="image_url" accept="image/*">
                                </div>
                                <div class="form-text mb-3">Upload white logo and aspect ratio (150*69) for better result</div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Website Url</span>
                                    <input type="text" class="form-control" placeholder="https://example.com" value="{{ $brand->brand_url }}" aria-label="Username" name="brand_url">
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection