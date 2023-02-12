@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>商品登録</h1>
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
                <form method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="名前">
                        </div>

                        <div class="form-group">
                            <label for="name">価格</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}" placeholder="100円〜1000000円">
                        </div>

                        <!-- TODO:連想配列 -->
                        <div class="form-group">
                            <label for="name">状態</label>
                            <input type="text" class="form-control" id="status" name="status" value="{{ old('status') }}">
                        </div>

                        <!-- TODO:連想配列 -->
                        <div class="form-group">
                            <label for="type">種別</label>
                            <input type="number" class="form-control" id="type" name="type" value="{{ old('type') }}">
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" value="{{ old('detail') }}" placeholder="詳細説明">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
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
