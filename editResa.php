<?php

    require 'database.php'; 

    $idResa = $_GET['id'];


    $formulaire = new ConnectDB;
    $formulaire->connexion();
    $result = $formulaire->editResa($idResa);

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
<h2>Modifier la réservation de <?php echo $result["prenom"].' '.$result["nomclient"]; ?></h2>

<div class="container">
  <div class="row">
    <div class="col-6">
        <form method="POST">
            <div class="form-group row">
                <label for="clientName" class="col-sm-4 col-form-label">Client</label>
                <div class="col-sm-8">
                    <select name="clientName" class="form-control">
                    <?php 
                        echo '<option value='.$result["idResa"].'selected>'.$result["prenom"].' '.$result["nomclient"].'</option>';
                     ?> 
                    </select>       
                </div>
            </div>
            <div class="form-group row">
                <label for="chambre" class="col-sm-4 col-form-label">Chambre</label>
                <div class="col-sm-8">
                    <select name="chambre" class="form-control">
                    <?php 
                        echo '<option value='.$result["idResa"].'>'.$result["nom"].'</option>';
                     ?> 
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="dateEntree" class="col-sm-4 col-form-label">Date d'entrée</label>
                <div class="col-sm-8">
                    <input type="Date" name="dateEntree" class="form-control" value=<?php 
                        echo $result["dateEntree"];
                     ?>>
                </div>
            </div>
            <div class="form-group row">
                <label for="dateSortie" class="col-sm-4 col-form-label">Date de sortie</label>
                <div class="col-sm-8">
                    <input type="Date" name="dateSortie" class="form-control" value=<?php 
                        echo $result["dateSortie"];
                     ?>>
                </div>
            </div>
            <div class="form-group row">
                <label for="statut" class="col-sm-4 col-form-label">Statut</label>
                <div class="col-sm-8">
                    <select name="statut" class="form-control">
                        <?php 
                        echo '<option value='.$result["idResa"].'>'.$result["statutresa"].'</option>';
                        ?> 
                    </select>
                </div>
            </div>
            <input type="submit" value="Enregistrer">
        </form>
    </div>
  </div>
</div>

<button class="btn btn-outline-secondary">Retour</button>
</body>
</html>

<?php

	// $nomClient = $_POST['clientName'];
 //    $room = $_POST['chambre'];
 //    $dateEntree = $_POST['dateEntree'];
 //    $dateSortie = $_POST['dateSortie'];
 //    $statut = $_POST['statut'];

 //    if(!isset($_POST['submit']))
 //    {
 //        $creationResa = new ConnectDB;
 //        $creationResa->connexion();
 //        $creationResa->creerResa($nomClient,$room,$dateEntree,$dateSortie,$statut);
 //    }
?>