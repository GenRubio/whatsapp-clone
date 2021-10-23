@extends('layout.app')

@section('content')
    @auth
        @include('pages.chat')
    @else
        @include('pages.validation')
    @endauth
@endsection
