CREATE DATABASE PRODEAMA;
use PRODEAMA;

CREATE TABLE CAT_TIPOS_USUARIOS(
	id_tipo_usuario int not null auto_increment primary key,
    tipo_usuario varchar(30),
    descripcion_tipo varchar (60),
    nivel_usuario int
);

CREATE TABLE CAT_USUARIOS(
	id_usuario int not null auto_increment primary key,
    usuario varchar(60),
    nombre varchar(100),
    contraseña varchar(60),
    nivel_usuario int,
    activo int,
    foreign key (nivel_usuario) references CAT_TIPOS_USUARIOS (id_tipo_usuario)
);


CREATE TABLE CATEGORIAS_REPRE(
id_categoria_repres int not null auto_increment primary key,
Nombre_categoria varchar (60)
);

CREATE TABLE CAT_REPRESENTANTES(
	id_representante int not null auto_increment primary key,
	Nombre_representante varchar(60),
	Telefono_repre varchar(14),
	id_adulto int,
    id_categoria_repres int,    
    foreign key (id_adulto) references CAT_ADULTOS (id_adulto),
    foreign key (id_categoria_repres) references CATEGORIAS_REPRE (id_categoria_repres)
);

CREATE TABLE CAT_ADULTOS(
	id_adulto int not null auto_increment,
    fecha_registro varchar(40),
    Telefono varchar(14),
    Nombre_Adulto varchar (60),
    Edad varchar(3),
    Sexo varchar(7),
    Direccion varchar (100),
    observaciones varchar(100),
    primary key (id_adulto)
);
CREATE TABLE CAT_TIPO_SERVICIO(
	id_tipo_servicio int not null auto_increment primary key,
    Nombre_servicio varchar(30),
    Descripcion_servicio varchar(60)
);
/*
CREATE TABLE FOLIOS(
	id_folio int not null auto_increment primary key,
	A_registro int not null,
    Folio_adulto int not null,
    id_adulto int,
    id_tipo_servicio int,
    fecha_comienzo varchar(40),
    fecha_termino varchar(40),
    foreign key (id_tipo_servicio) references CAT_TIPO_SERVICIO (id_tipo_servicio),
    foreign key (id_adulto) references CAT_ADULTOS (id_adulto)
);*/

