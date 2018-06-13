<?php
    require 'database.php'; 
    $idResa = $_GET['id'];

    $messSuppResa = new Reservation;
    $messSupp = $messSuppResa->messDeleteResa($idResa);
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
      	  <img src="logo.jpg" class="logoHotel" alt="logo hôtel">
          <h2>Suppression d'une réservation</h2>
        </div>
      </div>
  	</div>
	<div class="card text-center">
	  <div class="card-header">
		<h5>Etes-vous sûr de vouloir supprimer la réservation n° <?php echo $idResa; ?> ?</h5>
	  </div>
		<div class=" card-body text-center">
			<p><?php echo $messSupp["prenom"].' '.$messSupp["nomclient"].' / Chambre N°'.$messSupp["numero"]; ?></p>
			<p><?php echo 'Du '.$messSupp["dateEntree"]; ?></p>
			<p><?php echo 'Au '.$messSupp["dateSortie"]; ?></p>
		</div>
		<div class="buttonDelete">
			<a href="index.php" class="btn btn-secondary">Annuler</a>
			<form method="POST">
				<button class="btn btn-secondary" name="submit">Confirmer la suppression</button>
			</form>
		</div>
	</div>
	
	<?php 
		if (isset($_POST['submit'])) {
			$suppResa = new Reservation;
    		$suppResa->deleteResa($idResa);

    		header('Location: index.php');
		}
	 ?>

</body>
</html>