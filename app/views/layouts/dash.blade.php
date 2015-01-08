<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Money Trzz</title>

  <!-- grid framework -->
  {{ HTML::style('assets/dev/vendor/foundation-5.5.0/css/foundation.css') }}

  <!-- my css -->
  {{ HTML::style('assets/dev/css/general.css') }}
  {{ HTML::style('assets/dev/css/helpers.css') }}
  {{ HTML::style('assets/dev/css/app.css') }}

  {{ HTML::script('assets/dev/vendor/foundation-5.5.0/js/vendor/modernizr.js') }}

</head>
<body class="dash">

<div id="container">

	<header class="minibar">
		<div class="row">
			<div class="large-6 columns">
				<hgroup>
					<h1 class="app-name">{{ HTML::link('/', 'Money Trzz') }}</h1>
					<h3 class="app-slogan">That's the perfect place for shade</h3>
				</hgroup>
			</div>
			<div class="large-6 columns">
        <br><br>
				<ul class="inline-list">
					@if($errors->has('errors'))
          <li>Welcome, {{ HTML::link('users/me', 'User') }}</li>
          <li>{{ HTML::link('user/logout', 'Logout') }}</li>
          @endif
				</ul>
			</div>
		</div>
	</header><!-- /header -->

  <main>
    @yield('content')
  </main>

</div>

  {{ HTML::script('assets/dev/vendor/foundation-5.5.0/js/vendor/jquery.js') }}
  {{ HTML::script('assets/dev/vendor/foundation-5.5.0/js/foundation.min.js') }}
  <script>
  $(document).foundation();
  </script>

</body>
</html>
