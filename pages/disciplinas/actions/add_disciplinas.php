<?php
//add_disciplinas.php

require_once __DIR__ . '/../../../init.php';
require_once '../../../includes/authcheck.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obter dados do formulário
    $nome = $_POST['nomeDisciplina'] ?? '';
    $descricao = $_POST['descricaoDisciplina'] ?? '';

    // Tratar upload da imagem
    $caminhoImagens = '../../../assets/img/disciplinas/';
    $nomeArquivo = '';

    if (isset($_FILES['imagemDisciplina']) && $_FILES['imagemDisciplina']['error'] == 0) {
        $extensao = pathinfo($_FILES['imagemDisciplina']['name'], PATHINFO_EXTENSION);
        $nomeArquivoTemp = "dsc_" . uniqid() . "." . $extensao;
        $caminhoCompleto = $caminhoImagens . $nomeArquivoTemp;

        // Verificar se o arquivo é uma imagem
        if (getimagesize($_FILES['imagemDisciplina']['tmp_name'])) {
            // Verificar se o diretório de destino existe e tem permissão de escrita
            if (!is_dir($caminhoImagens) || !is_writable($caminhoImagens)) {
                echo "Diretório de destino não existe ou não tem permissão de escrita.";
                exit;
            }

            // Mover o arquivo para o diretório de destino
            if (!move_uploaded_file($_FILES['imagemDisciplina']['tmp_name'], $caminhoCompleto)) {
                echo "Erro ao fazer upload da imagem.";
                exit;
            } else {
                $nomeArquivo = $nomeArquivoTemp;
            }
        } else {
            echo "O arquivo não é uma imagem válida.";
            exit;
        }
    }


    // Iniciar transação
    $conn->begin_transaction();

    // Inserir dados na tabela produtos
    $sql = "INSERT INTO disciplinas (nome_disciplina, desc_disciplina, path_disciplina) VALUES (?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $nome, $descricao, $nomeArquivo);
        if (!$stmt->execute()) {
            echo "Erro ao inserir produto: " . $stmt->error;
            $conn->rollback();
            exit;
        }
        $produtoID = $stmt->insert_id;
        $stmt->close();
    } else {
        echo "Erro ao preparar inserção do produto: " . $conn->error;
        $conn->rollback();
        exit;
    }


    // Finalizar transação
    $conn->commit();
    $conn->close();

    header('Location: ../disciplinas.php');
} else {
    echo "Método inválido.";
}
