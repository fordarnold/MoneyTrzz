<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Money Trzz - Welcome</title>

	<!-- favicon -->
  	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

	<!-- grid framework -->
	{{ HTML::style('assets/dev/vendor/foundation-5.5.0/css/foundation.css') }}

	{{ HTML::style('assets/dev/css/general.css') }}
	{{ HTML::style('assets/dev/css/helpers.css') }}
	{{ HTML::style('assets/dev/css/app.css') }}

	{{ HTML::script('assets/dev/vendor/foundation-5.5.0/js/vendor/modernizr.js') }}

</head>
<body>

	<header class="text-center">
		<div class="row">
			<div class="large-12 columns">
				<hgroup>
					<h1 class="app-name">
						{{ HTML::link('/', 'Money Trzz') }}
					</h1>
					<h3 class="app-slogan">Manage your cash assets with ease</h3>
				</hgroup>
			</div>
		</div>
	</header>

	<main class="text-center">
		<div class="row">
			<div class="large-12 columns">
				<hr>
				<h3>What's included in the app ?</h3>

				<article class="features">
					<ul class="no-bullets">
						<li>A Master user account</li>
						<li>Multiple Business/Company accounts registration</li>
						<li>Multiple Bank accounts registration </li>
						<li>Categorised bank accounts like Personal or Business, Savings or Current or Checking</li>
						<li>Deposits management</li>
						<li>Withdrawals management</li>
						<li>Savings management</li>
						<li>Bank charge management</li>
						<li>Money Reports, filtered by Quarter/Month</li>
					</ul>

						{{ HTML::link('user/register', 'TRY IT NOW', ['class' => 'cta']) }}
				</article>

			</div>
		</div>
	</main>

	<footer class="footer">
		<div class="row">
			<div class="large-6 columns">
				<hr>
				<ul class="inline-list">
					<li>{{ HTML::link('legal/terms', 'Terms and conditions') }}</li>
					<li>{{ HTML::link('legal/privacy', 'Privacy statement') }}</li>
				</ul>
			</div>
			<div class="large-6 columns">
				<hr>
				<p class="copyright text-right">Copyright &copy; {{ date('Y') }}, {{ HTML::link('https://appz.meridiansoftech.co', 'Meridian Appz Inc.') }}</p>
			</div>
		</div>
	</footer>
</body>
</html>
