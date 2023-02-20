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
            <form action="{{ route('item.add')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">名前</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="商品名">
                    </div>

                    <div class="form-group">
                        <label for="name">価格</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}" placeholder="100円〜100000円">
                    </div>

                    <div class="form-group">
                        <label for="status" id="status" name="status">状態</label><br>
                        <select name="status" class="form-control">
                            <option value="">--選択してください--</option>
                            <option value="新品" {{ old('status') == "新品" ? 'selected' : ''}}>新品</option>
                            <option value="中古品" {{ old('status') == "中古品" ? 'selected' : ''}}>中古品</option>
                            <option value="ジャンク品" {{ old('status') == "ジャンク品" ? 'selected' : ''}}>ジャンク品</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="type">個数</label>
                        <input type="number" class="form-control" id="type" name="type" value="{{ old('type') }}" placeholder="1, 2, 3, ...">
                    </div>

                    <div class="form-group">
                        <label for="detail">詳細</label>
                        <input type="text" class="form-control" id="detail" name="detail" value="{{ old('detail') }}" placeholder="詳細説明">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-default">登録</button>
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