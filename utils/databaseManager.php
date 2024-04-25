<?php

function connectDB(): PDO {
    $localhost = "localhost";
    $user = "root";
    $password = "root";
    $database = "pokedex";
    return new PDO("mysql:host=$localhost;dbname=$database", $user, $password);
}

function configPdo(PDO $pdo) {
    //recevoir des erreurs (coté SQL)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Choisir les indices dans les fetchs
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}

function findAllPokemons(PDO $pdo) {
    $reponse = $pdo->query("SELECT * FROM pokemon");
    return $reponse->fetchAll();
}

function findById($pdo, $id) {
    $result = $pdo->prepare("SELECT * FROM pokemon WHERE id = :id");
$result->execute([
        ":id" => $id
]);
    return $result->fetch();
}