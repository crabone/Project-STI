<?php

require_once('../session/function.php');

$_SESSION = array();
session_destroy();

header('Location: ../../index.php');

?>
