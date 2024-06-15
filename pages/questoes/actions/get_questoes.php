<?php
//get_disciplinas.php

require_once __DIR__ . '/../../../init.php';
require_once '../../../includes/authcheck.php';

// Obtém o ID da disciplina da URL
$id_disciplina = isset($_GET['id']) ? intval($_GET['id']) : 0;
//$id_disciplina = 1;

if ($id_disciplina > 0) {
    $query = "SELECT q.id_questao, q.id_disciplina, q.tipo_questao, q.enunciado_questao, q.img_questao, 
                     a.id_alternativa, a.texto_alternativa, a.correta
              FROM questoes AS q
              LEFT JOIN questoes_alternativas AS a ON q.id_questao = a.id_questao
              WHERE q.id_disciplina = ?";

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("i", $id_disciplina);
        $stmt->execute();
        $result = $stmt->get_result();

        $questoes = [];
        while ($row = $result->fetch_assoc()) {
            $id_questao = $row['id_questao'];

            if (!isset($questoes[$id_questao])) {
                $questoes[$id_questao] = [
                    'id_questao' => $row['id_questao'],
                    'id_disciplina' => $row['id_disciplina'],
                    'tipo_questao' => $row['tipo_questao'],
                    'enunciado_questao' => $row['enunciado_questao'],
                    'img_questao' => $row['img_questao'],
                    'alternativas' => []
                ];
            }

            $questoes[$id_questao]['alternativas'][] = [
                'id_alternativa' => $row['id_alternativa'],
                'id_questao' => $row['id_questao'],
                'texto_alternativa' => $row['texto_alternativa'],
                'correta' => $row['correta']
            ];
        }

        echo json_encode(array_values($questoes));
    } else {
        echo json_encode(['error' => 'Failed to prepare statement']);
    }
} else {
    echo json_encode([]);
}
