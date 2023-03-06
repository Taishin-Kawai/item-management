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
      <form action="{{ route('item.update',['id' => $item->id] ) }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="name">名 前</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
          </div>

          <div class="form-group">
            <label for="price">価 格</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ $item->price }}">
          </div>

          <div class="form-group">
          <label for="status">状 態</label>
            <select name="status" class="form-control" aria-label="Default select example">
              @foreach(\App\Models\Item::STATUSES as $status)
              <option value="{{$status['value']}}" @if($status['value']==$item->status) selected @endif>{{$status['label']}}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="quantity">個 数</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $item->quantity }}">
          </div>

          <div class="form-group">
            <label for="detail">詳 細</label>
            <input type="text" class="form-control" id="detail" name="detail" value="{{ $item->detail }}">
          </div>
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