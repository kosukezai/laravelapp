@extends('layouts.app')

@section('content')
 <div class="col">
   <div class="card">

  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
  <div style="padding-bottom:600px;">
  <form method='POST' action="/store">
  
  <textarea name='content' class="form-control"></textarea>
  </form>
  </div>
  </div>
  </div>
  </div>

@endsection
