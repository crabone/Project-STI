<?php
	date_default_timezone_set('UTC');

	require_once('php/session/function.php');
	require_once('php/database/connect.php');
?>
<!DOCTYPE HTML>
<!--
	Prologue by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Prologue by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
			<div id="header">

				<div class="top">

					<!-- Logo -->
					  <div id="logo">
					    <?php
					    if (isLogon()) {
					      echo '<span class="image avatar48"><img src="images/avatar.jpg" alt="" /></span>';
					      echo '<h1 id="title">' . $_SESSION['username'] . '</h1>';
					    }
					    else {
					      echo '<h1 id="title">Not connected.</h1>';
					    }
							?>
					  </div>

					<!-- Nav -->
					  <nav id="nav">
					    <ul>
					      <?php
					      if (isLogon()) {
					        echo '<li><a href="inbox.php" id="inbox-link" class="skel-layers-ignoreHref"><span class="icon fa-envelope">Inbox</span></a></li>';
					        echo '<li><a href="settings.php" id="portfolio-link" class="skel-layers-ignoreHref"><span class="icon fa-edit">Settings</span></a></li>';

									if (isAdmin()) {
										echo '<li><a href="admin.php" id="portfolio-link" class="skel-layers-ignoreHref"><span class="icon fa-key">Admin</span></a></li>';
									}

									echo '<li><a href="php/user/logout.php" id="logout-link" class="skel-layers-ignoreHref"><span class="icon fa-home">Logout</span></a></li>';
					      }
								else {
									echo '<li><a href="index.php" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-home">Login</span></a></li>';
								}
					      ?>
					    </ul>
					  </nav>
				</div>

			</div>
