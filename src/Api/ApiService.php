<?php
namespace Api;

class ApiService {
    public function consultarListaTransportadoras($cpf) {
        // Carrega o conteúdo do JSON
        $jsonContent = file_get_contents('/var/www/html/consulta-cpf/data/API_LISTAGEM_ENTREGAS.json');        
        $data = json_decode($jsonContent, true);

        // Verifica se o JSON foi carregado corretamente
        if ($data === null) {
            throw new \Exception("Erro ao carregar o JSON de entregas.");
        }

        // Percorre os dados procurando pelo CPF
        foreach ($data['data'] as $entrega) {
            $destinatario = $entrega['_destinatario'];
            if (isset($destinatario['_cpf']) && $destinatario['_cpf'] === $cpf) {
                return $entrega;
            }
        }
        
        // Retorna null se o CPF não for encontrado
       return null;
    }

    public function consultarListaEntregas($entrega) {
        // Extrai o token dos dados da entrega
        $token = $entrega['_id_transportadora'];
       
        // Carrega o conteúdo do JSON de transportadoras
        $jsonTransportadoras = file_get_contents('/var/www/html/consulta-cpf/data/API_LISTAGEM_TRANSPORTADORAS.json');
        
        $dataTransportadoras = json_decode($jsonTransportadoras, true);

        // Verifica se o JSON de transportadoras foi carregado corretamente
        if ($dataTransportadoras === null) {
            throw new \Exception("Erro ao carregar o JSON de transportadoras.");
        }

        // Verifica se o token corresponde a uma transportadora
        $empresa = $this->buscarEmpresaPeloToken($token, $dataTransportadoras);
        if ($empresa === null) {
            throw new \Exception("Transportadora não encontrada para o token fornecido.");
        }

        // Combine os dados da empresa com os dados da entrega
        $entrega['empresa'] = $empresa;

        return $entrega;
    }

    private function buscarEmpresaPeloToken($token, $dataTransportadoras) {
       
        //print_r('Token:'.$token).' *** '; 
       foreach ($dataTransportadoras['data'] as $empresa) {
            // Remover espaços extras antes de comparar
    
            if ($empresa['_id'] === $token) {
               return $empresa;
            }
            
        }
       
        return null;
    }
}
