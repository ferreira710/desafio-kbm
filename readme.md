# Sistema de cadastro de clientes feito em PHP, MySQL, BootStrap 4.6 e JQuery

## Banco de dados

Crie um banco de dados e execute as instruções SQLs abaixo para criar as tabelas:

 `cliente`:
```sql
CREATE TABLE `cliente` (
`id` int NOT NULL AUTO_INCREMENT,
`nome` varchar(45) NOT NULL,
`nascimento` varchar(45) NOT NULL,
`cpf` varchar(45) NOT NULL,
`rg` varchar(45) NOT NULL,
`telefone` varchar(45) NOT NULL,
`cep` varchar(45) NOT NULL,
`logradouro` varchar(45) NOT NULL,
`numero` varchar(45) NOT NULL,
`bairro` varchar(45) NOT NULL,
`cidade` varchar(45) NOT NULL,
`estado` varchar(45) NOT NULL,
`data` datetime DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 7 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci
```

============================================================================================

 `usuario`:
```sql
CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data` datetime DEFAULT CURRENT_TIMESTAMP ON
  UPDATE
    CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `user` (`user`)
) ENGINE = InnoDB AUTO_INCREMENT = 22 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci
```

============================================================================================

## Configuração

As credenciais do banco de dados estão no arquivo `./app/Db/Database.php` e você deve alterar para as configurações do seu ambiente (HOST, NAME, USER e PASS).

## Composer

Para a aplicação funcionar, é necessário rodar o Composer para que sejam criados os arquivos responsáveis pelo autoload das classes.

Caso não tenha o Composer instalado, baixe pelo site oficial: [https://getcomposer.org/download]

Para rodar o composer, basta acessar a pasta do projeto e executar o comando abaixo em seu terminal:

```
 composer install

```

Após essa execução uma pasta com o nome `vendor` será criada na raiz do projeto e você já poderá acessar pelo seu navegador.

## Rodando a aplicação

Para rodar a aplicação basta inserir o comando em seu terminal:

```
 php -S localhost:8080

```
