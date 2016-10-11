<?php

require_once('../session/function.php');
require_once('../database/connect.php');

if (!isLogon()) {
  header('Location: ../../index.php');
}

if (isset($_POST['to']) && isset($_POST['subject']) && isset($_POST['content'])) {
  $formatted_time = date('Y-m-d H:i:s');

  $file_db->exec("INSERT INTO messages (subject, content, time, id_from, id_to)
                  VALUES ('{$_POST['subject']}', '{$_POST['content']}', '{$formatted_time}', '{$_SESSION['id']}', '{$_POST['to']}')");
}

$file_db = null;

header('Location: ../../inbox.php');

?>
