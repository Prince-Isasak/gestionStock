<?php

//on inclut la connexion à la base
require('database.php');

//On demarre une session
session_start();

if($_POST){  
    if(isset($_POST['reference']) && !empty($_POST['reference'])
    &&isset($_POST['libelle']) && !empty($_POST['libelle'])
    && isset($_POST['quantite_minimale']) && !empty($_POST['quantite_minimale'])
    && isset($_POST['quantite_en_stock']) && !empty($_POST['quantite_en_stock'])){

        

        //On netoie les données envoyés
        $reference = strip_tags($_POST['reference']);
        $libelle = strip_tags($_POST['libelle']);
        $quantite_minimale = strip_tags($_POST['quantite_minimale']);
        $quantite_en_stock = strip_tags($_POST['quantite_en_stock']);

        //requête d'insertion
        $sql = 'UPDATE `produit` SET `reference`= :reference , `libelle`= :libelle , `quantite_minimale`
             = :quantite_minimale , `quantite_en_stock`= :quantite_en_stock WHERE `reference`= :reference;';


        
        //requête preparé
        $query = $pdo->prepare($sql);

        $query->bindValue(':reference', $reference, PDO::PARAM_STR);
        $query->bindValue(':libelle', $libelle, PDO::PARAM_STR);
        $query->bindValue(':quantite_minimale', $quantite_minimale, PDO::PARAM_STR);
        $query->bindValue(':quantite_en_stock', $quantite_en_stock, PDO::PARAM_STR);

        $query->execute();

        $_SESSION['message'] = "Produit modifié";
        require('close.php');
        
        header('Location: home.php');

    }else{
        $_SESSION['erreur'] = "Le formulaire est incomplet";

   
    }
}

//Est-ce que l'id existe et n'est pas dans l'url
if(isset($_GET['reference']) && !empty($_GET['reference'])){
    

    //On nettoie l id envoyé
    $reference = strip_tags($_GET['reference']);
    $sql = 'SELECT * FROM `produit` WHERE `reference` = :reference;';
   

    //On prepare la requete

    $query = $pdo->prepare($sql);

    //On accroche les paramètre ()
    $query->bindValue(':reference', $reference, PDO::PARAM_INT);
    

    //On excecute
    $query->execute();

    //On recupère le produit
    $reference = $query->fetch();

    //On verifie si la produit existe
    if(!$reference){
        $_SESSION['erreur'] = "Cet id n'existe pas";
        header('Location: home.php');
    }

}else{
    $_SESSION['erreur'] = "URL invalide";
    header('Location:home.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>page de Modification</title>
</head>
<body>
<div class="container admin">
            <div class="row">
                <h1><strong>Modifier un Produit</strong></h1>
                    <br>
                    <div class="col-sm-6">

                    <?php
                    if(!empty($_SESSION['erreur'])){
                        echo '<div class="alert alert-danger" role="alert">
                                '. $_SESSION['erreur'].'
                                </div>';
                                $_SESSION['erreur'] ="";
                    }
                ?>
               <form class="form" action="<?php echo 'update.php?id='.$reference;?>" role="form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="libelle" class="form-label">REFERENCE</label>
                            <input type="text" class="form-control" id="reference" name="reference" required="#"
                             Value="<?= $reference['reference']?>">
                        </div>               
                        <div class="form-group">
                            <label for="libelle" class="form-label">Libelle</label>
                            <input type="text" class="form-control" id="libelle" name="libelle" required="#" 
                            Value="<?= $reference['libelle']?>">
                        </div>
                        <div class="form-group">
                            <label for="number" class="form-label">Quantite_Minimale</label>
                            <input type="number" class="form-control" id="quantite_Minimale" name="quantite_Minimale" required="#" 
                            Value="<?= $reference['quantite_minimale']?>">
                        </div>    
                        <div class="form-group">
                            <label for="number" class="form-label">Quantite_En_Stock</label>
                            <input type="number" class="form-control" id="quantite_En_Stock" name="quantite_En_Stock" required="#" 
                            Value="<?= $reference['quantite_en_stock']?>">
                        </div>  
                        <br>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> Modifier</button>
                            <a class="btn btn-primary" href="home.php"> Retour</a>
                       </div>
                </form>
                </div>
            </div>
        </div>   



              <!--mon js-->
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
