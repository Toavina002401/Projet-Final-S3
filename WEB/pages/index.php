<?php 
include("../inc/function.php");

// Test de la fonction insertPaiement avec des valeurs factices
$date = "2024-02-16";
$idcueilleur = 1;
$poids = 10.5;

// Appel de la fonction insertPaiement
$result = insertPaiement($date, $idcueilleur, $poids);

// Vérification du résultat
if ($result) {
    echo "Le paiement a été inséré avec succès.";
} else {
    echo "Une erreur s'est produite lors de l'insertion du paiement.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test des fonctions</title>
</head>
<body>

</body>
</html>
