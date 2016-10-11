<?php

require_once('../session/function.php');
require_once('../database/connect.php');

if (!isLogon()) {
  header('Location: ../../index.php');
}

if (!isAdmin()) {
  header('Location: ../../inbox.php');
}

if (isset($_POST['id'])) {
  $users =  $file_db->query('SELECT id FROM users');
  $userExist = false;

  foreach ($users as $userId) {
    if ($userId == $_POST['id']) {
      $userExist = true;
    }
  }

  if ($userExist) {
    $file_db->exec("DELETE FROM users WHERE id='{$_POST['id']}'");
    $file_db->exec("DELETE FROM messages WHERE to='{$_POST['id']}'");
  }
}

$file_db = null;

header('Location: ../../admin.php');

?>
