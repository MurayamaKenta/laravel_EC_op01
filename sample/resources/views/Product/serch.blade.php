@extends('layouts/app')

@section('content')
<div class="container-fluid">
<div class="row">

<!--↓↓ 検索フォーム ↓↓-->
<div class="col-sm-4" style="padding:20px 0; padding-left:0px;">
<form class="form-inline" action="{{url('/test')}}">
  <div class="form-group">
  <input type="text" name="keyword" value="{{$keyword}}" class="form-control" placeholder="名前を入力してください">
  </div>
  <input type="submit" value="検索" class="btn btn-info">
</form>
</div>
<!--↑↑ 検索フォーム ↑↑-->
{{--
<div class="col-sm-8" style="text-align:right;">
  <div class="paginate">
  {{ $data->appends(Request::only('keyword'))->links() }}
  </div>
</div> --}}


@foreach ($query as $item)


<div class="card">
  <img class="card-img-top" src="/images/pathToYourImage.png" alt="写真が入る">
  <div class="card-body">
    <h4 class="card-title">タイトル(商品名):{{ $item->name }}</h4>
    <p class="card-text">
      コメント:{{ $item->comment }}
    </p>
    <p class="card-text">
      金額:{{ $item->price }}円
    </p>
    {{-- <a href="{{ route('product.show',$item->id) }}" class="btn btn-primary">詳細へ</a> --}}
  </div>
</div>
@endforeach
{{-- {{ $item->links() }} --}}

@endsection
