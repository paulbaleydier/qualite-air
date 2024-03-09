<?php
// Connexion à la base de données (à remplacer par vos propres informations)
$servername = "localhost";
$username = "root";
$password = "Passw0rd%1";
$port = 3306;
$dbname = "qda";

try {
    $conn = new PDO("mysql:host=$servername;port=' . $port . ';dbname=$dbname", $username, $password);
    // Configurer PDO pour lever les exceptions en cas d'erreur
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

// Fonction pour insérer des données dans la base de données
function insererDonneesCapteur($capteur, $valeur) {
    global $conn;

    // À adapter selon votre schéma de base de données
    $sql = "INSERT INTO `analysis` (`type`, `value`, `ts`) VALUES (:typeAnalyse, :valueAnalyse, NOW());";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':typeAnalyse', $capteur);
        $stmt->bindParam(':valueAnalyse', $valeur);
        $stmt->execute();
        echo "Données insérées avec succès pour le capteur $capteur\n";
    } catch (PDOException $e) {
        echo "Erreur d'insertion pour le capteur $capteur: " . $e->getMessage() . "\n";
    }
}

// Capteurs et leurs données correspondantes
$capteurs = array(
    1 => ((mt_rand() / mt_getrandmax()) * 40),
    2 => ((mt_rand() / mt_getrandmax()) * 10),
    3 => ((mt_rand() / mt_getrandmax()) * 50),
    4 => ((mt_rand() / mt_getrandmax()) * 1000),
    5 => ((mt_rand() / mt_getrandmax()) * 10000),
    6 => ((mt_rand() / mt_getrandmax()) * 50),
    7 => ((mt_rand() / mt_getrandmax()) * 25),
    8 => ((mt_rand() / mt_getrandmax()) * 50),
);

// Parcourir les capteurs et insérer les données dans la base de données
foreach ($capteurs as $capteur => $valeur) {
    insererDonneesCapteur($capteur, $valeur);
}

// Fermer la connexion à la base de données
$conn = null;
?>
