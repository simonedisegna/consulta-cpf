<?php
namespace Controller;

use Model\ConsultaModel;

class ConsultaController {
    public function index() {
        include '../src/View/consulta.php';
    }

    public function consultarCPF($cpf) {
        $model = new ConsultaModel();
        $result = $model->consultarEntrega($cpf);
        
        echo json_encode($result);
    }
}
?>