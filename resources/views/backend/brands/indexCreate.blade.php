@extends('layouts.backend_master')


@section('main_content')
    <div class="app-content">
        <div class="content-wrapper">
            <div class="container-fluid">
                {{-- add --}}
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add new brand</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">Image</span>
                                        <input type="file" class="form-control" name="image_url" accept="image/*">
                                    </div>
                                    <div class="form-text mb-3">Use white logo and aspect ratio (150*69) for better result</div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Website Url</span>
                                        <input type="text" class="form-control" placeholder="https://example.com" aria-label="Username" name="brand_url">
                                    </div>
                                    <button type="submit" class="btn btn-success">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Brands List</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">SL.</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Website URL</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @forelse ($brands as $brand)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td class="bg-light">
                                                    <img src="{{ asset($brand->image_url) }}" alt="">
                                                </td>
                                                <td>{{ $brand->brand_url }}</td>
                                                <td>
                                                    <a href="{{ route('brands.edit', $brand->id) }}" type="submit" class="btn btn-info">
                                                        <i class="material-icons">edit</i>Edit
                                                    </a>

                                                    <a href="{{ route('brands.destroy', $brand->id) }}" class="btn btn-danger" data-confirm-delete="true">
                                                        <i class="material-icons">delete</i>Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4">
                                                        No data found
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    {{ $brands->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- list --}}
                {{-- <div class="row">
                    
                </div> --}}
            </div>
        </div>
    </div>
@endsection