@extends('adminlte::page')

@section('title', '商品詳細')

@section('content_header')
<h1>削除確認ページ</h1>
@stop

@section('content')
<div class="row">
  <div class="col-md-10">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <div class="card card-primary">

      <div class="card-body">

      <div class="form-group">
          <label for="name">登録日</label>
          <div class="form-control">{{ Auth::user()->created_at->format('Y/m/d') }}</div>
        </div>

        <div class="form-group">
          <label for="name">ユーザーID</label>
          <div class="form-control">{{ Auth::user()->id }}</div>
        </div>

        <div class="form-group">
          <label for="name">ユーザーネーム</label>
          <div class="form-control">{{ Auth::user()->name }}</div>
        </div>

        <div class="form-group">
          <label for="name">性別</label>
          <div class="form-control">{{ $gender }}</div>
        </div>

        <div class="form-group">
          <label for="age">年齢</label>
          <div class="form-control">{{ Auth::user()->age }}</div>
        </div>

        <div class="form-group">
          <label for="tel">電話番号</label>
          <div class="form-control">{{ Auth::user()->tel }}</div>
        </div>

        <div class="form-group">
          <label for="name">メールアドレス</label>
          <div class="form-control">{{ Auth::user()->email }}</div>
        </div>

        <div class="form-group">
          <label for="address">住所</label>
          <div class="form-control">{{ Auth::user()->address }}</div>
        </div>

      <form id="delete_{{ Auth::user()->id }}" method="post" action="{{ route('user.destroy', $user->id ) }}">
        @csrf
        <div class="card-footer">
          <a class="btn btn-outline-danger" data-id="{{ Auth::user()->id }}" onclick="deletePost(this)">アカウント削除</a>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- 削除時確認メッセージ -->
<script>
  function deletePost(e) {
    'use strict'
    if (confirm('本当に削除してもよろしいですか？')) {
      document.getElementById('delete_' + e.dataset.id).submit()
    }
  }
</script>
@stop

@section('css')
@stop

@section('js')
@stop