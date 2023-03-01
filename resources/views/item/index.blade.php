@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
<h1>商品一覧</h1>
@stop

@section('content')

  <div>
    <form class="mb-3 d-flex flex-row justify-content-end" method="get" action="{{ route('item.index') }}">
      <input type="text" name="search" class="form-control col-3" placeholder="検索" aria-label="Recipient's username" aria-describedby="button-addon2">
      <button class="btn btn-default col-1" type="submit">検索</button>
    </form>
  </div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">商品一覧</h3>
        <div class="card-tools">
          <div class="input-group input-group-sm">
            <div class="input-group-append">
              <a href="{{ route('item.add') }}" class="btn btn-default">商品登録</a>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>I D</th>
              <th>最終更新日</th>
              <th>名 前</th>
              <th>価 格</th>
              <th>状 態</th>
              <th>個 数</th>
              <th></th>

            </tr>
          </thead>
          <tbody>
            @foreach ($items as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item['updated_at']->format('Y/m/d') }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->price }} 円</td>
              <td>{{ $item->status }}</td>
              <td>{{ $item->type }}</td>
              <td><a href="{{ route('item.show', ['id' => $item->id ] ) }}" class="btn btn-default">商品詳細</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="row">
  <div class="col-5">
  </div>
  <div class="col">
    <div class="text-right">
      {{ $items->links() }}
    </div>
  </div>
  <div class="col">
  </div>
</div>

  </div>
</div>



@stop

@section('css')
@stop

@section('js')
@stop