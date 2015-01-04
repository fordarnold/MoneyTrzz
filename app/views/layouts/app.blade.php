<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>MoneyTrzz</title>
  {{ HTML::style('http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css') }}
</head>
<body>
  @yield('content')

  {{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
  {{ HTML::script('http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js') }}
</body>
</html>
