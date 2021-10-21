
<?php


require('database.php');


  // récupérer les valeurs 
  $libelle = $_POST['libelle'];
  $quantite_minimale = $_POST['quantite_minimale'];
  $quantite_en_stock = $_POST['quantite_en_stock'];


  // Requête mysql pour insérer des données
  $sql = "INSERT INTO `produit`(`libelle`, `quantite_minimale`, `quantite_en_stock` ) VALUES (:libelle,:quantite_minimale,:quantite_en_stock)";
  $res = $pdo->prepare($sql);
  $exec = $res->execute(array(":libelle"=>$libelle,":quantite_minimale"=>$quantite_minimale,":quantite_en_stock"=>$quantite_en_stock));

  // vérifier si la requête d'insertion a réussi
  if($exec){
   // echo 'Données insérées';
  	header("Location: home.php");
  }else{
    echo "Échec de l'opération d'insertion";
  }




?>
