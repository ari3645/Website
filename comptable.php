<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vitalab App</title>
    <link rel="stylesheet" type="text/css" href="comptable.css"/>
    <link rel="icon" href="images/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <nav class="navbar">
        <div class="container1"> 
          <a class="navbar-brand" href="#">
            <img src="images/logo.png" alt="Bootstrap" class="img-nav">
          </a>
        </div>
        <center><p><h4>Vitalab New Gen</h4></p></center>
        <div class="dropdown">
          <button href="" class="btn41-43 btn-42" onclick="logoutcp()">
            Déconnexion
          </button>

          <script>
            function logoutcp() {
              window.location.href = "index.php";
            }
            </script>
        </div>
    </nav>
    <nav class="container2">
        <div class="right" >
          <h3><center>Liste notes de frais</center></h3>
          <div class="note">
            <div class="row">
              <div class="col-md-4">
                  <h4>Nom</h4>
              </div>
              <div class="col-md-4">
                  <h4>Intitulé</h4>
              </div>
              <div class="col-md-4">
                  <h4>Frais</h4>
              </div>
            </div>
          </div>
          <?php
          // Informations d'identification
                $serveur = "vitalab-new-gen.mysql.database.azure.com";
                $dbname = "vitalab-new-gen";
                $user = "albinrvi";
                $pass = "Ari69.008";

                try {
                    // Connexion à la base de données
                    $dsn = "mysql:host=$serveur;dbname=$dbname";
                    $pdo = new PDO($dsn, $user, $pass);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Exécuter la requête SQL pour récupérer le nom de l'utilisateur, l'intitulé de la note de frais et le type de frais
                    $sql = "SELECT n.date_facture, n.montant_facture, n.lieu_facture, f.type_frais, n.statut
                    FROM note_de_frais n 
                    INNER JOIN type_de_frais f ON n.id_frais = f.id_frais
                    WHERE statut='En attente'";
                    
                    $stmt = $pdo->query($sql);

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      $liste_notes_html .= "<div class='card'>";
                      $liste_notes_html .= "<div class='card-body'>";
                      $liste_notes_html .= "<h5 class='card-title'>Date de facture: " . $row['date_facture'] . "</h5>";
                      $liste_notes_html .= "<p class='card-text'>Montant: " . $row['montant_facture'] . "</p>";
                      $liste_notes_html .= "<p class='card-text'>Lieu: " . $row['lieu_facture'] . "</p>";
                      $liste_notes_html .= "<p class='card-text'>Type de frais: " . $row['type_frais'] . "</p>";
                      $liste_notes_html .= "<p class='card-text'>Statut: " . $row['statut'] . "</p>";

                      $liste_utilisateurs_html .= "<a href='comptable.php" . "' class='btn btn-primary'>Voir les détails</a>";

                      $liste_notes_html .= "</div>";
                      $liste_notes_html .= "</div>";
                  }

                  echo $liste_notes_html;

                } catch (PDOException $e) {
                    echo "Erreur : " . $e->getMessage();
                }

                // Fermer la connexion à la base de données
                $pdo = null;
              ?>
        </div>
        <div class="extreme-gauche">
            <div class="left" >
              <h3><center>Informations note de frais</center></h3>
              <h5>Intitulé : </h5>
              <h5> Frais : </h5>
              <h5>Date : </h5>
              <h5> Détails : </h5>
              <?php
              if (isset($_GET['id'])) {
                $userId = $_GET['id'];

                // Requête pour récupérer les détails de l'utilisateur en utilisant $userId
                // Affichez les détails de l'utilisateur
                echo "Détails de l'utilisateur avec l'ID : " . $userId;
              } else {
                    // Si aucun ID d'utilisateur n'est fourni dans l'URL, affichez un message d'erreur
                    echo "Aucun utilisateur sélectionné.";
                }
              ?>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <a href="" class="bn1" >Accepter</a>
                </div>
                <div class="col-md-3">
                    <a href="" class="bn1" >Refuser</a>
                </div>
                <div class="col-md-6">
                    
                </div>
                
            </div>
        </div>
    </nav>


</body>
</html>