@extends('layouts/app')

@section('content')
<h2>商品変更</h2>
<form action="" method="POST">
  @csrf
  <div class="form-group">
    <label for="formGroupExampleInput">タイトル</label><span class="badge badge-danger">必須</span>
    <input type="text" name="name" value="{{ $product->name }}" class="form-control" id="formGroupExampleInput" placeholder="Example input">
  </div>

  <label for="formGroupExampleInput">カテゴリー</label><span class="badge badge-danger">必須</span>
  <div class="input-group">
  <div class="input-group-prepend">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">選択</button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
    </div>
  </div>

  <input type="text" name="category_id" value="{{ $product->category_id }}" class="form-control" aria-label="Text input with dropdown button">
</div>


</div>
  <div class="form-group">
    <label for="formGroupExampleInput2">コメント</label>
    <input type="text" name="comment" value="{{ $product->comment }}" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
  </div>
   <div class="form-group">
    <label for="formGroupExampleInput2">金額</label><span class="badge badge-danger">必須</span>
    <input type="text" name="price" value="{{ $product->price }}" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
  </div>
   <div class="form-group">
    <label for="formGroupExampleInput2">写真</label>
    <input type="file" name="pic1" value="{{ $product->pic1 }}" class="form-control-file" id="exampleFormControlFile1">
  </div>
  <div class="form-group">
    {{-- <input type="hidden" name="user_id" value="{{ $auth }}" class="form-control-file" id="exampleFormControlFile1"> --}}
  </div>


  <button type="submit"  class="btn btn-info">登録する</button>
</form>
{{-- @include('errors') --}}
@endsection
