<?php
  require '../vendor/autoload.php';

  $store = new Dsw\Rating\StoreDB('localhost', 'root', '', 'ratingdb');
  // $store = new Dsw\Rating\StoreFile();
?>