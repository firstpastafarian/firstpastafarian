<?php header("Content-type: text/html"); include '../php/init.php'; include '../php/css.php'; ?>
.block {
	padding: 7px 13px;

	font-size: 2em;
	text-shadow: 1px 1px 0 #000, -1px -1px 1px #<?php print hex($_SESSION['color'][2]); ?>, -1px -1px 0 #<?php print hex($_SESSION['color'][1]); ?>;
	color: #<?php print hex($_SESSION['color'][3]); ?>;

	background: #000;
}

h2 {
	font-size: 1.2em;
	padding-left: 13px;
}

#stage {
	position: fixed;
	top: 10px;
	right: 10px;
	z-index: -1;
}