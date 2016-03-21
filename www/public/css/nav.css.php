<?php header("Content-type: text/css"); include '../php/init.php'; include '../php/css.php'; ?>
nav {
	position: fixed;
	top: 0px;
	right: -144px;

	display: flex;
	flex-direction: column;

	width: 192px;
	height: 100%;

	-webkit-app-region: drag;
}

#logo-menu {
	height: 24px;
	padding: 3px 0 2px 0;

	float: left;
}

#gui-nav-control {
	border-bottom: 1px solid #<?php print hex( $_SESSION['color'][1] ); ?>;
}

#gui-nav-control:hover {
	background: #<?php print hex( $_SESSION['color'][1] ); ?>;
}

#gui-nav-control img {
	padding: 15px 4px 17px 8px;
}

nav ul {
	display: flex;
	flex-direction: column;

	-webkit-app-region: no-drag;
}

nav li {
	display: flex;
	flex-direction: row;
}

nav li a {
	padding: 8px 12px 8px 8px;
	line-height: 24px;

	color: #fff;
	background: #<?php print hex( $_SESSION['color'][0] ); ?>;
	border-bottom: 1px solid #<?php print hex( $_SESSION['color'][1] ); ?>;
	
	width: 100%;
}

nav li a:hover {
	color: #<?php print hex( $_SESSION['color'][3] ); ?>;
	background: transparent;
	cursor: pointer; cursor: hand;
}

nav li a img, #gui-nav-control {
	float: left;
	padding: 0 12px 0 4px;
}

.focus {
	background: transparent;
}

#navfoot {
	display: flex;
	flex-grow: 1;

	background: #<?php print hex( $_SESSION['color'][0] ); ?>;
}
