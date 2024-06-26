<?php
//get_disciplinas.php

require_once __DIR__ . '/../../../init.php';
require_once '../../../includes/authcheck.php';

$sql = "SELECT id_disciplina, 
               nome_disciplina, 
               path_disciplina 
        FROM disciplinas WHERE (IsDeleted IS NULL OR IsDeleted <> 'deleted')";
$result = $conn->query($sql);

$disciplinas = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $disciplinas[] = $row;
    }
}

$conn->close();

echo json_encode($disciplinas);
