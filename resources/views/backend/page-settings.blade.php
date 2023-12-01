@extends('layouts.backend_master')

@section('main_content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="col">
                <div class="row">
                    @if ($pageSettings['contact']->status == true)
                        
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection