@extends('adminlte::page')

@section('title', '商品登録')

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
                            <label for="name">名前</label>
                            <div class="form-control">{{ $item->name }}</div>
                        </div>

                        <div class="form-group">
                            <label for="name">価格</label>
                            <div class="form-control">{{ $item->price }}</div>
                        </div>

                        <div class="form-group">
                            <label for="status" id="status" name="status">状態</label><br>
                            <div class="form-control">{{ $item->status }}</div>

                        </div>

                        <div class="form-group">
                            <label for="type">個数</label>
                            <div class="form-control">{{ $item->type }}</div>
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <div class="form-control">{{ $item->detail }}</div>
                        </div>
                    </div>

                    <div class="card-footer">
                    <a href="{{ route('item.show', ['id' => $item->id ] ) }}" class="btn btn-outline-primary">編集</a>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('item.show', ['id' => $item->id ] ) }}" class="btn btn-outline-danger">削除</a>
                    </div>

            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
