<?php
//register_process.php

require_once __DIR__ . '/../../../init.php';
require_once '../../../includes/authcheck.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['terms'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $terms = $_POST['terms'];

    // Validações básicas
    if (empty($username) || empty($email) || empty($password)) {
        // Trate o erro: todos os campos são obrigatórios
        exit('Por favor, preencha todos os campos obrigatórios.');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Trate o erro: formato de email inválido
        exit('Formato de e-mail inválido.');
    }


    // Verifique se o username ou o email já existem
    $sql = "SELECT * FROM users WHERE Username = ? OR Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // Trate o erro: usuário já existe
        exit('Username ou e-mail já registrado.');
    }

    // Hash da senha
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Inserir novo usuário no banco de dados
    $insertSql = "INSERT INTO users (Username, Password, Email, AccountStatus, Role) VALUES (?, ?, ?, 'Ativo', 'Usuário')";
    $insertStmt = $conn->prepare($insertSql);
    $insertStmt->bind_param("sss", $username, $passwordHash, $email);
    $result = $insertStmt->execute();

    if ($result) {
        // Redireciona para a página de login ou onde você preferir
        header("Location: ../login.php");
        exit;
    } else {
        // Trate o erro: não foi possível registrar o usuário
        exit('Ocorreu um erro ao criar sua conta. Por favor, tente novamente.');
    }
}
