<?php

include 'php/init.php';
include 'php/common.php';
include 'php/colors.php';

?><html>
	<head>
		<title>First Pastafarian Church</title>
		<link rel="stylesheet" type="text/css" href="/css/def.css.php">
		<link rel="stylesheet" type="text/css" href="/css/front.css.php">
	</head>
	<body>
		<table id="wrapper">
			<tr>
				<td>
					<table>
						<tr>
							<td valign="middle" align="center" id="stage">
								<noscript><img src="img/fsm.png" /></noscript>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

		<script src="vendor/pixi.min.js"></script>
		<script>
			var renderer = PIXI.autoDetectRenderer(800, 600, { transparent: true });
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