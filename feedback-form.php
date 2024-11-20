<?php
include './database/config.php';
include './database/models/order.php';
include './database/models/question.php';

addOrder($pdo, 'REF-ORDER-N');
$questions = getQuestions($pdo);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le questionnaire de satisfaction</title>
</head>
<body>
<?php include './layouts/header.php' ?>
<main>
    <form action="./store-answer.php" method="post">
        <?php
            foreach ($questions as $question) {
        ?>
            <div>
            <label for="<?=$question['slug']?>"><?=$question['title']?></label>
                <input type="radio" name="<?=$question['slug']?>" id="<?=$question['slug']?>" value="1"> 1
                <input type="radio" name="<?=$question['slug']?>" id="<?=$question['slug']?>" value="2"> 2
                <input type="radio" name="<?=$question['slug']?>" id="<?=$question['slug']?>" value="3"> 3
                <input type="radio" name="<?=$question['slug']?>" id="<?=$question['slug']?>" value="4"> 4
                <input type="radio" name="<?=$question['slug']?>" id="<?=$question['slug']?>" value="5"> 5
            </div>
        <?php
            }
        ?>
        <input type="hidden" name="order-id" value="<?=getLastOrder($pdo)['id']?>">
        <button type="submit">Envoyer</button>
    </form>
</main>
<?php include './layouts/footer.php' ?>
</body>
</html>