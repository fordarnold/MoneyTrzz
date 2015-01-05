<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Money Trzz</title>
  {{ HTML::style('http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css') }}

  <!-- my css -->
  {{ HTML::style('assets/css/general.css') }}
  {{ HTML::style('assets/css/helpers.css') }}
  {{ HTML::style('assets/css/app.css') }}

  <!-- webfonts enabled -->
  {{ HTML::script('https://ajax.googleapis.com/ajax/libs/webfont/1.5.3/webfont.js') }}

</head>
<body>

<div id="container">

	<header class="minibar">
		<div class="row">
			<div class="large-6 small-12 columns">
				<hgroup>
					<h1 class="app-name">{{ HTML::link('/', 'Money Trzz') }}</h1>
					<h3 class="app-slogan">That's the perfect place for shade</h3>
				</hgroup>
			</div>
			<div class="large-6 small-12 columns text-right">
				<ul class="inline">
					@if($errors->has('errors'))
          <li>Welcome, {{ HTML::link('users/me', 'User') }}</li>
          <li>{{ HTML::link('user/logout', 'Logout') }}</li>
          @endif
				</ul>
			</div>
		</div>
	</header><!-- /header -->

	@yield('content')

</div>

	{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
	{{ HTML::script('http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js') }}
</body>
</html>
