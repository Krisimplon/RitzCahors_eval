<?php 

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


    //function for to connect to the database(formpoo)
    public function connexion(){
        return $this->bdd;
    }


    public function createResa($nomClient,$room,$dateEntree,$dateSortie,$statut) 
    { 
        $sql = $this->bdd->prepare("INSERT INTO reservations (clientId, chambreId, dateEntree, dateSortie, statut) VALUES('$nomClient', '$room', '$dateEntree', '$dateSortie', '$statut')");
        $sql->execute();
    }


    public function editResa($idResa) 
    { 
        $req = $this->bdd->prepare("SELECT *, clients.nom AS nomclient, reservations.statut AS statutresa, reservations.id AS idResa FROM reservations, clients, chambres WHERE reservations.id = $idResa AND reservations.clientId = clients.id AND reservations.chambreId = chambres.id");
        $req->execute();
        $resultat = $req->fetch();

        return $resultat;
    }

    public function messDeleteResa($idResa) 
    { 
        $req = $this->bdd->prepare("SELECT *, clients.nom AS nomclient, reservations.id AS idResa  FROM reservations, clients, chambres WHERE reservations.id = $idResa AND reservations.clientId = clients.id AND reservations.chambreId = chambres.id");
        $req->execute();
        $resultatDelete = $req->fetch();

        return $resultatDelete;
    }

    public function deleteResa($idResa) 
    { 
        $req = $this->bdd->prepare("DELETE FROM reservations WHERE reservations.id = $idResa");
        $req->execute();

        return $req;
    }

}


class AffichSelectResas extends ConnectDB {

     public function affichSelectClient() 
     { 
        $req = $this->bdd->prepare("SELECT * FROM clients");
        $req->execute();
        $resultat = $req->fetchAll();

        foreach($resultat as $row){
            echo '<option value='.$row["id"].'>'.$row["prenom"].' '.$row["nom"].'</option>';
        }
      }

     public function affichSelectChambres() 
     { 
        $req = $this->bdd->prepare("SELECT * FROM chambres");
        $req->execute();
        $resultat = $req->fetchAll();

        foreach($resultat as $row){
            echo '<option value='.$row["id"].'>N° : '.$row["numero"].' : '.$row["nom"].'</option>';
        }
      }
    }

 ?>