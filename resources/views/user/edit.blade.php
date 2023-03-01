@extends('adminlte::page')

@section('title', '商品編集')

@section('content_header')
<h1>編集画面</h1>
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
      <form action="{{ route('user.update',['id' => $user->id] ) }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="name">ユーザーネーム</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
          </div>

          <div class="form-group">
            <label for="tel">電話番号</label>
            <input type="text" class="form-control" id="tel" name="tel" value="{{ $user->tel }}">
          </div>

          <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
          </div>

          <div class="form-group">
            <label for="address">住所</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
          </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-default">更 新</button>
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