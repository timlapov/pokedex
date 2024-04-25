<?php
require_once("utils/databaseManager.php");

$title = "Pokedex";
try {
    $pdo = connectDB();
    var_dump($pdo);
    configPdo($pdo);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

//$pokemons = $pdo->query("SELECT * FROM pokemon");
//var_dump($reponse->fetchAll());
$pokemons = findAllPokemons($pdo);

include_once ("block/header.php");
?>

    <div class="container">
        <h1 class="text-center"><?php echo (isset($title) ? $title : "Default Title"); ?></h1>
    </div>
    <div class="row row-cols-1 row-cols-md-4 m-2 g-4">
        <?php
        foreach ($pokemons as $pokemon) {
        ?>
        <div class="col">
            <div class="card h-100">
                <img src="<?=$pokemon['image']?>" class="card-img-top" alt="<?=$pokemon['nameFr']?>">
                <div class="card-body">
                    <h5 class="card-title"><?=$pokemon['nameFr']?></h5>
                    <p class="card-text"><?=$pokemon['category']?></p>
                    <a href="pokemonDetail.php?id=<?=$pokemon['id']?>" class="btn btn-sm btn-secondary">Read More</a>
                </div>
                <div class="card-footer">
                    <small class="text-body-secondary"><?=$pokemon['nameJp']?></small>
                </div>
            </div>
        </div>
            <?php
        }
            ?>
    </div>
<?php
include_once ("block/footer.php");
?>