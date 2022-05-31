create database VELVETDB 
--DROP DATABASE IF EXISTS VELVETDB; 
/* 
TIPOS DE DATOS A USAR EN LA BASE DE DATOS  
boolean = true or false 
character(n) = cadena de caracteres de tamaño fijo 
date = fecha sin hora 
float = numero de punto flotante 
int o integer = numero entero 
decimal = numeros decimales 
time = horas minutos y segundos 
varchar(n) = cadena de caracteres de tamaño variable 
*/ 
--SECCION BORRADO 
DROP TABLE IF EXISTS usuarios; 
DROP TABLE IF EXISTS inventario; 
DROP TABLE IF EXISTS detalleFactura; 
DROP TABLE IF EXISTS articulos; 
DROP TABLE IF EXISTS facturas; 
DROP TABLE IF EXISTS clientes; 
DROP TABLE IF EXISTS proveedores; 
DROP TABLE IF EXISTS categorias; 
DROP TABLE IF EXISTS personas ; 


create table proveedores( 
	idProveedor serial primary key not null, 
	nombre varchar(50), 
	telefono varchar(20), 
	direccion varchar(30) 
); 
--DROP TABLE IF EXISTS proveedores  
create table categorias( 
	idCategoria serial primary key not null, 
	nombre varchar(20) 
); 
--DROP TABLE IF EXISTS categorias  
create table articulos( 
	idArticulo serial primary key not null, 
	nombre varchar(20), 
	precioCompra decimal, 
	precioVenta decimal, 
	idCategoria int references categorias(idCategoria), 
	idProveedor int references proveedores (idProveedor)	 
	); 
--DROP TABLE IF EXISTS articulos  
create table personas( 
	idPersona serial primary key not null, 
	cedula int not null, 
	nombre varchar(20), 
	apellido varchar(20), 
	email varchar(30) default 'default@email.com', 
	direccion varchar(50)	 
); 
--DROP TABLE IF EXISTS personas  
create table usuarios( 
	idUsuario serial primary key not null,	 
	idPersona int references personas(idPersona)	 
); 
--DROP TABLE IF EXISTS usuarios  
create table clientes( 
	idCliente serial primary key not null, 
	idPersona int references personas(idPersona), 
	observaciones varchar(255) 
); 
--DROP TABLE IF EXISTS clientes 
create table facturas( 
	idFactura serial primary key not null, 
	total decimal, 
	fecha date, 
	idCliente int references clientes(idCliente) 
); 
--DROP TABLE IF EXISTS facturas  
create table inventario( 
	idInventario serial primary key not null, 
	cantidadArticulo int not null, 
	codigoArticulo int references articulos(idArticulo) 
	--idFactura int references facturas(idFactura) 
); 
--DROP TABLE IF EXISTS inventario  
create table detalleFactura( 
	idDetalleFactura serial primary key not null,	 
	cantidadArticulo int not null, 
	idFactura int references facturas(idFactura), 
	codigoArticulo int references articulos(idArticulo) 
); 
--DROP TABLE IF EXISTS detalleFactura