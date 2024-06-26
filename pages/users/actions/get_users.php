<?php
//get_users.php

require_once __DIR__ . '/../../../init.php';
require_once '../../../includes/authcheck.php';

$sql = "SELECT users.UserID, users.Username, functions.nameFunction, users.Email, users.CreationDate, users.LastLogin, users.AccountStatus, users.Role
        FROM users 
        JOIN functions ON users.Function = functions.idFunction";

$result = $conn->query($sql);

$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

echo json_encode(['data' => $users]);
