# teste-aro-eleven
Criaçao de uma agenda de contatos
### Objetivo: 

>Desenvolver um sistema CRUD simples em PHP e MySQL para a administração de uma agenda de contatos.

### Detalhes:

>As pessoas podem conter as seguintes informações:

1. Nome
2. Email
3. Endereço
4. Telefones

### Detalhes sobre o programa:

1.  Para configurar o acesso ao banco de dados, vá até system/models/Sql.php
2.  O diretório "system/view" é onde fica todas as telas do sistema, onde existem 3 páginas principais: index.php e create.php e edit.php. As página header e footer são os escopos do HTML.
3.  O diretório "system/controllers" é onde fica fica os controladores do sistema que interragem com os models
4.  O diretório "system/model" é onde fica os models e os arquivos de conexão com o banco de dados

### OBSERVAÇÃO IMPORTANTE:

> Caso for rodar esse projeto em seu computador pessoal (em um localhost), configure a variaval __DIR_PRINCIPAL__ no arquivo index.php na raiz do projeto. EX: se for rodar o projeto em localhost/teste-aro-eleven/ , você deve configurar a variavel para define('__DIR_PRINCIPAL__', "/teste-aro-eleven"), caso prefira deixar na raiz do servidor, apenas deixe assim define('__DIR_PRINCIPAL__', "");


O arquivo BancodeDados.sql é o script em sql que cria o banco e a tabela.