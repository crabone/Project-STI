<?php

require_once('connect.php');

$file_db->exec("CREATE TABLE IF NOT EXISTS `users` (
                  `id` INTEGER PRIMARY KEY,
                  `username` TEXT NOT NULL UNIQUE,
                  `password` TEXT NOT NULL,
                  `isActive` tinyint(1) NOT NULL,
                  `isAdmin` tinyint(1) NOT NULL)");

$file_db->exec("CREATE TABLE `messages` (
                  `id` INTEGER NOT NULL PRIMARY KEY,
                  `subject` TEXT NOT NULL,
                  `content` TEXT NOT NULL,
                  `time` TEXT NOT NULL,
                  `id_from` INTEGER NOT NULL,
                  `id_to` INTEGER NOT NULL,
                  FOREIGN KEY(`id_from`) REFERENCES `users`(`id`),
                  FOREIGN KEY(`id_to`) REFERENCES `users`(`id`))");

$file_db->exec("INSERT INTO `users` (`id`, `username`, `password`, `isActive`, `isAdmin`)
                VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '1')");

$usernames = $file_db->query("SELECT * FROM `users`");

foreach ($usernames as $username) {
  echo $username['username'];
}

?>
