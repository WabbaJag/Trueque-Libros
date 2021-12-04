


create table usuario(
	id int not null,
    nombre varchar(20) not null,
    apellido varchar(20) not null,
    correo varchar(30) not null,
    telefono varchar(15) not null,
    direccion varchar(40) not null,
    primary key(id)
);

create table login(
	id int not null AUTO_INCREMENT,
    id_usuario int not null,
    username varchar(20) not null,
    password varchar(20) not null,
    PRIMARY key (id),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id)
);

create table autor(
    id int not null AUTO_INCREMENT,
    nombre varchar(20) not null,
    apellido1 varchar(20) not null,
    apellido2 varchar(20) not null,
    primary key(id)
);

create table genero(
    id int not null AUTO_INCREMENT,
    genero varchar(20) not null,
    primary key(id)
);

-- tabla para que un usuario pueda tener varias preferencias de autores de libros
create table usuario_autor(
	id int not null AUTO_INCREMENT,
    id_usuario int not null,
    id_autor int not null,
    PRIMARY KEY (id),
    FOREIGN KEY (id_usuario) references usuario(id),
    FOREIGN KEY (id_autor) references autor(id)
);

-- tabla para que un usuario pueda tener varias preferencias de generos de libros
create table usuario_genero(
	id int not null AUTO_INCREMENT,
    id_usuario int not null,
    id_genero int not null,
    PRIMARY KEY (id),
    FOREIGN KEY (id_usuario) references usuario(id),
    FOREIGN KEY (id_genero) references genero(id)
);

create table idioma(
	id int not null AUTO_INCREMENT,
    idioma varchar(20) not null,
    PRIMARY KEY(id)
);

create table libro(
	id int not null AUTO_INCREMENT,
    isbn varchar(13) not null,
    año YEAR NOT NULL,
    id_genero int not null,
    editorial varchar(20),
    id_idioma int not null,
    primary key(id),
    FOREIGN key (id_genero) references genero(id),
    FOREIGN KEY (id_idioma) references idioma(id)
);

-- tabla para que varios autores puedan relacionarse a un libro
create table autor_libro(
    id int not null AUTO_INCREMENT,
    id_libro int not null,
    id_autor int not null,
    PRIMARY KEY(id),
    FOREIGN KEY(id_libro) references libro(id),
    FOREIGN KEY(id_autor) references autor(id)
);

-- tabla para que les usuaries pongan a disposicion los libros que desean truequear
create table venta(
	id int not null AUTO_INCREMENT,
    id_usuario int not null,
    id_libro int not null,
    fecha_inicial DATE not null,
    fecha_final DATE not null,
    primary key(id),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id),
    FOREIGN KEY (id_libro) REFERENCES libro(id)
);

-- tabla para que les usuaries pongan ofertas a libros a la venta
create table oferta(
	id int not null AUTO_INCREMENT,
    id_trueque int not null,
    id_usuario int not null,
    fecha_oferta DATE not null,
    PRIMARY key (id)
);