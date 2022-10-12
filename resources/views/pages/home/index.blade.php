@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="home-title">Home Page</h1>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .home-title{
            padding-top: 100px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: 61px;
            color: #888f9c;
        }
    </style>
@endpush

