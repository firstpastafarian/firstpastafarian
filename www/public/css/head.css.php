<?php header("Content-type: text/css"); include '../php/init.php'; include '../php/css.php'; ?>
header {
	display: flex;
	flex-direction: row;

	-webkit-justify-content: flex-start;
	justify-content: flex-start;

	padding-left: 7px;
	height: 56px;

	background: #<?php print hex( $_SESSION['color'][0] ); ?>;;

	-webkit-app-region: drag;
}

#icon-header {
	height: 24px;
	margin-left: 4px;
}

#logo-header {
	height: 24px;
	margin-right: 11px;
	padding: 15px 0 0 17px;
	float: right;
}

header h1 {
	color: #fff;
	font-size: 2em;
	text-shadow: 1px 1px 0 #000, -1px -1px 1px #<?php print hex($_SESSION['color'][2]); ?>, -1px -1px 0 #<?php print hex($_SESSION['color'][1]); ?>;
	margin-top: 11px;
	white-space: nowrap;
}

header ul {
	display: flex;
	flex-direction: row;
	flex-shrink: 0;

	-webkit-app-region: no-drag;
}

header li {
	display: flex;
	flex-direction: column;
	justify-content: center;

	vertical-align: middle;

	border-right: 1px solid #<?php print hex( $_SESSION['color'][1] ); ?>;
}

header li a {
	vertical-align: middle;
	padding: 20px 20px;
	height: 56px;
}

header li a:hover {
	background: #<?php print hex( $_SESSION['color'][1] ); ?>;
}

header input {
	padding: 3px;
	margin: 17px 3px;
	width: 120px;
	background: #<?php print hex( $_SESSION['color'][1] ); ?>;
}