<?php

include '/php/init.php';
include '/php/common.php';
include '/php/colors.php';

include 'captcha.validate.php';

?><html>
	<head>
		<title>First Pastafarian Church</title>
		<link rel="stylesheet" type="text/css" href="/css/def.css.php">
		<link rel="stylesheet" type="text/css" href="/css/captcha.css.php">
	</head>
	<body>
		<table id="wrapper">
			<tr>
				<td>
					<table>
						<tr>
							<td valign="middle" align="center">
								<form action="/?" method="post">
									<div id="candy">
										<table>
											<tr>
												<td valign="top">
													<input type="text" name="captcha" size="8" placeholder="captcha&#9656;">
												</td>
												<td>
													<img src="/img/captcha.png.php" id="captcha" />
												</td>
											</tr>
										</table>
									</div><?php
if( alert_exists() ) {
	$alerts = alerts_collate();
	foreach( $alerts as $string )
		print '
									<label for="message" class="block">'.$string.'</label>
									<input type="submit" value="try again" class="block-em" />';
} else {
	print '
									<noscript>
										<label for="message" class="block suggest">enable js to skip captcha</label>
									</noscript>
									<input type="submit" value="submit" class="block-em" />';
}
?>

								</form>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>