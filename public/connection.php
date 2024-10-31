<?php
  $host = "localhost";
  $user = "root";
  $password = "";
  $db = "ratingdb";

  $dsn = "mysql:host=$host;dbname=$db";

  $link = new PDO($dsn, $user, $password);
?>