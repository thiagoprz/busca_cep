# Busca CEP

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/lumen-framework/v/unstable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

Projeto com o fim de disponibilizar informações de CEP sobre logradouros e cidades em uma api simplificada.

## Demo
Em breve será disponibilizado um ambiente de demonstração hospedada no Heroku.

## Banco de Dados
O banco de dados atualmente é formado por 3 entidades, sendo elas: **estado**, **cidade** e **cep**.

## Endpoints da API

### Estado
Para pesquisa de CEP por estado está disponível o método **api/v1/estado/{cep}**, onde **{cep}** é o número de CEP a ser pesquisado. Podendo ser no formato *99.999-99*, *99999-99* ou *9999999*.

### Cidade
Para pesquisa de CEP por cidade está disponível o método **api/v1/cidade/{cep}**, onde **{cep}** é o número de CEP a ser pesquisado. Podendo ser no formato *99.999-99*, *99999-99* ou *9999999*.

### CEP (Logradouro)
Para pesquisa de CEP por logradouro está disponível o método **api/v1/cep/{cep}**, onde **{cep}** é o número de CEP a ser pesquisado. Podendo ser no formato *99.999-99*, *99999-99* ou *9999999*.

## Licença

Licenciado sobre a licença [MIT license](http://opensource.org/licenses/MIT)
