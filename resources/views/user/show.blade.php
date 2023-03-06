@extends('adminlte::page')

@section('title', '商品詳細')

@section('content_header')
<h1>{{ Auth::user()->name }}さんのマイページ</h1>
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
          <label for="created_at">登録日</label>
          <div class="form-control">{{ Auth::user()->created_at->format('Y/m/d') }}</div>
        </div>

        <div class="form-group">
          <label for="id">ユーザーID</label>
          <div class="form-control">{{ Auth::user()->id }}</div>
        </div>

        <div class="form-group">
          <label for="name">ユーザーネーム</label>
          <div class="form-control">{{ Auth::user()->name }}</div>
        </div>

        <div class="form-group">
          <label for="gender">性別</label>
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
          <label for="email">メールアドレス</label>
          <div class="form-control">{{ Auth::user()->email }}</div>
        </div>

        <div class="form-group">
          <label for="address">住所</label>
          <div class="form-control">{{ Auth::user()->address }}</div>
        </div>

      <form method="post">
        <div class="card-footer">
          <a href="{{ route('user.edit', ['id' => $user->id ] ) }}" class="btn btn-outline-primary">登録情報編集</a>
        </div>
      </form>



      <form method="post">
        @csrf
        <div class="card-footer">
          <a href="{{ route('user.confirm', ['id' => $user->id ] ) }}" class="btn btn-outline-danger" >アカウント削除</a>
        </div>
      </form>

    </div>
  </div>
</div>

@stop

@section('css')
@stop

@section('js')
@stop