@extends('layouts.backend_master')

@section('main_content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('services.create') }}" class="btn btn-success">Add new service</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Services <span class="align-middle badge badge-info badge-style-light">{{ $services->count() }} portfolio items found</span></h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead class="table-dark">
                                        <tr>
                                            <td scope="col">SL.</td>
                                            <td scope="col">Title</td>
                                            <td scope="col">Description</td>
                                            <td scope="col">Thumbnail Image</td>
                                            <td scope="col">Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($services as $service)
                                            <tr>
                                                <td scope="row">{{ $loop->iteration }}</td>
                                                <td>
                                                    <i class="btn btn-info btn-style-light {{ $service->icon }} fa-fw"></i>
                                                </td>
                                                <td><a href="#">{{ $service->title }}</a></td>
                                                <td width="400">
                                                    {!! Str::words(strip_tags($service->description), 10) !!}
                                                </td>
                                                
                                                <td class="d-flex flex-column gap-2">
                                                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-info">
                                                        <i class="material-icons">edit</i>Edit
                                                    </a>
                                                    <a href="{{ route('services.show', $service->id) }}" class="btn btn-primary">
                                                        <i class="material-icons">preview</i>Preview
                                                    </a>
                                                    <a href="{{ route('services.destroy', $service->id) }}" class="btn btn-danger" data-confirm-delete="true">
                                                        <i class="material-icons">delete</i>Delete
                                                    </a>
                
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">No Items Found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                {{ $services->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

