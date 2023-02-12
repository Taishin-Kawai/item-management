@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@if (Auth::check())
  <h1>ようこそ！<br>{{ Auth::user()->name }}さん</h1>
@endif
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

