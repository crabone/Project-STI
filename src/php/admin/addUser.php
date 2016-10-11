<?php

require_once('../session/function.php');
require_once('../database/connect.php');

if (!isLogon()) {
  header('Location: ../../index.php');
}

if (!isAdmin()) {
  header('Location: ../../inbox.php');
}

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['isActive']) && isset($_POST['isAdmin'])) {
  $usernames =  $file_db->query('SELECT username FROM users');
  $isUsernameAvailable = true;

  foreach ($usernames as $username) {
    if ($username == $_POST['username']) {
      $isUsernameAvailable = false;
    }
  }

  if ($isUsernameAvailable) {
    $isActive = $_POST['isActive'] ? 1 : 0;
    $isAdmin = $_POST['isAdmin'] ? 1 : 0;
    $hash = md5($_POST['password']);

    $file_db->exec("INSERT INTO users (username, password, isActive, isAdmin)
                    VALUES ('{$_POST['username']}', '{$hash}', '{$isActive}', '{$isAdmin}')");
  }
}

$file_db = null;

header('Location: ../../admin.php');

?>
