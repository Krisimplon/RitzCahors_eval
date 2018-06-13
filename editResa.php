<?php
    require 'database.php'; 
    $idResa = $_GET['id'];

    $formEdit = new Reservation;
    $result = $formEdit->editResa($idResa);
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
        <h2>Modifier la réservation N°<?php echo $idResa; ?></h2>
      </div>
    </div>
  </div>
<div class="container card text-center">
  <div class="card-header">
    Réservation N°<?php echo $idResa; ?>
  </div>
  <div class="row">
    <div class="col-6 card-body">
      <form method="POST">
        <div class="form-group row">
          <label for="clientName" class="col-sm-4 col-form-label">Client</label>
          <div class="col-sm-8">
            <select name="clientName" class="form-control">
                <?php 
                    $formulaire = new AffichSelectResas;
                    $formCli = $formulaire->affichSelectClient();
                    echo '<option selected value='.$result["clientId"].'>'.$result["prenom"].' '.$result["nomclient"].'</option>';
                ?> 
            </select>       
          </div>
        </div>
        <div class="form-group row">
          <label for="chambre" class="col-sm-4 col-form-label">Chambre</label>
          <div class="col-sm-8">
            <select name="chambre" class="form-control">
                <?php 
                    $formulaire = new AffichSelectResas;
                    $formCham = $formulaire->affichSelectChambres();
                    echo '<option selected value='.$result["chambreId"].'>N°'.$result["numero"].' : '.$result["nom"].'</option>';
                ?> 
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="dateEntree" class="col-sm-4 col-form-label">Date d'entrée</label>
          <div class="col-sm-8">
            <input type="Date" name="dateEntree" class="form-control" value=<?php echo $result["dateEntree"];
            ?>>
          </div>
        </div>
          <div class="form-group row">
            <label for="dateSortie" class="col-sm-4 col-form-label">Date de sortie</label>
            <div class="col-sm-8">
              <input type="Date" name="dateSortie" class="form-control" value=<?php echo $result["dateSortie"];
              ?>>
            </div>
          </div>
          <div class="form-group row">
            <label for="statut" class="col-sm-4 col-form-label">Statut</label>
            <div class="col-sm-8">
              <select name="statut" class="form-control">
                <?php 
                echo '<option value="valide">valide</option>
                      <option value="attente">attente</option>
                      <option value="refus">refus</option>
                      <option selected value='.$result["statutresa"].'>'.$result["statutresa"].'</option>';
                ?> 
              </select>
            </div>
          </div>
          <button class="btn btn-secondary submitUpdate" name="submitUpdate">Enregistrer</button>
        </form>
      </div>
    </div>
  </div>
  <a href="index.php" class="btn btn-secondary buttonRetour">Retour</a>
</body>
</html>

<?php
    $nomClient = $_POST['clientName'];
    $room = $_POST['chambre'];
    $dateEntree = $_POST['dateEntree'];
    $dateSortie = $_POST['dateSortie'];
    $statut = $_POST['statut'];

    if(isset($_POST['submitUpdate']))
    {
        $updateReservation = new Reservation;
        $upd = $updateReservation->updateResa($idResa,$nomClient,$room,$dateEntree,$dateSortie,$statut);

        header('Location: index.php');
    }
?>