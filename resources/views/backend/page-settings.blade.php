@extends('layouts.backend_master')

@section('main_content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="col">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Update Page Settings</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('settings.page') }}" method="POST">
                                @csrf
                                @method('PATCH')
                                @foreach(json_decode($pageSettings, true) as $setting)
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" @checked($setting['status'] == true) name="{{ $setting['key'] }}" value="{{ true }}" id="{{ $loop->index }}">
                                        <label class="form-check-label text-capitalize" for="{{ $loop->index }}">
                                            {{ $setting['key'] }} Section
                                        </label>
                                    </div>
                                @endforeach
                                <button class="btn btn-success">Save!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection