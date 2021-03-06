<?php

include 'php/init.php';
include 'php/common.php';
include 'php/colors.php';

?><html>
	<head>
		<title>First Pastafarian Church</title>
		<link rel="stylesheet" type="text/css" href="/css/def.css.php">
		<link rel="stylesheet" type="text/css" href="/css/head.css.php">
		<link rel="stylesheet" type="text/css" href="/css/front.css.php">
	</head>
	<body>
		<!--
		<header>
			<img id="logo-header" src="/img/fsm-logo.png" alt="First Pastafarian Church">
			<h1>First Pastafarian Church</h1>
		</header>
		-->

		<table id="wrapper">
			<tr>
				<td align="center">
					<table id="candy">
						<tr>
							<td class="spacer"></td>
							<td>
								<a class="block" href="/nmf">&laquo; NMF</a>
							</td>
							<td valign="middle" align="center" id="stage" class="spacer">
								<noscript><img src="img/fsm.png" /></noscript>
							</td>
							<td>
								<a class="block" href="/testimony">testimony &raquo;</a>
							</td>
							<td class="spacer"></td>
						</tr>
						<tr>
							<td colspan="5" align="center">
								<p class="block-inline">
									First Pastafarian Church of Norman, OK<br>
									115 S Crawford Ave<br>
									Norman, OK 73069<br>
								</p>
								<a href="https://www.facebook.com/FirstPastafarian/">facebook.com/FirstPastafarian</a><br>
								<a href="mailto:FirstPastafarian@gmail.com">FirstPastafarian@gmail.com</a><br>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

		<script src="vendor/pixi.min.js"></script>
		<script>
			var renderer = PIXI.autoDetectRenderer(700, 600, { transparent: true });
			document.getElementById("stage").appendChild(renderer.view);

			// create the root of the scene graph
			var stage = new PIXI.Container();

			var FSM = PIXI.Sprite.fromImage('img/fsm.png');
			FSM.position.x = (renderer.width / 2) - 315;
			FSM.position.y = 10;
			stage.addChild(FSM);

			var blur = new PIXI.filters.BlurFilter();

			FSM.filters = [blur];

			var count = 0;

			requestAnimationFrame(animate);

			function animate() {

			    count += 0.005;

			    var blurAmount = Math.cos(count) ;

			    blur.blur = 20 * (blurAmount);
			    renderer.render(stage);
			    requestAnimationFrame( animate );
			}
		</script>
	</body>
</html>