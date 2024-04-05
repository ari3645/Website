<?php
$servername = "localhost";
$database = "compta_frais";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Échec de la connexion : " . mysqli_connect_error());
}
 
echo "Connexion réussie";
 
$sql = "INSERT INTO rôle (ID_rôle, Nom_rôle) VALUES (001,'Administrateur')";
if (mysqli_query($conn, $sql)) {
      echo "Nouveau enregistrement créé avec succès";
} else {
      echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);