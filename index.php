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
	  <div class="container responsiveContainer">
  	    <div class="row">
   		  <div class="col-10">
      		<table class="table table-striped">
        	  <thead class="thead-dark">
         		<tr>
            	  <th scope="col" class="responsiveTable">ID</th>
            	  <th scope="col" class="responsiveTable">Client</th>
            	  <th scope="col" class="responsiveTable">Chambre</th>
            	  <th scope="col" class="responsiveTable">Dates</th>
            	  <th scope="col" class="responsiveSuppCol">Statut</th>
            	  <th scope="col" class="responsiveTable">Actions</th>
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
      		<a href="addResa.php" class="btn btn-dark responsivebtn">Nouvelle réservation</a>
    	  </div>
  		</div>
	  </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script type="text/javascript" src="app.js"></script>
</body>
</html>