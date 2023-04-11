@extends('layouts.app')

@section('content')
 <div class="col">
   <div class="card">

  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
  <div style="padding-bottom:600px;">
  <form method='POST' action="laravelapp/public/store">
  @csrf
  <input type='hidden' name='user_id' value="{{ $user['id'] }}">
  <textarea name='content' class="form-control"></textarea>
  <button type='submit' class="btn btn-primary btn-lg">保存</button>
  </form>
  </div>
  </div>
  </div>
  </div>

@endsection
