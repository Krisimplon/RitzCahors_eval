<?php     
require 'database.php'; 
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
        <h2>Gestion des réservations</h2>
      </div>
    </div>
  </div>
  <div class="buttonFilters">
      <select name="selectFilterCli" class="btn btn-secondary dropdown-toggle filtersBtn" id="filterClients">
        <option selected value="0">Clients</option>
        <?php 
          $filtrecli = new AffichSelectResas;
          foreach($filtrecli->filterClient()->fetchAll() as $line) {
            echo '<option value="'.$line["id"].'" class="dropdown-item">'.$line["prenom"].' '.$line["nom"].'</option>'; 
          } 
        ?>
      </select>
      <select name="selectFilterRoom" class="btn btn-secondary dropdown-toggle filtersBtn" id="filterRooms">
        <option selected value="0">Chambres</option>
        <?php 
          $filtreroom = new AffichSelectResas;
          foreach($filtreroom->filterRoom()->fetchAll() as $line) {
            echo '<option value="'.$line["id"].'" class="dropdown-item">'.$line["nom"].' : '.$line["numero"].'</option>'; 
          } 
        ?>
      </select>
  </div>
	  <div class="container responsiveContainer">
  	    <div class="row">
   		  <div class="col-10">
      		<table class="table table-striped" id="tableauResa">
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
        	  <tbody id="tableauFilter">

			  <?php 

			    $table = new Reservation;
          $table->readResa();
			  ?>

        	  </tbody>
      		</table>
      		<a href="addResa.php" class="btn btn-dark responsivebtn">Nouvelle réservation</a>
    	  </div>
  		</div>
	  </div>
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script type="text/javascript" src="app.js"></script>
</body>
</html>