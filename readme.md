# Desafio desenvolvedor Backend Web Jump
## Tecnologias utilizadas 
- PHP 7.4.29
- MySql 

## Metodologia de desenvolvimento
- Programação Orientado a Objeto

## Como rodar o projeto 
- Clone o projeto 
```sh
	git clone https://github.com/thiago1reis/assessment-backend-xp.git
```
- Entre no diretório do proejto 
```sh
	cd assessment-backend-xp
```
- Instale as dependências 
```sh
	composer install 
```
- Crie o banco de dados
```sh

	CREATE DATABASE assessment_backend_xp CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

    CREATE TABLE `assessment_backend_xp`.`products` 
    (	
        `id` INT NOT NULL AUTO_INCREMENT, 
        `name` VARCHAR(255) NOT NULL , 
        `sku` INT NOT NULL , 
        `price` DOUBLE NOT NULL , 
        `description` VARCHAR(255) NOT NULL , 
        `quantity` INT NOT NULL , 
        PRIMARY KEY (`id`), 
        UNIQUE (`sku`)
    ) ENGINE = InnoDB;

	CREATE TABLE `assessment_backend_xp`.`categories` 
    (	
        `id` INT NOT NULL AUTO_INCREMENT, 
        `name` VARCHAR(255) NOT NULL , 
        `code` INT NOT NULL ,
        PRIMARY KEY (`id`), 
        UNIQUE (`code`)
    ) ENGINE = InnoDB;

	CREATE TABLE `assessment_backend_xp`.`product_has_categories` 
    (	
        `id` INT NOT NULL AUTO_INCREMENT, 
        `product_id` INT NOT NULL , 
        `category_id` INT NOT NULL , 
        PRIMARY KEY (`id`), 
        FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE ON UPDATE CASCADE,
        FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB;


```





