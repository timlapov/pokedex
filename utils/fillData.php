<?php
require_once("connectDB.php");

// URL de l'API Tyradex
$url = 'https://tyradex.tech/api/v1/pokemon';

// Récupérer les données depuis l'API
$data = file_get_contents($url);

// Convertir les données JSON en tableau associatif
$pokemonData = json_decode($data, true);

array_shift($pokemonData);

try {
$pdo = connectDB();
$stmt = $pdo->prepare("INSERT INTO Pokemon (generation, category, nameFr, nameJp, image, imageShiny, height, weight, catchRate)
VALUES (:generation, :category, :nameFr, :nameJp, :image, :imageShiny, :height, :weight, :catchRate)");

foreach ($pokemonData as $pokemon) {
$params = array(
':generation' => $pokemon['generation'],
':category' => $pokemon['category'],
':nameFr' => $pokemon['name']['fr'],
':nameJp' => $pokemon['name']['jp'],
':image' => $pokemon['sprites']['regular'],
':imageShiny' => $pokemon['sprites']['shiny'],
':height' => (float)$pokemon['height'],
':weight' => (float)$pokemon['weight'],
':catchRate' => $pokemon['catch_rate']
);

$stmt->execute($params);
}

echo "Données insérées avec succès dans la base de données.";
} catch (PDOException $e) {
echo "Erreur : " . $e->getMessage();
}