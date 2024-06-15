<?php
//login_process.php

require_once __DIR__ . '/../../../init.php';

// Se o usuário já estiver logado, redirecione para a dashboard
if (isset($_SESSION['user_id'])) {
    header("Location: " . BASE_URL . "pages/disciplinas/disciplinas.php");
    exit;
}

// Verifica se os dados foram enviados via POST e se o formulário não está vazio
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $email_username = $conn->real_escape_string($_POST['email-username']);
    $password = $_POST['password'];
    $stayLoggedIn = isset($_POST['stayLoggedIn']);

    $sql = "SELECT * FROM users WHERE Username = ? OR Email = ? LIMIT 1";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $email_username, $email_username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($user = $result->fetch_assoc()) {
            if (password_verify($password, $user['Password'])) {
                $_SESSION['user_id'] = $user['UserID'];
                $_SESSION['username'] = $user['Username']; // Salva o nome de usuário na sessão
                $_SESSION['role'] = $user['Role']; // Salva o papel do usuário na sessão

                // Atualiza a última vez que o usuário fez login
                $lastLoginSql = "UPDATE users SET LastLogin = NOW() WHERE UserID = ?";
                $updateStmt = $conn->prepare($lastLoginSql);
                $updateStmt->bind_param("i", $user['UserID']);
                $updateStmt->execute();

                if ($stayLoggedIn) {
                    $token = bin2hex(random_bytes(64));
                    $expiration = date('Y-m-d H:i:s', strtotime('+60 days'));

                    $tokenSql = "INSERT INTO user_tokens (UserID, Token, Expiration) VALUES (?, ?, ?)";
                    $tokenStmt = $conn->prepare($tokenSql);
                    $tokenStmt->bind_param("iss", $user['UserID'], $token, $expiration);
                    $tokenStmt->execute();

                    setcookie("user_token", $token, time() + (60 * 60 * 24 * 60), "/", "", isset($_SERVER["HTTPS"]), true);
                }

                header("Location: " . BASE_URL . "pages/disciplinas/disciplinas.php");
                exit;
            } else {
                header("Location: " . BASE_URL . "pages/auth/login.php?error=incorrect");
                exit;
            }
        } else {
            header("Location: " . BASE_URL . "pages/auth/login.php?error=nouser");
            exit;
        }
    } else {
        header("Location: " . BASE_URL . "pages/auth/login.php?error=sqlerror");
        exit;
    }
} else {
    // Se o script for acessado sem um POST, simplesmente redirecione para a página de login
    header("Location: " . BASE_URL . "pages/auth/login.php");
    exit;
}
