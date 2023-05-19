@extends('layouts.app')

@section('content')

<div class="col">
   <div class="card">

  <div class="card-header d-flex justify-content-between">
    編集
    <form method='POST' action="/laravelapp/public/delete/{{$memos->id}}" id='delete-form'>
        @csrf
    <button class='p-0 mr-2' style='border:none;'><i id='delete-button' class="fas fa-trash"></i>削除</button>
    </form>
  </div>
  <div class="card-body">
  <div style="padding-bottom:600px;">
  <form method='POST' action="{{ route('update', ['id' => $memos->id] ) }}">
  @csrf
  <input type='hidden' name='user_id' value="{{ $user['id'] }}">
  <textarea name='content' class="form-control">{{$memos->content}}</textarea>
  フォルダ1
  <input name='name'class="form-control" type="text"  >
  フォルダ2
  <input name='twoname'class="form-control" type="text"  >
  <button type='submit' class="btn btn-primary btn-lg">更新</button>
  </form>
  </div>
  </div>
  </div>
  </div>

@endsection
