CREATE DATABASE tuto_poo;
USE tuto_poo;

CREATE TABLE clientes (
  id int(11) NOT NULL,
  nombres varchar(100) NOT NULL,
  apellidos varchar(100) NOT NULL,
  telefono varchar(15) NOT NULL,
  direccion varchar(255) NOT NULL,
  correo_electronico varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO clientes (id, nombres, apellidos, telefono, direccion, correo_electronico) VALUES
(1, 'John', 'Doe', '504 7070-7070', 'San Salvador', 'john@gmail.com'),
(2, 'Peter ', 'Parker', '504 5050-5050', 'San Jose', 'peter@gmail.com'),
(3, 'Fran ', 'Wilson', '504 8999-5550', 'Conacastes 3301 AV', 'fran@gmail.com');

select * from clientes
select * from clientes

ALTER TABLE clientes
  ADD PRIMARY KEY (id);

ALTER TABLE clientes
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

