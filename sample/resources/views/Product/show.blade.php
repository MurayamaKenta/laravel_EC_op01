@extends('layouts.app')

@section('content')

<h2>商品詳細</h2>
<div class="card">
  <div class="card-body">
    <p class="card-text">タイトル:{{ $product->name }}</p>
  </div>
  <img src="/images/pathToYourImage.png" alt="写真がここにくる">
  <div class="card-body">
    <p class="card-text">作成日時:{{ $product->created_at }}</p>
  </div>
</div>


<div class="card">
  <div class="card-body">
    コメント:  {{ $product->comment }}
  </div>
</div>
<div class="card">
  <div class="card-body">
    金額:  {{ $product->price }}円
  </div>
</div>
<button type="button" >
  <a href="{{ route('product.edit',$product->id) }}" class="btn btn-info">編集</a>
</button>

@endsection
