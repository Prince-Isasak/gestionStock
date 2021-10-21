<?php

require('admin/database.php');



if(isset($_POST['connect'])){

  try {
  // se connecter à mysql
  $pdo = new PDO("mysql:host=$host;dbname=$dbname","$username","$password");
  } catch (PDOException $exc) {
    echo $exc->getMessage();
    exit();
  }


    $email=$_POST['email'];

    $password=$_POST['password'];


 //  $result = "SELECT * from register where email='".$email."'AND password='".$password."' LIMIT 1";


    $query = $pdo->prepare("SELECT email, password FROM user WHERE email=? AND password=?");

    $query->execute(array($email,$password));


    if($query->rowCount() > 0){

    	header("Location: admin/home.php");
    }else{
  
    	  	header("Location: login.html");


    }


}





?>
