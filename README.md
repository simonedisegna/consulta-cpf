# :computer: Desafio - Pesquisa de entrega  :computer:

Arquitetura da Aplicação Web para Consulta de Dados de Entrega

## Projeto de Rastreamento de entrega

Este projeto é uma aplicação web desenvolvida em PHP 8 e jQuery, utilizando o padrão de arquitetura MVC (Model-View-Controller) e outros padrões de design relevantes. Ele permite consultar dados de entrega com base no CPF fornecido pelo usuário.

## Arquitetura MVC

O projeto segue o padrão de arquitetura MVC, dividindo a aplicação em três componentes principais:

- **Model (Modelo)**: Classes responsáveis pela manipulação dos dados, interação com o banco de dados e lógica de negócios.
- **View (Visualização)**: Classes responsáveis por gerar a interface do usuário com base nos dados fornecidos pelo controlador.
- **Controller (Controlador)**: Classes responsáveis por receber as solicitações do cliente, coordenar a interação entre o modelo e a visualização e gerar uma resposta adequada.
- **Service/API (Serviço/API)**: Classes responsáveis por encapsular a lógica de comunicação com APIs externas. Essas classes são responsáveis por fazer solicitações HTTP, processar respostas e fornecer uma interface amigável para o restante do sistema interagir com as APIs externas.

## Estrutura de Diretórios

- **data/**:  Contém os arquivos em JSON.
- **src/**:   Contém o código-fonte da aplicação, organizado por responsabilidades:
  - **Api/**: Classes responsáveis pela interação com APIs externas e manipulação de arquivos JSON.
  - **Controllers/**: Classes responsáveis por receber as solicitações do cliente e coordenar a interação entre os modelos, as visualizações e os serviços de API.
  - **Models/**: Classes responsáveis pela manipulação dos dados internos do sistema, interação lógica de negócios.
  - **View/**:   Classes responsáveis por gerar a interface do usuário com base nos dados fornecidos pelos controladores.
- **public/**:   Contém os arquivos acessíveis ao público, como folhas de estilo (CSS), imagens e scripts (JavaScript). Este diretório é o ponto de entrada para a aplicação.
- **vendor/**:   Contém as dependências do Composer, como bibliotecas de terceiros utilizadas no projeto.

## Instruções de Instalação e Execução

Para executar o projeto localmente, siga estas etapas:

1. Clone este repositório para o seu ambiente de desenvolvimento.
2. Instale as dependências do Composer executando `composer install`.
3. Configure o servidor web para apontar para o diretório `public/`.
4. Certifique-se de que o PHP 8 esteja instalado em seu sistema.
5. Acesse a aplicação em seu navegador.

## Tela: layout do projeto com a consulta realizada

![Disegna](https://github.com/simonedisegna/consulta-cpf/blob/main/public/img/projeto.png) 

## Observações finais:
O projeto não foi incluído no Docker devido a um problema na configuração final, visualização do sistema no navegador. Apesar de configurar as portas corretamente, o sistema não era identificado pelo navegador.
Quanto ao Angular, encontrei dificuldades durante a instalação. O sistema apresentava erros e não conseguia instalar o pacote principal para execução. Não consegui determinar se isso ocorreu devido a problemas de versão ou devido à falta de conhecimento necessário para configurá-lo corretamente.