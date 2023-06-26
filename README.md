# Crud-php
Projeto Integrador Extensionista - ADS 3 / Unimar

## Como usar
Instale o pacote PHP em sua máquina (se ainda não o tiver instalado).

- Clone este repositório ou para o seu computador,
rode o codigo pelo listagem.php , aconselho utilizar a extensão PHP Server no VSCODE.

- caso o Banco de dedos online não esteja ativo , utilize XAPP / my phpmyadmin  e crie um BD com o Comando SQL:

```
CREATE DATABASE minha_base;
```

Tabela :

```
CREATE TABLE `minha_base`.`aluno` (`id` INT NOT NULL AUTO_INCREMENT , 
`nome` VARCHAR(500) NOT NULL , `sobrenome` 
VARCHAR(500) NOT NULL , `email` VARCHAR(500) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
```

- altere a conexão para localhost no arquivo conexao.php
