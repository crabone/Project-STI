<?php

require_once('../session/function.php');
require_once('../database/connect.php');

if (isset($_POST['username']) && isset($_POST['password'])) {
  $result =  $file_db->query("SELECT * FROM users WHERE username='{$_POST['username']}'");
  $user = $result->fetch(PDO::FETCH_ASSOC);

  if ($user == NULL || $user['isActive'] != 1) {
    header('Location: ../../index.php');
  }
  else {
    if ($user['password'] != md5($_POST['password'])) {
      header('Location: ../../index.php');
    }
    else {
      $_SESSION = array();
      $_SESSION['id'] = $user['id'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['isAdmin'] = $user['isAdmin'];

      header('Location: ../../inbox.php');
    }
  }
}
else {
  $file_db = null;
}

?>
