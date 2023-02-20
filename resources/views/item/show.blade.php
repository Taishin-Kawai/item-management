@extends('adminlte::page')

@section('title', '商品詳細')

@section('content_header')
<h1>商品ID.{{ $item->id }}</h1>
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
          <label for="name">名 前</label>
          <div class="form-control">{{ $item->name }}</div>
        </div>

        <div class="form-group">
          <label for="name">価 格</label>
          <div class="form-control">{{ $item->price }}</div>
        </div>

        <div class="form-group">
          <label for="status" id="status" name="status">状 態</label><br>
          <div class="form-control">{{ $item->status }}</div>

        </div>

        <div class="form-group">
          <label for="type">個 数</label>
          <div class="form-control">{{ $item->type }}</div>
        </div>

        <div class="form-group">
          <label for="detail">詳 細</label>
          <div class="form-control">{{ $item->detail }}</div>
        </div>
      </div>

      <form method="post">
        <div class="card-footer">
          <a href="{{ route('item.edit', ['id' => $item->id ] ) }}" class="btn btn-outline-primary">編 集</a>
        </div>
      </form>

      <form id="delete_{{ $item->id }}" method="post" action="{{ route('item.destroy', ['id' => $item->id ] ) }}">
        @csrf
        <div class="card-footer">
          <a class="btn btn-outline-danger" data-id="{{ $item->id }}" onclick="deletePost(this)">削 除</a>
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