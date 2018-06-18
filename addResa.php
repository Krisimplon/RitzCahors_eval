<?php require 'database.php'; 
$defaut = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>App Ritz Cahors</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="row">  
      <div class="titlePage">
        <img src="logo.jpg" class="logoHotel" alt="logo hôtel" width="100px">
        <h2>Nouvelle réservation</h2>
      </div>
    </div>
  </div>
<div class="container card">
  <div class="card-header text-center">
    Nouvelle réservation
  </div>
  <div class="row">
    <div class="col-6 card-body">
        <form method="POST">
            <div class="form-group row responsiveRow">
                <label for="clientName" class="col-sm-4 col-form-label responsiveTable">Client</label>
                <div class="col-sm-8">
                    <select name="clientName" class="form-control">
                    <?php 
                        $formulaire = new AffichSelectResas;
                        $formulaire->affichSelectClient($defaut);
                     ?> 
                    </select>       
                </div>
            </div>
            <div class="form-group row responsiveRow">
                <label for="chambre" class="col-sm-4 col-form-label responsiveTable">Chambre</label>
                <div class="col-sm-8">
                    <select name="chambre" class="form-control">
                    <?php 
                        $formulaire = new AffichSelectResas;
                        $formulaire->affichSelectChambres($defaut);
                    ?>
                    </select>
                </div>
            </div>
            <div class="form-group row responsiveRow">
                <label for="dateEntree" class="col-sm-4 col-form-label responsiveTable">Date d'entrée</label>
                <div class="col-sm-8">
                    <input type="Date" name="dateEntree" class="form-control">
                </div>
            </div>
            <div class="form-group row responsiveRow">
                <label for="dateSortie" class="col-sm-4 col-form-label responsiveTable">Date de sortie</label>
                <div class="col-sm-8">
                    <input type="Date" name="dateSortie" class="form-control">
                </div>
            </div>
            <div class="form-group row responsiveRow">
                <label for="statut" class="col-sm-4 col-form-label responsiveTable">Statut</label>
                <div class="col-sm-8">
                    <select name="statut" class="form-control">
                        <option value="valide">valide</option>
                        <option value="attente">attente</option>
                        <option value="refus">refus</option>
                    </select>
                </div>
            </div>
            <button class="btn btn-secondary submitUpdate responsivebtn" name="submitAdd">Enregistrer</button>
        </form>
    </div>
  </div>
</div>
<a href="index.php" class="btn btn-secondary buttonRetour responsivebtn">Retour</a>
</body>
</html>

<?php
	$nomClient = $_POST['clientName'];
    $room = $_POST['chambre'];
    $dateEntree = $_POST['dateEntree'];
    $dateSortie = $_POST['dateSortie'];
    $statut = $_POST['statut'];

    if(isset($_POST['submitAdd']))
    {
        $creationResa = new Reservation;
        $creationResa->createResa($nomClient,$room,$dateEntree,$dateSortie,$statut);

        header('Location: index.php');
    }
?>