<?php header("Content-type: text/html"); include '../php/init.php'; include '../php/css.php'; ?>
body {
	font-family: sans-serif;
	color: #fff;

	background: -webkit-gradient(radial, 0% 0%, 0% 100%, from(#<?php print hex($_SESSION['color'][1]); ?>), to(#<?php print hex($_SESSION['color'][0]); ?>));
	background: -webkit-radial-gradient(50px 50px, circle cover, #<?php print hex($_SESSION['color'][1]); ?>, #<?php print hex($_SESSION['color'][0]); ?>);
	background: -moz-linear-gradient(left 20deg, #<?php print hex($_SESSION['color'][1]); ?>, #<?php print hex($_SESSION['color'][0]); ?>);
	background: -ms-radial-gradient(circle, #<?php print hex($_SESSION['color'][1]); ?>, #<?php print hex($_SESSION['color'][0]); ?>);
	background: -o-radial-gradient(circle, #<?php print hex($_SESSION['color'][1]); ?>, #<?php print hex($_SESSION['color'][0]); ?>);
}

a {
	text-decoration: none;
	color: #<?php print hex($_SESSION['color'][3]); ?>;
} a:hover {
	color: #<?php print hex($_SESSION['color'][2]); ?>;
}

input:hover::-webkit-input-placeholder, input:hover:-moz-placeholder, input:hover::-moz-placeholder, input:hover:-ms-input-placeholder, input:focus::-webkit-input-placeholder, input:focus:-moz-placeholder, input:focus::-moz-placeholder, input:focus:-ms-input-placeholder {
	color: #<?php print hex($_SESSION['color'][0] );  ?>;
} input::selection, textarea::selection {
	color: #<?php print hex($_SESSION['color'][3] ); ?>;
	background-color: #<?php print hex($_SESSION['color'][0] ); ?>;
	text-shadow: 1px 1px 0 #<?php print hex($_SESSION['color'][1] ); ?>;
} input::-moz-selection, textarea::-moz-selection {
	color: #<?php print hex($_SESSION['color'][3] ); ?>;
	background-color: #<?php print hex($_SESSION['color'][0] ); ?>;
	text-shadow: 1px 1px 0 #<?php print hex($_SESSION['color'][1] ); ?>;
} select, input:-moz-placeholder, input::-moz-placeholder, input:-ms-input-placeholder { color: #<?php print hex($_SESSION['color'][3] ); ?>; }
::-webkit-input-placeholder {
	color: <?php print hex($_SESSION['color'][3]); ?>;
	color: rgba( <?php print hex($_SESSION['color'][3][0]).', '.hex($_SESSION['color'][3][1]).', '.hex($_SESSION['color'][3][2]).', 0.6' ?> );
}

.accessible {
	display: none;
}