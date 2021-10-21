<?php
    require('database.php');
    $id = checkInput($_GET['reference']);
    

    
    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    if(isset($_GET['reference'])):
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>page de suppression</title>
</head>
<body>
    <div class="container admin">
        <div class="row">
            <h1><strong>Supprimer un Produit</strong></h1>
            <br>
            <form class="form" action="delete.php?reference=<?= $id ?>&remove" role="form" method="post">
                <input type="hidden" name="id" value="<?php echo $reference;?>"/>
                <p class="alert alert-warning">Etes vous sur de vouloir supprimer ?</p>
                <div class="form-actions">
                    <button type="submit" name="submit" class="btn btn-warning">Oui</button>
                    <a class="btn btn-default" href="home.php">Non</a>
                </div>
            </form>
        </div>
    </div>   
              <!--mon js-->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php

    if (isset($_GET['reference']) && isset($_GET['remove'])) {
        $statement = $pdo->prepare("DELETE FROM produit WHERE reference = ?");
        $statement->execute(array($id));
        header("Location: home.php");
    }

    endif;
?>
