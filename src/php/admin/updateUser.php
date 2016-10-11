<?php

require_once('../session/function.php');
require_once('../database/connect.php');

if (!isLogon()) {
  header('Location: ../../index.php');
}

if (!isAdmin()) {
  header('Location: ../../inbox.php');
}

if (isset($_POST['id']) && !empty(['id'])) {
  $users =  $file_db->query('SELECT id FROM users');
  $userExist = false;

  foreach ($users as $userId) {
    if ($userId == $_POST['id']) {
      $userExist = true;
    }
  }

  if ($userExist) {
    if (isset($_POST['password']) && isset($_POST['isActive']) && isset($_POST['isAdmin'])) {
      if (!empty($_POST['password'])) {
        $hash = md5($_POST['password']);
        
        $file_db->query("UPDATE users SET password='{$_POST['password']}' WHERE id='{$_POST['id']}'");
      }

      if (!empty($_POST['isActive'])) {
        $file_db->query("UPDATE users SET isActive='{$_POST['isActive']}' WHERE id='{$_POST['id']}'");
      }

      if (!empty($_POST['isAdmin'])) {
        $file_db->query("UPDATE users SET isAdmin='{$_POST['isAdmin']}' WHERE id='{$_POST['id']}'");
      }
    }
  }
}

$file_db = null;

header('Location: ../../admin.php');

?>
