@extends('layouts.backend_master')

@section('main_content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add new category</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('portfolio-categories.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Name *</span>
                                    <input type="text" class="form-control" name="name" aria-label="name" placeholder="e.g. Graphic Design">
                                </div>

                                <div class="input-group">
                                    <span class="input-group-text">Slug</span>
                                    <input type="text" class="form-control" placeholder="e.g. graphic-design (Optional)" aria-label="Username" name="slug">
                                </div>
                                <div class="form-text mb-3">Enter URL-friendly slug or leave it empty.</div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Description</span>
                                    <textarea rows="5" type="text" class="form-control" placeholder="e.g. Lorem ipsum... (Optional)" aria-label="Username" name="description"></textarea>
                                </div>

                                <button type="submit" class="btn btn-success">Add new category</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Categories</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">SL.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Slug</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($categories as $category)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>{!! $category->description ?: '<span class="text-danger">No Description</span>' !!}</td>
                                            <td>
                                                <a href="{{ route('portfolio-categories.edit', $category->id) }}" type="submit" class="btn btn-info">
                                                    <i class="material-icons">edit</i>Edit
                                                </a>

                                                <a href="{{ route('portfolio-categories.destroy', $category->id) }}" class="btn btn-danger" data-confirm-delete="true">
                                                    <i class="material-icons">delete</i>Delete
                                                </a>

                                            </td>
                                        </tr>
                                        
                                        @empty
                                            <tr>
                                                <td colspan="5">
                                                    No data found
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                {{ $categories->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

