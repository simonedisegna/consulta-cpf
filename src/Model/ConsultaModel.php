<?php
namespace Model;

use Api\ApiService;

class ConsultaModel {
    public function consultarEntrega($cpf) {
        // Verifica a API de lista de transportadoras e obtém o token
        $apiService = new ApiService();
        $entrada = $apiService->consultarListaTransportadoras($cpf);

        // Com o token, consulta a API de lista de entregas
        $result = $apiService->consultarListaEntregas($entrada);

        return $result;
    }
}
