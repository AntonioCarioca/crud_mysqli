CREATE TABLE usuario(

	id int not null AUTO_INCREMENT,
    PRIMARY KEY(id),
    nome varchar(255) not null,
    sobrenome varchar(255) not null,
    email varchar(255) not null,
    telefone varchar(14) not null,
    cpf varchar(15) not null UNIQUE,
    sexo ENUM('homem','mulher')

);