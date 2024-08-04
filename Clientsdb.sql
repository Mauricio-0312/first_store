CREATE DATABASE Clientsdb;
USE Clientsdb;


CREATE TABLE usuarios( 
    id      int auto_increment not null,
    nombre varchar(255) not null,
    email varchar(255) not null,
    telefono int(255) not null,
    permisos varchar(255) not null,
    username varchar(255) not null,
    contraseña varchar(255) not null,
    estatus varchar(255) not null,
    registeredBy varchar(255) not null,
    
    CONSTRAINT pk_usuario PRIMARY KEY(id)
);

Create table clientes( 
    id int auto_increment not null,
    usuario_id int(255) not null,
    nombre varchar(255) not null,
    email varchar(255) not null,
    telefono int(255) not null,
    direccion varchar(255) not null,

    CONSTRAINT pk_clientes PRIMARY KEY(id),
    CONSTRAINT fk_usuario_id FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
);

Create table equipos( 
    id int auto_increment not null,
    cliente_id int(255) not null,
    tipo varchar(255) not null,
    marca varchar(255) not null,
    modelo varchar(255) not null,
    nroSerie int(255) not null,
    falla text not null,
    fechaIngreso date not null,
    estatus varchar(255) not null,
    comentarios text, 
   
    CONSTRAINT pk_equipos PRIMARY KEY(id),
    CONSTRAINT fk_equipos FOREIGN KEY(cliente_id) REFERENCES clientes(id)

);

insert into equipos values(null, 37, "Laptop", "Samsung", "1412423", 812482, "Se me cayo", curdate(), "Nuevo Ingreso", null);