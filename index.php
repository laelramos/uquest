<?php
//index.php

require_once 'init.php';
require_once PROJECT_ROOT_PATH . '/includes/authcheck.php';

// Se o script authcheck.php definir um usuário na sessão, redirecione para a página da lista de produtos
if (isset($_SESSION['user_id'])) {
    echo 'entrei em product';
    header("Location: " . BASE_URL . "pages/disciplinas/disciplinas.php");
    exit;
} else {
    header("Location: pages/auth/login.php");
}
