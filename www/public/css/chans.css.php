<?php header("Content-type: text/css"); include '../php/init.php'; include '../php/css.php'; ?>
table {
	width: 100%;
	height: 100%;
}

#wrapper {
	margin: 0 -13px;
	min-width: 140px;
}

form {
	display: -moz-inline-stack;
	display: inline-block;
	zoom: 1;
	*display: inline;
	box-shadow: 13px 13px 77px #<?php print hex( $_SESSION['color'][0] ); ?>;
	position: relative;
	z-index: 10;
	margin: 0 -27px 27px; -27px;
	background: #000;
}

#candy {
	padding: 27px 27px 24px 27px;
}

input {
	color: #<?php print hex( $_SESSION['color'][3] ); ?>;
	border: none;
	font-size: 17px;
}

[type="text"], [type="password"] {
	padding: 7px;
	margin: 0 0 3px 0;
	background-color: #<?php print hex( $_SESSION['color'][1] ); ?>;
}

[type="submit"], .block {
	display: block;
	width: 100%;
	min-width: 250px;
	height: 100%;
	background: #000;
	padding: 13px 0;
	color: #<?php print hex( $_SESSION['color'][3] ); ?>;
	text-decoration: none;
	font-size: 17px;
}

.block-em {
	text-shadow: 1px 1px 0 #000, -1px -1px 1px #<?php print hex($_SESSION['color'][2]); ?>, -1px -1px 0 #<?php print hex($_SESSION['color'][1]); ?>;

	background: -webkit-gradient(radial, 0% 0%, 0% 100%, from(#<?php print hex($_SESSION['color'][1]); ?>), to(#<?php print hex($_SESSION['color'][1]); ?>));
	background: -webkit-radial-gradient(50px 50px, circle cover, #<?php print hex($_SESSION['color'][0]); ?>, #<?php print hex($_SESSION['color'][1]); ?>);
	background: -moz-linear-gradient(left 20deg, #<?php print hex($_SESSION['color'][0]); ?>, #<?php print hex($_SESSION['color'][1]); ?>);
	background: -ms-radial-gradient(circle, #<?php print hex($_SESSION['color'][0]); ?>, #<?php print hex($_SESSION['color'][1]); ?>);
	background: -o-radial-gradient(circle, #<?php print hex($_SESSION['color'][0]); ?>, #<?php print hex($_SESSION['color'][1]); ?>);
}

input:hover, input:focus, [type="submit"]:hover, a:hover, select:hover {
	color: #fff !important;
	background: #<?php print hex($_SESSION['color'][0]); ?>;
	text-shadow: 1px 1px 1px #<?php print hex($_SESSION['color'][2]); ?>, -1px -1px 0 #<?php print hex($_SESSION['color'][1]); ?>, -1px -1px 0 #<?php print hex($_SESSION['color'][3]); ?>;
	cursor: hand;
	cursor: pointer;
}

label[for="message"] {
	margin-top: -15px;
	color: #<?php print hex($_SESSION['color'][4]); ?>;
}

.suggest {
	color: #<?php print hex($_SESSION['color'][1]); ?> !important;
}

input:-moz-placeholder, input::-moz-placeholder, input:-ms-input-placeholder { color: #<?php print hex( $_SESSION['color'][3] ); ?>; }
::-webkit-input-placeholder { 
	color: #<?php print hex( $_SESSION['color'][4] ); ?>;;
}
input:hover::-webkit-input-placeholder, input:hover:-moz-placeholder, input:hover::-moz-placeholder, input:hover:-ms-input-placeholder, input:focus::-webkit-input-placeholder, input:focus:-moz-placeholder, input:focus::-moz-placeholder, input:focus:-ms-input-placeholder {
	color: #<?php print hex( $_SESSION['color'][0] ); ?>;
}

label[for="message"] {
	margin: -38px 0 -9px 0;
	color: #<?php print hex($_SESSION['color'][4]); ?>;
}

input, a, label, select {
	-webkit-transition: all 0.2s ease-in;
	-moz-transition: all 0.2s ease-in;
	-ms-transition: all 0.2s ease-in;
	-o-transition: all 0.2s ease-in;
	transition: all 0.2s ease-in;
}