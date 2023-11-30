@extends('layouts.backend_master')

@section('main_content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('portfolio-categories.index') }}" class="btn btn-secondary">Back to Categories</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">You are editing > {{ $category->name }}</h3>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('portfolio-categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Name *</span>
                                    <input type="text" class="form-control" name="name" aria-label="name" placeholder="e.g. Graphic Design" value="{{ $category->name }}">
                                </div>

                                <div class="input-group">
                                    <span class="input-group-text">Slug</span>
                                    <input type="text" class="form-control" placeholder="e.g. graphic-design (Optional)" aria-label="Username" name="slug" value="{{ $category->slug }}">
                                </div>
                                <div class="form-text mb-3">Enter URL-friendly slug or leave it empty.</div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Description</span>
                                    <textarea rows="5" type="text" class="form-control" placeholder="e.g. Lorem ipsum... (Optional)" aria-label="Username" name="description">{{ $category->description }}</textarea>
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

