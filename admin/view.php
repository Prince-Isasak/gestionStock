<?php

require('database.php');
//On demarre la session
session_start();
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
    <title>page Voir</title>
</head>
<body>
<div class="container admin">
            <div class="row">
               <div class="col-sm-6">
                    <h1><strong>Voir un Produit</strong></h1>
                    <br>
                    <form>
                      <div class="form-group">
                        <label>Libelle:</label><?php echo '  '.$reference['libelle'];?>
                      </div>
                      <br>
                      <div class="form-group">
                        <label >Quantite_Minimale:</label><?php echo '  '.$reference['quantite_minimale'];?>
                      </div>
                      <br>
                      <div class="form-group">
                        <label>Quantite_En_Stock:</label><?php echo '  '.$reference['quantite_en_stock'];?>
                      </div>
                    </form>
                    <br>
                    <div class="form-actions">
                        <a class="btn btn-primary" href="home.php">Retour</a>
                    </div>
                </div> 
                    </div>
                </div>
            </div>
        </div>   



              <!--mon js-->
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
