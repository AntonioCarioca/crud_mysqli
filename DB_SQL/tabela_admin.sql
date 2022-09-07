CREATE TABLE admin(

	id int not null AUTO_INCREMENT,
    PRIMARY KEY(id),
    usuario varchar(255) not null UNIQUE,
    senha varchar(255) not null

);