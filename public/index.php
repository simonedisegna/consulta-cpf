<?php
require_once '../vendor/autoload.php';

use Controller\ConsultaController;

$action = $_GET['action'] ?? '';

$controller = new ConsultaController();

switch ($action) {
    case 'consultarCPF':
        $cpf = $_POST['cpf'] ?? '';
        $controller->consultarCPF($cpf);
        break;
    default:
        $controller->index();
}
