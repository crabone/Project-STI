<?php

session_start();

function isLogon() {
	return isset($_SESSION['id']);
}
function isAdmin() {
	return isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'];
}

?>
