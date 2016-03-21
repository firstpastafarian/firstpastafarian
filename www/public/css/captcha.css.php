<?php header("Content-type: text/html"); include '../php/init.php'; include '../php/css.php'; ?>
table {
	width: 100%;
	height: 100%;
}

#wrapper {
	margin: -13px -13px 0 -13px;
	min-width: 140px;
}

form {
	background-color: #000;
	margin: 0 auto;
	display: -moz-inline-stack;
	display: inline-block;
	zoom: 1;
	*display: inline;
	box-shadow: 13px 13px 77px #<?php print hex($_SESSION['color'][0]); ?>;
	background: #000;
}

#candy {
	padding: 13px;
}

input {
	border: none;
}

input[type="text"] {
	background: #<?php print hex( $_SESSION['color'][1] ); ?>;
	border: none;
	color: #000;
	text-align: center;
	padding: 14px 0;
	font-size: 17px;
	line-height: 32px;
}

input:-moz-placeholder, input::-moz-placeholder, input:-ms-input-placeholder { 
	color: #<?php print hex( $_SESSION['color'][0] ); ?>;
} input::-webkit-input-placeholder { color: #<?php print hex( $_SESSION['color'][0] ); ?>; }
input:hover::-webkit-input-placeholder, input:hover:-moz-placeholder, input:hover::-moz-placeholder, input:hover:-ms-input-placeholder {
	color: #<?php print hex( $_SESSION['color'][3] ); ?>;
} input:hover::-webkit-input-placeholder { color: #<?php print hex( $_SESSION['color'][3] ); ?>; }
input:focus:-moz-placeholder, input:focus::-moz-placeholder, input:focus:-ms-input-placeholder {
	color: #<?php print hex( $_SESSION['color'][3] ); ?>;
} input:focus::-webkit-input-placeholder { color: #<?php print hex( $_SESSION['color'][3] ); ?>; }

[type="submit"], .block {
	display: block;
	width: 100%;
	min-width: 250px;
	height: 100%;
	background: #000;
	padding: 13px 0;
	color: #<?php print hex($_SESSION['color'][3]); ?>;
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

input, a, label, select {
	-webkit-transition: all 0.2s ease-in;
	-moz-transition: all 0.2s ease-in;
	-ms-transition: all 0.2s ease-in;
	-o-transition: all 0.2s ease-in;
	transition: all 0.2s ease-in;
}