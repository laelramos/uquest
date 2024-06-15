<?php
// authcheck.php

require_once __DIR__ . '/../init.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// If there's a user already in session or a valid token, no action needed.
if (isset($_SESSION['user_id'])) {
    return; // User is logged in; continue with the page load.
}

if (isset($_COOKIE['user_token'])) {
    $token = $_COOKIE['user_token'];
    $sql = "SELECT u.UserID, u.Username, u.Role, ut.Expiration FROM user_tokens ut INNER JOIN users u ON ut.UserID = u.UserID WHERE ut.Token = ? AND ut.Expiration > NOW()";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            // Token válido encontrado, renove as informações do usuário na sessão
            $_SESSION['user_id'] = $row['UserID'];
            $_SESSION['username'] = $row['Username'];
            $_SESSION['role'] = $row['Role'];
            // Redirecionamento não é necessário aqui, já que queremos apenas renovar as informações na sessão
        } else {
            // Token inválido ou expirado, limpe o cookie do token e redirecione para login
            setcookie("user_token", "", time() - 3600, "/");
            header("Location: " . BASE_URL . "pages/auth/login.php");
            exit;
        }
    }
}
