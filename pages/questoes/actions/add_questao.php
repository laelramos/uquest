<?php
//add_questao.php

require_once __DIR__ . '/../../../init.php';
require_once '../../../includes/authcheck.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $editorContent = $_POST['editorContent'];


    $sql = "INSERT INTO questoes (enunciado) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $editorContent);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Dados inseridos com sucesso!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Erro: ' . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
}
