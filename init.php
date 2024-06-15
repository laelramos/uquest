<?php
//init.php
define('PROJECT_ROOT_PATH', __DIR__);
$config = require PROJECT_ROOT_PATH . '/config.php';
define('BASE_URL', $config['basePath']);


// Cria a conexão com o banco de dados
$dbConfig = $config['database'];
$conn = new mysqli($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['database']);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Inicia a sessão
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
