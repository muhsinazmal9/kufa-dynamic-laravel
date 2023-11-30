@extends('layouts.backend_master')

@section('main_content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="col">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Service <a href="{{ route('services.index') }}" class="badge badge-success badge-style-light">See all services</a></h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <span class="form-label">Select an icon</span>
                                <div class="form-text mb-3">(It's using fontawesome 6.5.0 latest free icons!)</div>
                                <div class="row my-4" style="max-height: 300px; overflow-y:scroll;" >
                                    @foreach ($fonts as $font)
                                        <div class="form-check col-4 col-md-3 col-xl-2">
                                            <input @checked(old('icon') == $font) class="form-check-input" type="radio" name="icon" id="{{ $loop->iteration }}" value="{{ $font }}">
                                            <label class="btn btn-primary btn-style-light" for="{{ $loop->iteration }}">
                                                <i class="{{ $font }} fa-fw"></i>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                {{-- <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="fbnjkhb">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Default radio
                                    </label>
                                </div> --}}
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Service Title</span>
                                    <input type="text" class="form-control" placeholder="e.g. Creative Design" name="title" value="{{ old('title') }}">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text">Description</span>
                                    <textarea rows="5" class="form-control" placeholder="e.g. Lorem Ipsum..." name="description">{{ old('description') }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

