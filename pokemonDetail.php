<?php

include_once ("block/header.php");
include_once ("block/navbar.php");

require_once("utils/databaseManager.php");

$title = "Pokemon Detail";
try {
    $pdo = connectDB();
    configPdo($pdo);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    header("Location:index.php");
}

$pokemon = findById($pdo, $id);
?>

<div class="container">
    <div class="row">
<div class="card mb-3 m-5 col-5">
    <img src="<?=$pokemon['image']?>" class="card-img-top" alt="Pokemon">
    <div class="card-body">
        <h5 class="card-title"><?=$pokemon['nameFr']?></h5>
        <p class="card-text">Category : <?=$pokemon['category']?></p>
        <p class="card-text">Weight : <?=$pokemon['weight']?> | Height : <?=$pokemon['height']?></p>
        <p class="card-text"><small class="text-body-secondary"><?=$pokemon['nameJp']?></small></p>
    </div>
</div>
<div class="card mb-3 m-5 col-5">
    <img src="<?=$pokemon['imageShiny']?>" class="card-img-top" alt="Pokemon">
    <div class="card-body">
        <h5 class="card-title"><?=$pokemon['nameFr']?> – Shiny</h5>
        <p class="card-text">Category : <?=$pokemon['category']?></p>
        <p class="card-text">Weight : <?=$pokemon['weight']?> | Height : <?=$pokemon['height']?></p>
        <p class="card-text"><small class="text-body-secondary"><?=$pokemon['nameJp']?></small></p>
    </div>
</div>
</div>
</div>

<?php
include_once ("block/footer.php");
?>
