<?php 
    include("../inc/function.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test des fonctions</title>
</head>
<body>
    <h1>Test des fonctions</h1>

    <?php
        // Test des fonctions de saisie de cueillette
        $date_cueillette = '2024-02-10';
        $id_cueilleur = 1;
        $id_parcelle = 1;
        $poids_cueilli = 12.5;

        echo "<h2>Test des fonctions de saisie de cueillette</h2>";
        echo "Résultat de la saisie de cueillette: " . (saisiecuillete($date_cueillette, $id_cueilleur, $id_parcelle, $poids_cueilli) ? "Succès" : "Échec");

        // Test des fonctions de saisie de dépense
        $date_depense = '2024-02-10';
        $nom_depense = 'Achat d engrais';
        $id_typeDepense = 1;
        $montant_depense = 50.25;

        echo "<h2>Test des fonctions de saisie de dépense</h2>";
        echo "Résultat de la saisie de dépense: " . (saisieDepense($date_depense, $nom_depense, $id_typeDepense, $montant_depense) ? "Succès" : "Échec");

        // Test de la fonction de calcul de la somme des poids cueillis dans une parcelle pour un mois donné
        $id_parcelle_test = 1;
        $date_test = '2024-02-10';

        echo "<h2>Test de la fonction de calcul de la somme des poids cueillis dans une parcelle pour un mois donné</h2>";
        echo "Somme des poids cueillis dans la parcelle: " . sumPoidscultive($id_parcelle_test, $date_test);

        // Test de la fonction de calcul du poids maximum de thé attendu dans une parcelle
        echo "<h2>Test de la fonction de calcul du poids maximum de thé attendu dans une parcelle</h2>";
        echo "Poids maximum de thé attendu dans la parcelle: " . getMAX($id_parcelle_test);

        // Test de la fonction pour vérifier si le poids de la cueillette est suffisant
        echo "<h2>Test de la fonction pour vérifier si le poids de la cueillette est suffisant</h2>";
        echo checkIFisEnough($date_cueillette, $id_cueilleur, $id_parcelle, $poids_cueilli);

        // Test de la fonction pour obtenir le poids total de cueillette dans une période donnée
        $date_debut_test = '2024-02-01';
        $date_fin_test = '2024-02-28';

        echo "<h2>Test de la fonction pour obtenir le poids total de cueillette dans une période donnée</h2>";
        echo "Poids total de cueillette dans la période: " . poidTotalCuilli($date_debut_test, $date_fin_test);

        // Test de la fonction pour obtenir le poids total de cueillette par cueilleur dans une période donnée
        echo "<h2>Test de la fonction pour obtenir le poids total de cueillette par cueilleur dans une période donnée</h2>";
        echo "Poids total de cueillette par cueilleur dans la période: " . poidTotalCuilliParcueilleur($date_debut_test, $date_fin_test, $id_cueilleur);

        // Test de la fonction pour obtenir le poids total de cueillette par parcelle dans une période donnée
        echo "<h2>Test de la fonction pour obtenir le poids total de cueillette par parcelle dans une période donnée</h2>";
        echo "Poids total de cueillette par parcelle dans la période: " . poidTotalCuielliParParcelle($date_debut_test, $date_fin_test, $id_parcelle_test);

        // Test de la fonction pour obtenir le poids restant sur une parcelle à une date donnée
        echo "<h2>Test de la fonction pour obtenir le poids restant sur une parcelle à une date donnée</h2>";
        echo "Poids restant sur la parcelle: " . PoidsRestantParcelle($date_debut_test, $date_fin_test, $id_parcelle_test);

        // Test de la fonction pour obtenir le coût total des dépenses dans une période donnée
        echo "<h2>Test de la fonction pour obtenir le coût total des dépenses dans une période donnée</h2>";
        echo "Coût total des dépenses dans la période: " . getTotalCout($date_debut_test, $date_fin_test);

        // Test de la fonction pour calculer le coût de revient par kg
        echo "<h2>Test de la fonction pour calculer le coût de revient par kg</h2>";
        echo "Coût de revient par kg: " . coutderevient($date_debut_test, $date_fin_test);
    ?>

</body>
</html>
