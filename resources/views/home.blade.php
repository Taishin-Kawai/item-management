@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <h1>ようこそ！{{ Auth::user()->name }}さん</h1>

@stop

@section('content')
    <p>最終ログイン日<br>{{ Auth::user()->last_logout_at }}</p>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

