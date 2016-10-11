<?php

require_once('../session/function.php');
require_once('../database/connect.php');

if (!isLogon()) {
  header('Location: ../../index.php');
}

if (isset($_POST['id'])) {
  $file_db->exec("DELETE FROM messages WHERE id='{$_POST['id']}'");
}

$file_db = null;

header('Location: ../../inbox.php');

?>
