<?php

include('./database/config.php');
include('./database/models/question.php');
include('./database/models/form.php');

$info = [
    'delivery-delay' => $_POST['delivery-delay'],
    'package-state' => $_POST['package-state'],
    'deliverer-behavior' => $_POST['deliverer-behavior'],
    'order-id' => $_POST['order-id']
];

addAnswer($pdo, $info);

header('Location: dashboard.php');