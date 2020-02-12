@extends('layouts/app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">一覧画面</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('create.index') }}">商品登録 <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('user',$users) }}">プロフィール編集 <span class="sr-only">(current)</span></a>
      </li>
     <li class="nav-item active">
        <a class="nav-link" href="#">マイページ <span class="sr-only">(current)</span></a>
      </li>
        </li>
     <li class="nav-item ">
        <a class="nav-link" href="#">商品編集、削除(マイページから) <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline" action="{{url('/product')}}">
  <div class="form-group">
  <input type="text" name="keyword" value="{{$keyword}}" class="form-control" placeholder="category検索">
  </div>
  <input type="submit" value="検索" class="btn btn-info">
</form>
  </div>
</nav>

{{-- 商品一覧 --}}
@foreach ($products as $product)


<div class="card">
  <img class="card-img-top" src="/images/pathToYourImage.png" alt="写真が入る">
  <div class="card-body">
    <h4 class="card-title">タイトル(商品名):{{ $product->name }}</h4>
    <p class="card-text">
      コメント:{{ $product->comment }}
    </p>
    <p class="card-text">
      金額:{{ $product->price }}円
    </p>
    <p class="card-text">
      カテゴリー: ({{ $product->category->name }})
    </p>
    <a href="{{ route('product.show',$product->id) }}" class="btn btn-primary">詳細へ</a>
  </div>
</div>
@endforeach
{{ $products->links() }}
@endsection
{{-- 確認01 --}}
