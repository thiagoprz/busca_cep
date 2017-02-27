# Busca CEP
Projeto com o fim de disponibilizar informações de CEP sobre logradouros e cidades em uma api simplificada.
* Framework utilizado: **Lumen**

## Banco de Dados
O banco de dados atualmente é formado por 3 entidades, sendo elas: **estado**, **cidade** e **cep**.

## Endpoints da API

### Estado
Para pesquisa de CEP por estado está disponível o método **api/v1/estado/{cep}**, onde **{cep}** é o número de CEP a ser pesquisado. Podendo ser no formato *99.999-99*, *99999-99* ou *9999999*.

### Cidade
Para pesquisa de CEP por cidade está disponível o método **api/v1/cidade/{cep}**, onde **{cep}** é o número de CEP a ser pesquisado. Podendo ser no formato *99.999-99*, *99999-99* ou *9999999*.

### CEP (Logradouro)
Para pesquisa de CEP por logradouro está disponível o método **api/v1/cep/{cep}**, onde **{cep}** é o número de CEP a ser pesquisado. Podendo ser no formato *99.999-99*, *99999-99* ou *9999999*.

## Instalação
Para instalar basta configurar o ambiente criando o arquivo **.env** com base no arquivo *.env.example* e rodar **composer install** para instalar as dependências e **php artisan migrate** para que o banco de dados seja montado com as tabelas necessárias. 

## Requisitos
* PHP >= 5.6.4
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension

## Dados de demonstração
No seguinte [link](https://drive.google.com/open?id=0B-U3nRKvcWHjN0V6RDRpeWl4cTA) é possível baixar um arquivo **SQL** com os inserts de dados para testar o uso da API, nele estão contidos ceps de todos os estados e cidades que consegui obter.
[Dados de Exemplo.sql](https://drive.google.com/open?id=0B-U3nRKvcWHjN0V6RDRpeWl4cTA)

## Licença

Licenciado sobre a licença [MIT license](http://opensource.org/licenses/MIT)
