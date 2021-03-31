<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>GPU Info</title>
	<link rel="stylesheet" type="text/css" href="ss.css">
	<link rel="stylesheet" type="text/css" href="https://github.com/TixieBorg/Ethereum-panel/blob/6797e8e7aef50453b1e1236414c31300f7abf37f/css/design.css">
</head>
<body>

	<header class="header">
		<div class="container">
			<div class="header__serv">
				<h1 class="header__servName">Administation Monitoring</h1>
				<div class="header__servIp">AUIS </div>
			</div>
			<div class="header__stat">
				<h2 class="header__statName">Social Distancing</h2>
				<div>
					<div>
						<span class="header__statNumber"></span>
						<span class="header__statUnit"> Keep Your 1 meter distance</span>
					</div>
					<div>
						<span class="header__statNumber"></span>
						<span class="header__statUnit"> </span>
					</div>
				</div>
			</div>
			<div class="header__stat">
				<h2 class="header__statName">Safety Guidlines</h2>
				<div>
					<span class="header__statNumber"></span>
					<span class="header__statUnit"></span>
				</div>
			</div>
		</div>
	</header>

	<main>
		<div class="container">
			<section class="serv">
				<header class="serv__head">
					<div>
						<span class="serv__status serv__status--up">
							&#9679;
						</span>
						<h3 class="serv__name">Location</h3>
					</div>
					<div class="serv__ip">
							<span>
								  	<div class="star_container">
													 <img src="img/star_full.png" class="imgfull disable" />
													 <img src="img/star_empty.png" class="imgempty " />
									  </div>
							</span>
							Date
						</div>
				</header>
				<article class="serv__gpu">
					<div class="serv__grid-3">
						<div class="serv__mod">
							<div class="serv__modLabel serv__modLabel--red">
								Distance
							</div>
							<div class="serv__modNumber">
								DistValue<label class="serv__modUnit">M</label>
							</div>
						</div>

						<div class="serv__mod">
							<div class="serv__modLabel serv__modLabel--green">
								Temp
							</div>
							<div class="serv__modNumber">
								TempValue<label class="serv__modUnit">&deg;C</label>
							</div>
						</div>

						<div class="serv__mod">
							<div class="serv__modLabel serv__modLabel--yellow">
								Time
							</div>
							<div class="serv__modNumber">
								TimeValue<label class="serv__modUnit"></label>
							</div>
						</div>


					</div>
				</article>


			</section>
			<section class="serv">
				<header class="serv__head">
					<div>
						<span class="serv__status serv__status--up">
							&#9679;
						</span>
						<h3 class="serv__name">Location</h3>
					</div>
					<div class="serv__ip">
						<span>
							<div class="star_container">
									<img src="img/star_full.png" class="imgfull disable" />
									 <img src="img/star_empty.png" class="imgempty " />
 							</div>
						</span>
						Date
					</div>
				</header>
				<article class="serv__gpu">
					<div class="serv__grid-3">
						<div class="serv__mod">
							<div class="serv__modLabel serv__modLabel--red">
								Distance
							</div>
							<div class="serv__modNumber">
								DistValue<label class="serv__modUnit">M</label>
							</div>
						</div>

						<div class="serv__mod">
							<div class="serv__modLabel serv__modLabel--green">
								Temp
							</div>
							<div class="serv__modNumber">
								TempValue<label class="serv__modUnit">&deg;C</label>
							</div>
						</div>

						<div class="serv__mod">
							<div class="serv__modLabel serv__modLabel--yellow">
								Time
							</div>
							<div class="serv__modNumber">
								TimeValue<label class="serv__modUnit"></label>
							</div>
						</div>


					</div>
				</article>


			</section>


		</div>
	</main>

</body>
<script src="js.js"></script>

</html>

<script type="text/javascript">
	alert("hi")
</script>