DROP TABLE IF EXISTS `archivos`;
CREATE TABLE `archivos` (
  `id_archivo` int(11) NOT NULL AUTO_INCREMENT,
  `id_adulto` int(11) not null,
  `id_usuario` int(11) not null,
  `id_tipo_servicio` int(11) not null,
  `path` text,
  `nombre_archivo` varchar(45) DEFAULT NULL,
  `fecha` varchar (25),
  `activo` int(11) DEFAULT '1',
  PRIMARY KEY (`id_archivo`)
  foreign key (id_adulto) references CAT_ADULTOS (id_adulto),
  foreign key (id_usuario) references CAT_USUARIOS (id_usuario),
  foreign key (id_tipo_servicio) references CAT_TIPO_SERVICIO (id_tipo_servicio)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS TURNOS;
CREATE TABLE TURNOS(
id_turno int not null auto_increment primary key,
turno int,
id_adulto int,
fecha_turno varchar(40),
id_tipo_usuario int (11),
Estado int(11) DEFAULT '1',
foreign key (id_adulto) references CAT_ADULTOS (id_adulto)
);
insert into turnos (turno, id_adulto, fecha_turno, Area_atencion, Estado) values ('1', '2', '3/June/2019 09:43:06 PM', 'Algo', '0');

SELECT * FROM CAT_FAMILIARES WHERE id_adulto = 15;
-- ---------------------------------------------------------------------------------------------------------
-- Join para mostrar el tipo de usuario que tiene
Select id_usuario, usuario, nombre, tipo_usuario
From CAT_USUARIOS as cu JOIN CAT_TIPOS_USUARIOS as ctu
on ctu.id_tipo_usuario = cu.nivel_usuario;
-- ----------------------------------------------------------------------------------------------------------

-- ---------------------------------------------------------------------------------------------------------
-- JOIN PARA MOSTRAR DATOS GENERALES DE FOLIO
SELECT A_registro, Folio_adulto, id_adulto, Nombre_servicio, fecha_comienzo
from folios as df join cat_tipo_servicio as cts
on df.id_tipo_servicio =cts.id_tipo_servicio
where df.id_adulto = 2
order by df.id_adulto desc;
-- ---------------------------------------------------------------------------------------------------------
-- JOIN PARA MOSTRAR DATOS GENERALES DE FOLIO
SELECT df.id_folio, A_registro, Folio_adulto, Nombre_Adulto, Nombre_servicio, fecha_comienzo
from folios as df join cat_tipo_servicio as cts 
on df.id_tipo_servicio =cts.id_tipo_servicio
join cat_adultos as ca
on df.id_adulto = ca.id_adulto
where df.id_folio = 3;

-- ---------------------------------------------------------------------------------------------------------
-- Obtiene el ultimo dato insertado de la tabla Cat_adultos  ------------------------------------------------------
select id_adulto
  from Cat_adultos
 order by id_adulto desc
 limit 1;
-- ----------------------------------------------------------------------------------------------------------------
 
-- ----------------------------------------------------------------------------------------------------------------
-- obtiene a los familiares dependiendo del id del adulto
select id_adulto, id_representante, Nombre_representante, Telefono_repre, Nombre_categoria
from Cat_representantes AS cr JOIN categorias_repre as car
on cr.id_categoria_repres = car.id_categoria_repres
where id_adulto;
-- ----------------------------------------------------------------------------------------------------------------

-- ---------------------------------------------------------------------------------------------------------
-- Select para busqueda de adulto----------------------------------------------------
select * from Cat_adultos
where Nombre_Adulto like 'Is%';
-- ----------------------------------------------------------------------------------
select id_adulto, A_registro, Folio_adulto, Nombre_Adulto, Telefono from Cat_adultos
where Nombre_Adulto like '$data%';

select id_adulto,  Nombre_Adulto, Telefono, Direccion, Sexo, Edad from Cat_adultos
where Nombre_adulto like '%%' and Edad like '%%';

-- ----------------------------------------------------------------------------------
select Folio_adulto from folios
order by A_registro, Folio_adulto desc
limit 1;
-- ----------------------------------------------------------------------------------
select A_registro from folios
order by A_registro desc
limit 1;


select id_adulto, Nombre_Adulto, Edad
from cat_adultos
where Edad between 70 and 80;

INSERT INTO CATEGORIAS_REPRE (Nombre_categoria) VALUES('FAMILIAR');
INSERT INTO CATEGORIAS_REPRE (Nombre_categoria) VALUES('VECINO');
INSERT INTO CATEGORIAS_REPRE (Nombre_categoria) VALUES('AMIGO');
INSERT INTO CATEGORIAS_REPRE (Nombre_categoria) VALUES('NO ESPECIFICA');



INSERT INTO CAT_ADULTOS (fecha_registro, Telefono, Nombre_adulto, Edad, Sexo, observaciones) VALUES('3/July/2018 09:43:06 PM', '(662) 203-9487', 'Juancho Lopez', '70', 'Hombre', 'Holi 1');
INSERT INTO CAT_ADULTOS (fecha_registro, Telefono, Nombre_adulto, Edad, Sexo, observaciones) VALUES('3/July/2018 09:43:06 PM', '(662) 203-5587', 'Pedro Perez', '71', 'Hombre', 'Holi 2');
INSERT INTO CAT_ADULTOS (fecha_registro, Telefono, Nombre_adulto, Edad, Sexo, observaciones) VALUES('3/July/2018 09:43:06 PM', '(662) 203-9487', 'Fulanito de Tal', '75', 'Hombre', 'Holi 3');
INSERT INTO CAT_ADULTOS (fecha_registro, Telefono, Nombre_adulto, Edad, Sexo, observaciones) VALUES('3/July/2018 09:43:06 PM', '(662) 203-6487', 'Sutanito de X', '80', 'Hombre', 'Holi 4');
INSERT INTO CAT_ADULTOS (fecha_registro, Telefono, Nombre_adulto, Edad, Sexo, observaciones) VALUES('3/July/2018 09:43:06 PM', '(662) 203-9917', 'Alejandro Martinez', '60', 'Hombre', 'Holi 5');

INSERT INTO FOLIOS (A_registro, Folio_adulto, id_adulto, id_tipo_servicio, fecha_comienzo, fecha_termino, obs_folio) VALUES ('2018', '1', '1', '2', '3/July/2018 09:43:06 PM', '', '');
INSERT INTO FOLIOS (A_registro, Folio_adulto, id_adulto, id_tipo_servicio, fecha_comienzo, fecha_termino, obs_folio) VALUES ('2018', '2', '2', '3', '3/July/2018 09:43:06 PM', '', '');
INSERT INTO FOLIOS (A_registro, Folio_adulto, id_adulto, id_tipo_servicio, fecha_comienzo, fecha_termino, obs_folio) VALUES ('2018', '3', '3', '1', '3/July/2018 09:43:06 PM', '', '');
INSERT INTO FOLIOS (A_registro, Folio_adulto, id_adulto, id_tipo_servicio, fecha_comienzo, fecha_termino, obs_folio) VALUES ('2018', '4', '4', '1', '3/July/2018 09:43:06 PM', '', '');
INSERT INTO FOLIOS (A_registro, Folio_adulto, id_adulto, id_tipo_servicio, fecha_comienzo, fecha_termino, obs_folio) VALUES ('2018', '5', '5', '2', '3/July/2018 09:43:06 PM', '', '');

INSERT INTO CAT_TIPO_SERVICIO (Nombre_servicio, Descripcion_servicio) VALUES ('APOYO PSICOLOGICO', 'Ayuda con un profesional del area de psicologia');
INSERT INTO CAT_TIPO_SERVICIO (Nombre_servicio, Descripcion_servicio) VALUES ('APOYO EN ESPECIE', 'Apoyo de despensa o materiales');
INSERT INTO CAT_TIPO_SERVICIO (Nombre_servicio, Descripcion_servicio) VALUES ('DENUNCIA', 'Violacion de derechos');




select id_turno, turno
from turnos
where Estado = 1;


























