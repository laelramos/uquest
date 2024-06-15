<?php
//get_user_details.php

require_once __DIR__ . '/../../../init.php';
require_once '../../../includes/authcheck.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $userId = $data['userId'];

    $sql = "SELECT users.*, functions.nameFunction AS functionName FROM users JOIN functions ON users.Function = functions.idFunction WHERE users.UserID = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    echo json_encode($user);
}
