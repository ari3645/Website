<?php
$serveur = "localhost";
$dbname = "compta_frais";
$user = "root";
$pass = "";

$IDu= $_POST["ID_uilisateur"];
$mail = $_POST["mail"];
$mdp = $_POST["motdepasse"];
$nom = $_POST["nom_utilisateur"];
$IDr = $_POST["ID_role"];

try{

$dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//On vérifie si le login existe déjà et si le mot de passe correspond
$sth = $dbco->prepare("INSERT INTO utilisateur VALUES(:ID_u,:mail,:mdp,:nom,:ID_r)");
$sth->bindParam('ID_u',$IDu);
$sth->bindParam('mail',$mail);
$sth->bindParam('mdp',$mdp);
$sth->bindParam('nom',$nom);
$sth->bindParam('ID_r',$IDr);
$sth->execute();

 
}
catch(PDOException $e){
    echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
}