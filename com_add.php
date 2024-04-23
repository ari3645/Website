<?php
$serveur = "localhost";
$dbname = "compta_frais";
$user = "root";
$pass = "";

$ID_nF= $_POST["ID_notefrais"];
$datef= $_POST["Date_facture"];
$montant= $_POST["Montant"];
$Lieu= $_POST["Lieu_facture"];
$Image= $_POST["Image"];
$IDu= $_POST["ID_utilisateur"];


try{

$dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sth = $dbco->prepare("INSERT INTO note_frais VALUES(:ID_nf,:date_f,:montant,:lieu,:image_f,:ID_u)");
$sth->bindParam('ID_nf',$ID_nF);
$sth->bindParam('date_f',$datef);
$sth->bindParam('montan',$montant);
$sth->bindParam('lieu',$Lieu);
$sth->bindParam('image_f',$Image);
$sth->bindParam('ID_u',$IDu);
$sth->execute();

 
}
catch(PDOException $e){
    echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
}