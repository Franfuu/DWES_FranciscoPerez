
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>CRUDs</title>
  <link rel="stylesheet" href="{{ url('css/app.css') }}">
</head>
<body>
  <nav>
    <a href="{{ url('/') }}">Home</a> |
    <a href="{{ route('users.index') }}">Users</a> |
    <a href="{{ route('clothing-items.index') }}">Clothing</a>
  </nav>
  <main>@yield('content')</main>
</body>
</html>