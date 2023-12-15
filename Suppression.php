





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connection.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>connectionbiblio</title>
</head>
<body>
    <form>
        <h1>
           Resultat
        </h1>

<div class="mesfond">
    <p ><i class="fa fa-google"></i></p>
    <p><i class="fa fa-facebook"></i></p>
    <p><i class="fa fa-youtube"></i></p>
    <p><i class="fa fa-instagram"></i></p>
</div>
<div class="input">
<?php

$bdd = new PDO('mysql:host=localhost;dbname=gestion_biblio', 'root', '');


$id_emprunt_a_supprimer = $_POST['id_emprunter'];


$sql_verif_existence = "SELECT id_emprunt
                       FROM emprunter
                       WHERE id_emprunt = :id_emprunt";

$stmt_verif_existence = $bdd->prepare($sql_verif_existence);
$stmt_verif_existence->bindParam(':id_emprunt', $id_emprunt_a_supprimer, PDO::PARAM_INT);
$stmt_verif_existence->execute();
$existe = $stmt_verif_existence->fetchColumn();

if ($existe) {
  
    $sql_suppression_emprunt = "DELETE FROM emprunter
                                WHERE id_emprunt = :id_emprunt";

    $stmt_suppression_emprunt = $bdd->prepare($sql_suppression_emprunt);
    $stmt_suppression_emprunt->bindParam(':id_emprunt', $id_emprunt_a_supprimer, PDO::PARAM_INT);

    if ($stmt_suppression_emprunt->execute()) {
        echo "L'emprunt a été supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'emprunt.";
    }
} else {
    echo "Aucun emprunt trouvé avec l'ID spécifié.";
}
?>



</div>
<div align="center">
   <a href="menu_emprnter.html"  class="but">reviens</a>
</div>

    </form>
    
</body>
</html>



















