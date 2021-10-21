<?php

$host = 'localhost';
$dbname = 'geekshop';
$username = 'root';
$password = '';



  try {
  // se connecter à mysql
  $pdo = new PDO("mysql:host=$host;dbname=$dbname","$username","$password");
  } catch (PDOException $exc) {
    echo $exc->getMessage();
    exit();
  }
  ?>