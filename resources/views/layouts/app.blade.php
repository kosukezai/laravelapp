<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
       <meta charser="UTF-8">
        <!-- CSRF Token -->
       <meta name="csrf-token" content="{{ csrf_token() }}">

       <title>メモ帳</title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
     </head>

    <body>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
  <h1 class="navbar-brand">メモ帳</h1><br>
  </div>
  </div>
  @if(session('success'))
  <div class="alert alert-success" role="alert">
     {{session('success')}}
  </div>
  @endif
  <div class="container">
  <div class="row">

   <div class="col">
   <div class="card">

  <div class="card-header">
    フォルダ2
  </div>
  <div class="card-body">
  <div style="padding-bottom:600px;">
  
  @foreach($folder2 as $two)
 <a href="/laravelapp/public/edit/{{$two->name}}" class='d-block'>{{$two->name}}</a>
 @endforeach
  </div>
  </div>
  </div>
  </div>
  <div class="col">
   <div class="card">

  <div class="card-header">
   フォルダ1
  </div>
  <div class="card-body">
  <div style="padding-bottom:600px;">
  <a class='d-block' href='/laravelapp/public/home'>全て表示</a>
 @foreach($folder1 as $one)
 <a href="/laravelapp/public/edit/{{$one->id}}" class='d-block'>{{$one->name}}</a>
 @endforeach
  </div>
  </div>
  </div>
  </div>
 

  
    @yield('content')
    </div>
    </div>
       
    </body>
</html>
