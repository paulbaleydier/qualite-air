<?php
// Connexion à la base de données (à remplacer par vos propres informations)
$servername = "localhost";
$username = "root";
$password = "Passw0rd%1";
$dbname = "AirQuality-test";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
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
    1 => rand(1, 100),
    2 => rand(1, 100),
    3 => rand(1, 100),
    4 => rand(1, 100),
    5 => rand(1, 100),
    6 => rand(1, 100),
    7 => rand(1, 100),
    8 => rand(1, 100),
);

// Parcourir les capteurs et insérer les données dans la base de données

for($i = 0; $i <= 205000; $i++) {
    foreach ($capteurs as $capteur => $valeur) {
        insererDonneesCapteur($capteur, $valeur);
    }
}




// Fermer la connexion à la base de données
$conn = null;
?>
