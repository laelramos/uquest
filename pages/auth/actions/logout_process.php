<?php
//logout_process.php

require_once __DIR__ . '/../../../init.php';


// Remover o token do usuário do banco de dados, se existir
if (isset($_COOKIE['user_token'])) {
    $token = $_COOKIE['user_token'];

    // Prepare a consulta para remover o token
    $sql = "DELETE FROM user_tokens WHERE Token = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $stmt->close();
    }

    // Remover o cookie do token
    setcookie("user_token", "", time() - 3600, "/", "", true, true);
}

// Limpa a sessão
$_SESSION = array();

// Destruir a sessão.
session_destroy();

// Remover o cookie de sessão
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Redirecionar para a página de login
header("Location: " . BASE_URL . "pages/auth/login.php");

exit;
