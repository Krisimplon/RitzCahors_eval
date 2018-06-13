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
        <h2>Gestion des réservations</h2>
      </div>
    </div>
  </div>
	  <div class="container">
  	    <div class="row">
   		  <div class="col-10">
      		<table class="table table-striped">
        	  <thead class="thead-dark">
         		<tr>
            	  <th scope="col">ID</th>
            	  <th scope="col">Client</th>
            	  <th scope="col">Chambre</th>
            	  <th scope="col">Dates</th>
            	  <th scope="col" class="responsiveCol">Statut</th>
            	  <th scope="col">Actions</th>
          		</tr>
        	  </thead>
        	  <tbody>

			  <?php 
			    require 'database.php';

			    $table = new Reservation;
			    $table->readResa();
			  ?>

        	  </tbody>
      		</table>
      		<a href="addResa.php" class="btn btn-dark">Nouvelle réservation</a>
    	  </div>
  		</div>
	  </div>
</body>
</html>