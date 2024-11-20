<?php
include './database/config.php';
include './database/models/product.php';
$products = getProducts($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur Feelback</title>
</head>
<body>

    <?php include './layouts/header.php' ?>

    <a href="./dashboard.php">Consulter le tableau de bord</a> <br>
    <a href="./feedback-form.php">
        Créer une commande fictive et répondre au questionnaire
    </a>

    <?php
        echo($products[0]['title']);
    ?>

    <?php include './layouts/footer.php' ?>
</body>
</html>