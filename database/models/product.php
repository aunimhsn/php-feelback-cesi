<?php

function getProducts($pdo) {
    $sql = 'select * from products';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $products;
}