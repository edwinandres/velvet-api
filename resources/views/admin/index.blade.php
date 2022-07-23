@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
{{--    <h1>Dashboard</h1>--}}
@stop

@section('content')
{{--    <p>Welcome to this beautiful admin panel.</p>--}}
{{--    @livewire('dropdown-cart')--}}
@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="{{ asset('js/app.js') }}" defer></script>
@stop
