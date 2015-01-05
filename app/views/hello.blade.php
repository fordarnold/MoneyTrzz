<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Money Trzz - Welcome</title>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			vertical-align: middle;
		}

		.welcome {
			width: 50%;
			margin: 30px auto;
			text-align: center;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1, h2, h3, h4, h5{font-family: "Purisa", sans-serif; }
		h1, h2, h3{color: #444;}

		h1 {
			font-size: 40px;
			margin: 16px 0 0 0;
		}

		h4 {color: limegreen;}

		article ul {padding-left: 0;}

		article ul li {list-style: none; padding: 3px 0;}

		.app-name {color: limegreen;}

		span.special {color: green; font-size: 0.8em; font-family: "Times New Roman", serif;}
	</style>
</head>
<body>
	<div class="welcome">
		<h1 class="app-name">Money Trzz</h1>
		<h3 class="app-slogan">Easy money management<br>to get you out of Rat Race</h3>

		<hr>
		<h4>What does it give you ?</h4>

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
