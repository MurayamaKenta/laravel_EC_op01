@extends('layouts/app')

@section('content')

@foreach ($products as $product)


<div class="card">
  <img class="card-img-top" src="/images/pathToYourImage.png" alt="Card image cap">
  <div class="card-body">
    <h4 class="card-title">タイトル:{{ $product->name }}</h4>
    <p class="card-text">
      コメント:{{ $product->comment }}
    </p>
    <a href="#!" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
@endforeach
{{ $products->links() }}
@endsection
