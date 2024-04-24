<?php

include_once ("block/header.php");
include_once ("block/navbar.php");

require_once ("utils/connectDB.php");

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

$result = $pdo->prepare("SELECT * FROM pokemon WHERE :id");
$result->execute([
        ":id" => $id
]);
    $pokemon = $result->fetch();
?>

<div class="card mb-3 m-5">
    <img src="<?=$pokemon['image']?>" class="card-img-top" alt="Pokemon">
    <div class="card-body">
        <h5 class="card-title">Заголовок карточки</h5>
        <p class="card-text">Это более широкая карточка с вспомогательным текстом ниже в качестве естественного перехода к дополнительному контенту. Этот контент немного длиннее.</p>
        <p class="card-text"><small class="text-body-secondary">Последнее обновление 3 мин. назад</small></p>
    </div>
</div>

<?php
include_once ("block/footer.php");
?>
