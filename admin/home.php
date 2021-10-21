
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Ma page d'Admin</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">GeekShop</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      <div class="content-panel">
        <div class="d-flex">
          <div>
          <h1>MES PRODUITS</h1>
          </div>
          <div>
            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Ajouter
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un produit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="produit.php">
         <div class="modal-body">
      
            <div class="mb-3">
              <label for="libelle" class="form-label">Libelle</label>
              <input type="text" class="form-control" id="libelle" name="libelle" required="#">
            </div>
            <div class="mb-3">
              <label for="number" class="form-label">Quantite_Minimale</label>
              <input type="number" class="form-control" id="number" name="quantite_minimale" required="#">
            </div>
            <div class="mb-3">
              <label for="number" class="form-label">Quantite_En_Stock</label>
              <input type="number" class="form-control" id="number" name="quantite_en_stock" required="#">
            </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" name="return">Retour</button>
        <button type="submit" class="btn btn-primary" name="insert">Ajouter</button>
      </div>
    </form>
    </div>
  </div>
</div>
          </div>
        </div>
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>REFERENCE</th>
        <th>LIBELLE</th>
        <th>QUANTITE_MINIMALE</th>
        <th>QUANTITE_EN_STOCK</th>
        <th>ACTION</th>
      </tr>
    </thead>
    <tbody>
      <?php
     require('database.php');


  $results = $pdo->query('SELECT * FROM produit');

  
  while ($row = $results->fetch()) 
  {
    echo "<tr>";
       
        echo "<td>$row[reference]</td>";
        echo "<td>$row[libelle]</td>";
        echo "<td>$row[quantite_minimale]</td>";
        echo "<td>$row[quantite_en_stock]</td>";
        echo "<td width=300>";
       echo '<a class="btn btn-primary" href="view.php?reference=' . $row['reference'] . '"> VOIR</a>';
       echo ' ';
       echo '<a class="btn btn-primary"  href="update.php?reference=' . $row['reference'] . '">MODIFIER</a>';
       echo ' ';
       echo '<a class="btn btn-danger" href="delete.php?reference=' . $row['reference'] . '">SUPPRIMER</a>';
       echo '</td>';
       echo '</tr>';
  }

?>
      
    </tbody>
  </table>
  

</div>
  


      <!--mon js-->
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>

