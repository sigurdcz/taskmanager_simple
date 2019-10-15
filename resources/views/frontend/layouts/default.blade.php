<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>Manager</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="images/png" sizes="32x32" href="{{asset('/images/system/favicon-32x32.png')}}">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>


<div class="nav-scroller bg-white box-shadow">
  <nav class="nav nav-underline">

    <a class="nav-link" href="{{route('tasks.index')}}">
      Tasks
      <span class="badge badge-pill bg-light align-text-bottom">{{$tasks->count()}}</span>
    </a>

  </nav>
</div>
<div class="container">
    @yield('content')
</div>
<script type="text/javascript" src="{{asset('/js/app.js')}}"></script>
</body>
</html>
