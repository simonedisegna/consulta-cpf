<?php

namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use Model\ConsultaModel;
use Api\ApiService;

class ConsultaModelTest extends TestCase
{
    public function testConsultarEntrega()
    {
        // Define o caminho absoluto para o arquivo API_LISTAGEM_ENTREGAS.json
        $filePath = __DIR__ . '/../../data/API_LISTAGEM_ENTREGAS.json';
    
        // Verifica se o arquivo existe
        if (!file_exists($filePath)) {
            // Se o arquivo não existir, lança uma exceção
            throw new \Exception("O arquivo $filePath não foi encontrado.");
        }
    
        // Carrega o conteúdo do arquivo JSON esperado
        $expectedJson = json_decode(file_get_contents($filePath), true);
    
        // Criar um objeto mock para ApiService
        $apiServiceMock = $this->getMockBuilder(ApiService::class)
                            ->onlyMethods(['consultarListaTransportadoras', 'consultarListaEntregas'])
                            ->getMock();
    
        // Define o comportamento esperado para o método consultarListaTransportadoras()
        $apiServiceMock->expects($this->once())
                    ->method('consultarListaTransportadoras')
                    ->with('09372525065') // Passa o CPF esperado para o método
                    ->willReturn('token');
    
        // Define o comportamento esperado para o método consultarListaEntregas()
        $apiServiceMock->expects($this->once())
                    ->method('consultarListaEntregas')
                    ->with('token') // Passa o token retornado pelo método anterior
                    ->willReturn(json_encode($expectedJson)); // Retorna o conteúdo do arquivo como JSON
    
        // Criar uma instância da classe ConsultaModel, passando o mock de ApiService como dependência
        $consultaModel = new ConsultaModel($apiServiceMock);
    
        // Chama o método a ser testado
        $result = $consultaModel->consultarEntrega('09372525065');
    
        // Verifica se o resultado está correto
        $this->assertEquals($expectedJson, $result, true);
    }
    


}


?>