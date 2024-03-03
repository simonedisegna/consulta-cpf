// script.js
function consultarCPF() {
    var cpf = $('#cpf').val();

    $.ajax({
        url: 'index.php?action=consultarCPF',
        type: 'POST',
        data: {cpf: cpf},
        dataType: 'json',
        success: function(data) {
            // Manipula os dados de entrega retornados            
           //$('#resultado').html(JSON.stringify(data));
           var resultadoHTML = '<ul>';

            // Remetente
            resultadoHTML += '<li><strong>Remetente:</strong> ' + data._remetente._nome + '</li>';

            // Destinatário
            resultadoHTML += '<li><strong>Destinatário:</strong> ' + data._destinatario._nome + '</li>';
            resultadoHTML += '<li><strong>CPF:</strong> ' + data._destinatario._cpf + '</li>';
            resultadoHTML += '<li><strong>Endereço:</strong> ' + data._destinatario._endereco + '</li>';
            resultadoHTML += '<li><strong>Estado:</strong> ' + data._destinatario._estado + '</li>';
            resultadoHTML += '<li><strong>CEP:</strong> ' + data._destinatario._cep + '</li>';
            resultadoHTML += '<li><strong>País:</strong> ' + data._destinatario._pais + '</li>';

            // Rastreamento
            resultadoHTML += '<li><strong>Rastreamento:</strong> <ul>';
            $.each(data._rastreamento, function(index, item) {
                $dataformata = formatarDataHora(item.date);
                resultadoHTML += '<li><b>' + item.message + '</b> - ' + $dataformata  + '</li>';
            });
            resultadoHTML += '</ul></li>';

            // Empresa
            resultadoHTML += '<li><strong>Empresa:</strong> ' + data.empresa._fantasia + '</li>';
            resultadoHTML += '<li><strong>CNPJ:</strong> ' + data.empresa._cnpj + '</li>';

            resultadoHTML += '</ul>';

            $('#resultado').html(resultadoHTML);
        },
        error: function() {
            $('#resultado').html('Erro ao consultar CPF.');
        }
    });
}

// Função para formatar a data e hora
function formatarDataHora(dataHora) {
    // Divide a string em duas partes: data e hora
    var partes = dataHora.split("T");
    var data = partes[0];
    var hora = partes[1].replace("Z", ""); // Remove o "Z" no final da hora

    // Divide a data em partes: ano, mês e dia
    var partesData = data.split("-");
    var dia = partesData[2];
    var mes = partesData[1];
    var ano = partesData[0];

    // Formata a data no formato d/m/a
    var dataFormatada = dia + "/" + mes + "/" + ano;

    // Retorna a data e hora formatadas
    return dataFormatada + " " + hora;
}


