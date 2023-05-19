@extends('layouts.app')

@section('content')
 <div class="col">
   <div class="card">

  <div class="card-header">
    新規作成
  </div>
  <div class="card-body">
  <div style="padding-bottom:600px;">
  <form method='POST' action="/laravelapp/public/store">
  @csrf
  <input type='hidden' name='user_id' value="{{ $user['id'] }}">
  <textarea name='content' class="form-control"></textarea>
  フォルダ1
  <input name='name'class="form-control" type="text"  >
  フォルダ2
  <input name='twoname'class="form-control" type="text"  >
  <button  type='submit' class="btn btn-primary btn-lg">保存</button>
  </form>
  </div>
  </div>
  </div>
  </div>

@endsection
