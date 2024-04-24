<?php
require_once ("utils/connectDB.php");

$title = "Pokedex";
try {
    $pdo = connectDB();
    var_dump($pdo);
    configPdo($pdo);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

$reponse = $pdo->query("SELECT * FROM pokemon");
var_dump($reponse->fetchAll());



include_once ("block/header.php");
?>

    <div class="container">
        <h1 class="text-center"><?php echo (isset($title) ? $title : "Default Title"); ?></h1>
    </div>
<?php
include_once ("block/footer.php");
?>