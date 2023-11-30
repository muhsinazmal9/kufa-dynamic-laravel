@extends('layouts.backend_master')

@section('main_content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('portfolios.create') }}" class="btn btn-success">Add new portfolio item</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Portfolio Items <span class="align-middle badge badge-info badge-style-light">{{ $portfolios->count() }} portfolio items found</span></h3>
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
                                        @forelse ($portfolios as $item)
                                            <tr>
                                                <td scope="row">{{ $loop->iteration }}</td>
                                                <td><a href="#">{{ $item->title }}</a> <br/> <span class="align-middle badge badge-info badge-style-light">{{ $item['category']->name }}</span></td>
                                                <td width="400">
                                                    {!! Str::words(strip_tags($item->description), 10) !!}
                                                </td>
                                                <td>
                                                    <img width="100" src="{{ asset($item->thumbnail_image) }}" alt="thumbnail_image">
                                                </td>
                                                <td class="d-flex flex-column gap-2">
                                                    <a href="{{ route('portfolios.edit', $item->id) }}" class="btn btn-info">
                                                        <i class="material-icons">edit</i>Edit
                                                    </a>

                                                    <a href="{{ route('portfolios.show', $item->id) }}" class="btn btn-primary">
                                                        <i class="material-icons">preview</i>Preview
                                                    </a>

                                                    <a href="{{ route('portfolios.destroy', $item->id) }}" class="btn btn-danger" data-confirm-delete="true">
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
                                {{ $portfolios->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

