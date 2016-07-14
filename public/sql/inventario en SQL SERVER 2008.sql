create database inventario

use inventario
go

create table usuarios(
id int primary key not null identity(1,1),
email varchar(50) not null,
password varchar(80) not null,
created_at timestamp,
update_at time,
remember_token varchar(100)
)

create table departamento(
id int primary key not null identity(1,1),
nombre varchar(50) not null
)

create table empleado(
id int primary key not null identity(1,1),
)
--altera la tabla empleado y genera la relacion de 1 a n quedandose con la llave foranea la tabla empleado
alter table empleado
add Departamento_id int foreign key references departamento(id)

--altera la tabla equipo y genera la relacion de 1 a n quedandose con la llave foranea la tabla equipo
alter table equipo
add Empleado_id int foreign key references empleado(id)

--altera la tabla accesorio y genera la relacion de 1 a n quedandose con la llave foranea la tabla accesorio
alter table accesorio
add equipo_id int foreign key references equipo(id)

--altera la tabla mantenimiento y genera la relacion de 1 a n quedandose con la llave foranea la tabla mantenimiento
alter table mantenimiento
add Equipo_id int foreign key references equipo(id)

--altera la tabla mantenimiento y genera la relacion de 1 a n quedandose con la llave foranea la tabla mantenimiento
alter table mantenimiento
add accesorio_id int foreign key references accesorio(id)

--altera la tabla mantenimiento y genera la relacion de 1 a n quedandose con la llave foranea la tabla mantenimiento
alter table mantenimiento
add impresora_id int foreign key references impresora(id)

--para la relacion de muchos a muchos primero se crea la tabla donde estaran las dos llaves foraneas
create table departamento_has_impresora(
primary key(departamento_id,impresora_id),
departamento_id int,
impresora_id int
)
--despues se agregan las llaves foraneas pertenecientes a su tabla
alter table departamento_has_impresora
add foreign key (departamento_id) references departamento(id)

alter table departamento_has_impresora
add foreign key (impresora_id) references impresora(id)


create table equipo(
id int primary key not null identity(1,1),
nombre varchar(100) not null,
marca varchar(45),
modelo varchar(45),
serie varchar(100),
precio varchar (45),
memoria varchar(45),
procesador varchar(45),
caracteristica TEXT,
estatus varchar(45),
tipo varchar(45),
fecha_instalacion date,
fecha_compra date,
sap_instalado int,
)

create table impresora(
id int primary key not null identity(1,1),
nombre varchar(100) not null,
marca varchar(45),
modelo varchar(45),
serie varchar(100),
precio varchar(45),
caracteristica text,
estatus varchar(45),
tipo varchar(45),
fecha_instalacion datetime,
fecha_compra datetime,
)

create table accesorio(
id int primary key not null identity(1,1),
nombre varchar(100) not null,
marca varchar(45),
modelo varchar(45),
serie varchar(100),
precio varchar(45),
caracteristica text,
estatus varchar(45),
fecha_asignacion date,
fecha_compra date,
)

create table mantenimiento(
id int primary key not null identity(1,1),
nombre varchar(100) not null,
estatus varchar(45),
fecha_mantenimiento date,
descripcion text,
tipo_mantenimiento int
)



