<?php
$serveur = "localhost";
$dbname = "compta_frais";
$user = "root";
$pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $IDu="005";
    $mail = $_POST["mail"];
    $mdp = $_POST["mot_de_passe"];
    $nom = $_POST["nom_utilisateur"];
    $IDr = $_POST["role"];
}
try{

    $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sth = $dbco->prepare("SELECT COUNT(*) FROM utilisateur WHERE ID_utilisateur= :ID_u OR Mail=:mail");
    $sth->bindParam('ID_u', $IDu);
    $sth->bindParam('mail',$mail);
    $sth->execute();
    $count = $sth->fetchColumn();
    if ($count == 0) {
        //Verifier que l'identifiant et le mot de passe n'existe pas dans la base de données
        $sth = $dbco->prepare("INSERT INTO utilisateur VALUES(:ID_u,:mail,:mdp,:nom,:ID_r)");
        $sth->bindParam('ID_u',$IDu);
        $sth->bindParam('mail',$mail);
        $sth->bindParam('mdp',$mdp);
        $sth->bindParam('nom',$nom);
        $sth->bindParam('ID_r',$IDr);
        $sth->execute();
        $message ="Utilisateur crée";
        header("Location: admin_p_user.php");
        exit();
    } else {
        $message="utilisateur déja existant";
        header("Location:admin_p_user.php");
        exit();
        }
}
catch(PDOException $e){
    echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
}
?>