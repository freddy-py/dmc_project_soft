@extends('layouts.app')

@section('content')
@if(Auth::check())
    @include('includes.card')
    
@endif

@endsection
