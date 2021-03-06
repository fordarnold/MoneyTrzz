<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <meta name="keywords" content="money, trees, easy, cash, asset, management" />
  <meta name="author" content="Meridian Appz Inc." />
  <meta name="description" content="Manage your cash assets with ease." />

  <title>Money Trzz</title>

  <!-- favicon -->
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

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

	<header>

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

  <footer>
    <div class="row">
      <div class="large-6 columns">
        <ul class="inline-list">
          <li>{{ HTML::link('legal/terms', 'Terms') }}</li>
          <li>{{ HTML::link('legal/privacy', 'Privacy') }}</li>
        </ul>
      </div>
      <div class="large-6 columns text-right">
        <p class="copyright">Copyright &copy; {{ date('Y') }}, {{ HTML::link('https://appz.meridiansoftech.co', 'Meridian Appz Inc.') }}</p>
      </div>
    </div>
  </footer>

</div>

  {{ HTML::script('assets/dev/vendor/foundation-5.5.0/js/vendor/jquery.js') }}
  {{ HTML::script('assets/dev/vendor/foundation-5.5.0/js/foundation.min.js') }}
  <script>
  $(document).foundation();
  </script>

</body>
</html>
