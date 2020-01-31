@extends('layouts.app')

@section('content')
<h2>ユーザー変更</h2>

<form action="" method="POST">
  @csrf
  <div class="form-group">
    <label for="formGroupExampleInput">名前</label><span class="badge badge-danger">必須</span>
    <input type="text" name="name" value="{{ $users->name }}" class="form-control" id="formGroupExampleInput" placeholder="Example input">
  </div>
</div>
  <div class="form-group">
    <label for="formGroupExampleInput2">email</label><span class="badge badge-danger">必須</span>
    <input type="text" name="email" value="{{ $users->email }}" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
  </div>
   <div class="form-group">
    <label for="formGroupExampleInput2">age</label><span class="badge badge-danger">必須</span>
    <input type="text" name="age" value="{{ $users->age }}" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
  </div>
     <div class="form-group">
    <label for="formGroupExampleInput2">addr</label><span class="badge badge-danger">必須</span>
    <input type="text" name="addr" value="{{ $users->addr }}" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
  </div>
<input type="hidden" name="password" value="{{ $users->password }}" class="form-control" id="formGroupExampleInput2" placeholder="Another input">

  <button type="submit"  class="btn btn-info">登録する</button>
</form>
@endsection
