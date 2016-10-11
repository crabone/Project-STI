<?php

$file_db = new PDO('sqlite:' . $_SERVER['DOCUMENT_ROOT'] . '/database/database.sqlite');
$file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

?>
