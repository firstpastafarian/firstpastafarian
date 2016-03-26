<?php header("Content-type: text/html"); include '../php/init.php'; include '../php/css.php'; ?>
html, body {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	vertical-align: baseline;
}

#wrapper {
	height: 100%;
	width: 100%;
}

#candy {
	
}

.block {
	padding: 7px 13px;

	font-size: 2em;
	text-shadow: 1px 1px 0 #000, -1px -1px 1px #<?php print hex($_SESSION['color'][2]); ?>, -1px -1px 0 #<?php print hex($_SESSION['color'][1]); ?>;
	color: #<?php print hex($_SESSION['color'][3]); ?>;

	background: #000;
}

.block-inline {
	padding: 7px 13px;

	font-size: 2em;
	text-shadow: 1px 1px 0 #000, -1px -1px 1px #<?php print hex($_SESSION['color'][2]); ?>, -1px -1px 0 #<?php print hex($_SESSION['color'][1]); ?>;
	color: #fff;

}

a:hover {
	color: #fff !important;
	text-shadow: 1px 1px 1px #<?php print hex($_SESSION['color'][2]); ?>, -1px -1px 0 #<?php print hex($_SESSION['color'][1]); ?>, -1px -1px 0 #<?php print hex($_SESSION['color'][3]); ?>;
	cursor: hand;
	cursor: pointer;
}

a {
	white-space: nowrap;
	-webkit-transition: all 0.2s ease-in;
	-moz-transition: all 0.2s ease-in;
	-ms-transition: all 0.2s ease-in;
	-o-transition: all 0.2s ease-in;
	transition: all 0.2s ease-in;
}