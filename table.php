<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Client</th>
      <th scope="col">Chambre</th>
      <th scope="col">Dates</th>
      <th scope="col">Statut</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

<?php 

require 'database.php';

class Reservations extends ConnectDB {

     public function editList() 
     { 
        $req = $this->bdd->prepare("SELECT *, clients.nom AS nomclient, reservations.statut AS statutresa, reservations.id AS idResa FROM reservations, clients, chambres WHERE reservations.clientId = clients.id AND reservations.chambreId = chambres.id");
        $req->execute();
        $result = $req->fetchAll();

        foreach($result as $row){

      ?>

      <tbody>

      <?php
          echo "<tr>";
          echo '<th scope="row">'.$row["idResa"].'</th>';
          echo '<td>'.$row["prenom"].' '.$row["nomclient"].'</td>';
          echo '<td>N° '.$row["numero"].'</td>';
          echo '<td>Du '.$row["dateEntree"].' au '.$row["dateSortie"].'</td>';
          echo '<td>'.$row["statutresa"].'</td>';
          echo '<td><a href="editResa.php?id='.$row['idResa'].'" class="btn btn-outline-secondary">Editer</a> <a href="deleteResa.php?id='.$row['idResa'].'" class="btn btn-outline-secondary">Supprimer</a></td>';
          echo "</tr>";
        }
      }
  }

  $table = new Reservations;
  $table->editList();

 ?>
  </tbody>
</table>

<a href="addResa.php" class="btn btn-outline-secondary">Nouvelle réservation</a>

