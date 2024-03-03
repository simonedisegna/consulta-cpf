<?php

namespace Tests\Model;

use PHPUnit\Framework\TestCase;
use Model\ConsultaModel;
use Api\ApiService;

class ConsultaModelTest extends TestCase
{
    public function testConsultarEntrega()
    {
        // Criar um objeto mock para ApiService
        $apiServiceMock = $this->getMockBuilder(ApiService::class)
                               ->onlyMethods(['consultarListaTransportadoras', 'consultarListaEntregas'])
                               ->getMock();

        // Definir o comportamento esperado para o método consultarListaTransportadoras()
        $apiServiceMock->expects($this->once())
                       ->method('consultarListaTransportadoras')
                       ->with('12345678909') // Passar o CPF esperado para o método
                       ->willReturn('token');

        // Definir o comportamento esperado para o método consultarListaEntregas()
        $apiServiceMock->expects($this->once())
                       ->method('consultarListaEntregas')
                       ->with('token') // Passar o token retornado pelo método anterior
                       ->willReturn('resultado_da_consulta');

        // Criar uma instância da classe ConsultaModel, passando o mock de ApiService como dependência
        $consultaModel = new ConsultaModel($apiServiceMock);

        // Chamar o método a ser testado
        $result = $consultaModel->consultarEntrega('12345678909');

        // Verificar se o resultado está correto
        $this->assertEquals('resultado_da_consulta', $result);
    }
}


?>