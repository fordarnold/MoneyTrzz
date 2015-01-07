<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Money Trzz - Welcome</title>

	{{ HTML::style('assets/dev/css/general.css') }}
	{{ HTML::style('assets/dev/css/helpers.css') }}
	{{ HTML::style('assets/dev/css/app.css') }}

	<style>

		body {
			text-align: center;
			vertical-align: middle;
			font-size: 1.2em;
		}

		.welcome {
			width: 50%;
			margin: 30px auto;
			text-align: center;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1, h2, h3, h4, h5{font-family: "TakaoPGothic", sans-serif; }
		h1, h2, h3{color: #444;}

		.app-name {
			font-size: 3em;
			margin: 16px 0 0 0;
		}
		.app-slogan {
			font-size: 1.5em;
		}

		h3 {color: limegreen;}

		article ul {padding-left: 0;}

		article ul li {list-style: none;}

		span.special {color: green; font-size: 0.8em; font-family: "Times New Roman", serif;}
	</style>
</head>
<body>
	<div class="welcome">
		<h1 class="app-name">Money Trzz</h1>
		<h2 class="app-slogan">Easy money management<br>to get you out of Rat Race</h2>

		<hr>
		<h3>What does it give you ?</h3>

		<article>
			<ul>
				<li>A Master user account</li>
				<li>Multiple Business/Company accounts registration <span class="special">[Premium]</span></li>
				<li>Multiple Bank accounts registration <span class="special">[Premium]</span></li>
				<li>Categorised bank accounts like Personal or Business, Savings or Current or Checking</li>
				<li>Deposits management</li>
				<li>Withdrawals management</li>
				<li>Savings management</li>
				<li>Bank charge management</li>
				<li>Money Reports, filtered by Quarter/Month</li>
			</ul>

			<hr>
			<h2>{{ HTML::link('index.php/user/register', 'Try it now !', array('class' => 'button')) }}</h2>
		</article>
	</div>
</body>
</html>
