create database sistema_ecommerce;

use sistema_ecommerce;

/*Creacion tabla producto*/
create table PRODUCTO(
	codpro int not null auto_increment,
    nompro varchar(50) null,
    despro varchar(100) null,
    prepro numeric(6, 2) null,
    estado int null,
    CONSTRAINT pk_producto
    primary key (codpro)
);
ALTER table PRODUCTO add rutimapro varchar(100) null;

INSERT INTO PRODUCTO (nompro, despro, prepro, estado, rutimapro) values ('Camisa Azul', 'Excelente calidad', '20.99', 1, 'CamisaHombre1.png'),
('Camisa Verde', 'Hecha en Italia', '23.99', 1, 'CamisaHombre2.png');

INSERT INTO PRODUCTO (nompro, despro, prepro, estado, rutimapro) values ('Camisa Roja', 'Excelente calidad', '20.99', 1, 'CamisaHombre3.png');

/*Creacion tabla usuario*/
create table USUARIO(
	codusu int not null auto_increment,
    nomusu varchar(50) null,
    apeusu varchar(50) null,
    emausu varchar(50) null,
    pasusu varchar(50) null,
    estado int null,
    CONSTRAINT pk_usuario
    primary key (codusu)
);


INSERT INTO USUARIO (nomusu, apeusu, emausu, pasusu, estado) values ('Juan', 'Perez', 'correo@example.com', '1', 1);

CREATE TABLE PEDIDO(
    codped int not null auto_increment,
    codusu int not null,
    codpro int not null,
    fecped datetime not null,
    estado int not null,
    dirusuped varchar(50) not null,
    telusuped varchar(50) not null,
    PRIMERY KEY (codped)
);