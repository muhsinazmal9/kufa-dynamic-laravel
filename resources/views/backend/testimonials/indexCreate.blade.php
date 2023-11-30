@extends('layouts.backend_master')

@section('main_content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add Testimonial / Customer Review</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">

                                {{-- client avatar --}}
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Client Avatar</span>
                                    <input type="file" class="form-control" name="client_avatar" accept="image/*">
                                </div>

                                {{-- client name --}}
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Name *</span>
                                    <input type="text" class="form-control" placeholder="e.g. Muhsin Azmal" name="client_name" value="{{ old('client_name') }}">
                                </div>

                                {{-- client from / post --}}
                                <div class="input-group mb-3">
                                    <span class="input-group-text">From where / Post *</span>
                                    <input type="text" class="form-control" placeholder="e.g. From Fiverr / Senior developer..." name="client_designation" value="{{ old('client_designation') }}">
                                </div>

                                {{-- satisfactory_text --}}
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Satisfactory Message</span>
                                    <textarea rows="5" class="form-control" placeholder="e.g. An event is a message sent by an object.." name="satisfactory_text">{{ old('satisfactory_text') }}</textarea>
                                </div>

                                {{-- Validated URL --}}
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Validated Url</span>
                                    <input type="text" class="form-control" placeholder="e.g. https://www.example.com" name="validated_url" value="{{ old('validated_url') }}">
                                </div>


                                <button type="submit" class="btn btn-success">Add Testimonial / Review</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Muhsin</h3>
                        </div>
                        <div class="card-body">
                            sdijj
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

