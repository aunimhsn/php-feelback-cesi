<?php

function addAnswer($pdo, array $info): void
{
    $questions = getQuestions($pdo);

    foreach ($questions as $question) {
        $sql = 'insert into forms_has_questions (forms_id, questions_id, answer, users_id, orders_id)
        values (:formId, :questionId, :answer, :userId, :orderId)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'formId' => 1,
            'questionId' => $question['id'],
            'answer' => $info[$question['slug']],
            'userId' => 1,
            'orderId' => $info['order-id']
        ]);
    }
}

function getAnswersCount($pdo) : int {
    $sql = 'select count(distinct orders_id) from forms_has_questions where forms_id = 1';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchColumn();
}

function getAvgMarkDeliveryDelay($pdo) {
    $sql = 'select avg(answer) from forms_has_questions WHERE questions_id = 1 and forms_id = 1';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $avgMarkDeliveryDelay = $stmt->fetchColumn();

    return round($avgMarkDeliveryDelay, 2);
}

function getAvgMarkPackageState($pdo) {
    $sql = 'select avg(answer) from forms_has_questions WHERE questions_id = 2 and forms_id = 1';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $avgMarkPackageState = $stmt->fetchColumn();

    return round($avgMarkPackageState, 2);
}

function getAvgMarkDelivererBehavior($pdo) {
    $sql = 'select avg(answer) from forms_has_questions WHERE questions_id = 3 and forms_id = 1';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $avgMarkDelivererBehavior = $stmt->fetchColumn();

 
    return round($avgMarkDelivererBehavior, 2);
}