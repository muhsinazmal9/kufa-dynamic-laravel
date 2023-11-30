@extends('layouts.backend_master')

@section('main_content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="col">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">You are editing <a href="#">{{ $service->title }}</a> <a href="{{ route('services.index') }}" class="badge badge-success badge-style-light">Back to services</a></h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <span class="form-label">Update icon</span>
                                <div class="form-text mb-3">(It's using fontawesome 6.5.0 latest free icons!)</div>
                                <div class="row my-4" style="max-height: 300px; overflow-y:scroll;" >
                                    @foreach ($fonts as $font)
                                        <div class="form-check col-4 col-md-3 col-xl-2">
                                            <input @checked(old('icon', $service->icon) == $font) class="form-check-input" type="radio" name="icon" id="{{ $loop->iteration }}" value="{{ $font }}">
                                            <label class="btn btn-primary btn-style-light" for="{{ $loop->iteration }}">
                                                <i class="{{ $font }} fa-fw"></i>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>


                                <div class="input-group mb-3">
                                    <span class="input-group-text">Update Title</span>
                                    <input type="text" class="form-control" placeholder="e.g. Creative Design" name="title" value="{{ old('title', $service->title) }}">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Description</span>
                                    <textarea rows="5" class="form-control" placeholder="e.g. Lorem Ipsum..." name="description">{{ old('description', $service->description) }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-success">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection