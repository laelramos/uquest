<?php
//get_disciplinas.php

require_once __DIR__ . '/../../../init.php';
require_once '../../../includes/authcheck.php';

$id_disciplina = isset($_GET['id']) ? intval($_GET['id']) : 0;

$query = "SELECT id_disciplina, nome_disciplina FROM disciplinas WHERE id_disciplina = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id_disciplina);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $disciplina = $result->fetch_assoc();
    echo json_encode($disciplina);
} else {
    echo json_encode([]);
}

$stmt->close();
$conn->close();
