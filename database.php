<?php 

//class to connect to database RitzCahors_eval
class ConnectDB
{
    protected $bdd = '';
    protected $connec_host = '';
    protected $connec_dbname = '';
    protected $connec_pseudo = '';
    protected $connec_mdp = '';

    //construct the database's connection
    public function __construct($connec_host = 'localhost', $connec_dbname = 'RitzCahors_eval', $connec_pseudo = 'root', $connec_mdp = 'simplon8')
    {
        try {
            $this->bdd = new PDO('mysql:host='.$connec_host.';dbname='.$connec_dbname, $connec_pseudo, $connec_mdp);
        }

        catch(PDOException $e) {
            die('<h3>Erreur de connexion!</h3>');
        }
    }

    //function for to connect to the database
    public function connexion(){
        return $this->bdd;
    }
}


// CRUD of reservation's table
class Reservation extends ConnectDB {

    //function for to read the reservation's table
    public function readResa() 
    { 
        $req = $this->bdd->prepare("SELECT *, clients.nom AS nomclient, reservations.statut AS statutresa, reservations.id AS idResa FROM reservations, clients, chambres WHERE reservations.clientId = clients.id AND reservations.chambreId = chambres.id");
        $req->execute();
        $result = $req->fetchAll();

        foreach($result as $row){
            echo "<tr>";
            echo '<th scope="row">'.$row["idResa"].'</th>';
            echo '<td>'.$row["prenom"].' '.$row["nomclient"].'</td>';
            echo '<td>N° '.$row["numero"].'</td>';
            echo '<td>Du '.$row["dateEntree"].' au '.$row["dateSortie"].'</td>';
            echo '<td>'.$row["statutresa"].'</td>';
            echo '<td><a href="editResa.php?id='.$row['idResa'].'" class="btn btn-secondary btn-sm">Editer</a> <a href="deleteResa.php?id='.$row['idResa'].'" class="btn btn-secondary btn-sm">Supprimer</a></td>';
            echo "</tr>";
        }
    }

    //function for to create a new reservation on database
    public function createResa($nomClient,$room,$dateEntree,$dateSortie,$statut) 
    { 
        $sql = $this->bdd->prepare("INSERT INTO reservations (clientId, chambreId, dateEntree, dateSortie, statut) VALUES('$nomClient', '$room', '$dateEntree', '$dateSortie', '$statut')");
        $sql->execute();
    }

    //function for to print the infos of a reservation with id(GET)
    public function editResa($idResa) 
    { 
        $req = $this->bdd->prepare("SELECT *, clients.nom AS nomclient, reservations.statut AS statutresa, reservations.id AS idResa FROM reservations, clients, chambres WHERE reservations.id = $idResa AND reservations.clientId = clients.id AND reservations.chambreId = chambres.id");
        $req->execute();
        $resultat = $req->fetch();

        return $resultat;
    }

    //function for to update the infos of a reservation in database
    public function updateResa($idResa,$nomClient,$room,$dateEntree,$dateSortie,$statut) 
    { 
        $req = $this->bdd->prepare("UPDATE reservations SET clientId = '$nomClient', chambreId = '$room', dateEntree = '$dateEntree', dateSortie = '$dateSortie', statut = '$statut' WHERE id = '$idResa'");
        $req->execute();

        return $req;
    }

    //function for to print confirmation of delete's action to a reservation
    public function messDeleteResa($idResa) 
    { 
        $req = $this->bdd->prepare("SELECT *, clients.nom AS nomclient, reservations.id AS idResa  FROM reservations, clients, chambres WHERE reservations.id = $idResa AND reservations.clientId = clients.id AND reservations.chambreId = chambres.id");
        $req->execute();
        $resultatDelete = $req->fetch();

        return $resultatDelete;
    }

    //function for to delete a reservation in database
    public function deleteResa($idResa) 
    { 
        $req = $this->bdd->prepare("DELETE FROM reservations WHERE reservations.id = $idResa");
        $req->execute();

        return $req;
    }
}


//class for to print the differents options for a select with database's infos
class AffichSelectResas extends ConnectDB {

     //select differents clients
     public function affichSelectClient() 
     { 
        $req = $this->bdd->prepare("SELECT * FROM clients");
        $req->execute();
        $resultat = $req->fetchAll();

        foreach($resultat as $row){
           echo '<option value='.$row["id"].'>'.$row["prenom"].' '.$row["nom"].'</option>';
        }
      }

     //select differents rooms
     public function affichSelectChambres() 
     { 
        $req = $this->bdd->prepare("SELECT * FROM chambres");
        $req->execute();
        $resultat = $req->fetchAll();

        foreach($resultat as $row){
            echo '<option value='.$row["id"].'>N°'.$row["numero"].' : '.$row["nom"].'</option>';
        }
      }
    }

 ?>