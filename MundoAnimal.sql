-- -----------------------------------------------------
-- Crea la base de datos
-- -----------------------------------------------------
CREATE DATABASE MUNDOANIMAL;
USE MUNDOANIMAL;

DROP DATABASE MUNDOANIMAL;

-- -----------------------------------------------------
-- Table Categoria
-- -----------------------------------------------------
CREATE TABLE categoria (
  idcategoria INT AUTO_INCREMENT PRIMARY KEY,
  nombrec VARCHAR(45) NOT NULL);

-- -----------------------------------------------------
-- Table Proveedor
-- -----------------------------------------------------
CREATE TABLE  proveedor (
  idproveedor BIGINT PRIMARY KEY NOT NULL,
  nombre VARCHAR(45) NOT NULL,
  apellido VARCHAR(45) NOT NULL,
  telefono VARCHAR(45));

-- -----------------------------------------------------
-- Table Productos
-- -----------------------------------------------------
CREATE TABLE productos (
  idproductos INT AUTO_INCREMENT PRIMARY KEY,
  nombrep VARCHAR(45) NOT NULL,
  imagen VARCHAR(255) NOT NULL,
  descripcion VARCHAR(45) NOT NULL,
  stock int,
  precio FLOAT NOT NULL,
  iva FLOAT NOT NULL,
  categoria_id INT NOT NULL,
  proveedor_id BIGINT NOT NULL);

-- -----------------------------------------------------
-- Table KardexProducto
-- -----------------------------------------------------
CREATE TABLE kardexproducto (
  idkardexproducto INT AUTO_INCREMENT PRIMARY KEY,
  fechaK DATETIME NOT NULL,
  cantidadEntradak INT NOT NULL,
  costoEntradak FLOAT NOT NULL,
  cantidadSalidak INT NOT NULL,
  costoSalidak FLOAT NOT NULL,
  productos_id INT NOT NULL);

-- -----------------------------------------------------
-- Table Roles
-- -----------------------------------------------------
CREATE TABLE roles (
  id_rol INT AUTO_INCREMENT PRIMARY KEY,
  descripcion VARCHAR(45) NOT NULL);

-- -----------------------------------------------------
-- Table Usuario
-- -----------------------------------------------------
CREATE TABLE usuarios (
  documento INT PRIMARY KEY NOT NULL,
  nombre VARCHAR(45) NOT NULL,
  apellido VARCHAR(45) NOT NULL,
  telefono VARCHAR(45) NOT NULL,
  direccion VARCHAR(45) NOT NULL,
  username VARCHAR(45) NOT NULL,
  password VARCHAR(45) NOT NULL,
  rol_id INT NOT NULL,
  tokenUser VARCHAR(100));
  
-- -----------------------------------------------------
-- Table Orden
-- -----------------------------------------------------
  
CREATE TABLE orden (
  id_orden INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  documento_id INT NOT NULL,
  total_price FLOAT NOT NULL,
  created DATETIME NOT NULL);

-- -----------------------------------------------------
-- Table Orden_articulos
-- -----------------------------------------------------

CREATE TABLE orden_articulos (
  order_id INT NOT NULL,
  productos_id INT NOT NULL,
  quantity INT NOT NULL,
  subtotal FLOAT NOT NULL);
  
-- -----------------------------------------------------
-- FOREIGN KEYs
-- -----------------------------------------------------
  
ALTER TABLE productos ADD FOREIGN KEY (proveedor_id) REFERENCES proveedor(idproveedor);
ALTER TABLE productos ADD FOREIGN KEY (categoria_id) REFERENCES categoria(idcategoria);
ALTER TABLE kardexproducto ADD FOREIGN KEY (productos_id) REFERENCES productos(idproductos);
ALTER TABLE usuarios ADD FOREIGN KEY (rol_id) REFERENCES roles(id_rol);
ALTER TABLE orden ADD FOREIGN KEY (documento_id) REFERENCES usuarios(documento);
ALTER TABLE orden_articulos ADD FOREIGN KEY (productos_id) REFERENCES productos(idproductos);
ALTER TABLE orden_articulos ADD FOREIGN KEY (order_id) REFERENCES orden(id_orden);
  
-- -----------------------------------------------------
-- INSERT DE PRUEBAS
-- ----------------------------------------------------- 
  
INSERT INTO categoria(nombrec) VALUES ('Accesorios');
INSERT INTO categoria(nombrec) VALUES ('Alimentos');
INSERT INTO categoria(nombrec) VALUES ('Medicamentos');

INSERT INTO proveedor(idproveedor,nombre,apellido,telefono) VALUES (1152468987,'Daniel','Salazar',2996067);
INSERT INTO proveedor(idproveedor,nombre,apellido,telefono) VALUES (1000088550,'Yamile','Cornas',2996067);

INSERT INTO productos(nombrep,imagen,descripcion,stock,precio,iva,categoria_id,proveedor_id) VALUES ('Accesorios','collar.jpg','Prueba1',10,18000,1500,1,1152468987);
INSERT INTO productos(nombrep,imagen,descripcion,stock,precio,iva,categoria_id,proveedor_id) values ('Prueba Accesorios','collar.jpg','Prueba2',10,15000,1500,1,1000088550);
INSERT INTO productos(nombrep,imagen,descripcion,stock,precio,iva,categoria_id,proveedor_id) values ('Alimentos','galleta.png','Prueba3',10,11400,1500,2,1152468987);
INSERT INTO productos(nombrep,imagen,descripcion,stock,precio,iva,categoria_id,proveedor_id) values ('Prueba Alimentos','galleta.png','Prueba4',10,15000,1500,2,1000088550);
INSERT INTO productos(nombrep,imagen,descripcion,stock,precio,iva,categoria_id,proveedor_id) values ('Medicamentos','DRONTAL.png','Prueba5',10,15000,1500,3,1000088550);
INSERT INTO productos(nombrep,imagen,descripcion,stock,precio,iva,categoria_id,proveedor_id) values ('Prueba Medicamentos','DRONTAL.png','Prueba',10,15000,1500,3,1000088550);


INSERT INTO roles(descripcion) VALUES ('Administrador');
INSERT INTO roles(descripcion) VALUES ('Cliente');
INSERT INTO roles(descripcion) VALUES ('Empleado');

INSERT INTO usuarios(documento,nombre,apellido,telefono,direccion,username,password,rol_id) VALUES (1000088550,'Yeison Andres','Marin', '3178571103', 'Cl 87 # 31-60', 'Yeison@MundoAnimal.com','1000088550',1);
INSERT INTO usuarios(documento,nombre,apellido,telefono,direccion,username,password,rol_id) VALUES (1015066245,'Juliana','Marin', '3167399292', 'CR 43 # 80-05', 'Juliana@MundoAnimal.com','1015066245',1);
INSERT INTO usuarios(documento,nombre,apellido,telefono,direccion,username,password,rol_id) VALUES (32481891,'Maria Lucia','Zapata', '3167974548', 'Cl 87 # 31-58', 'Lucia@gmail.com','32481891',2);
INSERT INTO usuarios(documento,nombre,apellido,telefono,direccion,username,password,rol_id) VALUES (43635764,'Cecilia Janet','Piedrahita', '3147200163', 'Cl 87 # 31-58', 'Cecilia@gmail.com','43635764',3);
INSERT INTO usuarios(documento,nombre,apellido,telefono,direccion,username,password,rol_id) VALUES (1000085835,'Kevin Mateo','Marin', '3182921347', 'Cl 87 # 31-58', 'Mateo@gmail.com','1000085835',3);
INSERT INTO usuarios(documento,nombre,apellido,telefono,direccion,username,password,rol_id) VALUES (71740075,'Efren Albeiro',	'Marin','3128353889','CL N87 - CR 83-54','Efren@gmail.com','71740075',2);
INSERT INTO usuarios(documento,nombre,apellido,telefono,direccion,username,password,rol_id) VALUES (1152468384,'Sebastian',	'Piedrahita','3042342494','CL N87 - CR 83-54','Sebastian@gmail.com','1152468384',2);

INSERT INTO kardexproducto(fechaK,cantidadEntradak,costoEntradak,cantidadSalidak,costoSalidak,productos_id) VALUES ('2022-06-07 11:29:51',15,100000,5,50000,1);
INSERT INTO kardexproducto(fechaK,cantidadEntradak,costoEntradak,cantidadSalidak,costoSalidak,productos_id) VALUES ('2022-06-07 11:29:51',15,100000,5,50000,2);
INSERT INTO kardexproducto(fechaK,cantidadEntradak,costoEntradak,cantidadSalidak,costoSalidak,productos_id) VALUES ('2022-06-07 11:29:51',15,100000,5,50000,3);
INSERT INTO kardexproducto(fechaK,cantidadEntradak,costoEntradak,cantidadSalidak,costoSalidak,productos_id) VALUES ('2022-06-07 11:29:51',15,100000,5,50000,4);

-- ---------------------------------------------------------- --
-- --------------------- PROCEDIMIENTOS --------------------- --
-- ---------------------------------------------------------- --
  
  /*Procedimiento Insertar Categoria */
DROP PROCEDURE sp_InsertarCategoria;
DELIMITER ##
CREATE PROCEDURE sp_InsertarCategoria
(g_nombrec varchar (45))
BEGIN
 INSERT INTO Categoria
 (nombrec) VALUES(g_nombrec);
END ##
DELIMITER ;
call sp_InsertarCategoria('Prueba');

/*Procedimiento Mostrar Categoria */
DROP PROCEDURE sp_MostrarCategoria;
DELIMITER ##
CREATE PROCEDURE sp_MostrarCategoria()
BEGIN
 SELECT * FROM Categoria;
END ##
DELIMITER ;
call sp_MostrarCategoria;

/* Procedimiento Actualizar Categoria */
DROP PROCEDURE sp_ActualizarCategoria;
DELIMITER ##
CREATE PROCEDURE sp_ActualizarCategoria
(up_idCategoria int,
up_nombrec varchar (45))
BEGIN
UPDATE Categoria SET nombrec = up_nombrec WHERE idCategoria = up_idCategoria;
END ##
DELIMITER ;
call sp_ActualizarCategoria(4,'Prueba Actualizada');

/* Procedimiento Eliminar Categoria */
DROP PROCEDURE sp_EliminarCategoria;
DELIMITER ##
CREATE PROCEDURE sp_EliminarCategoria
(del_idCategoria int)
BEGIN
 delete from Categoria where idCategoria = del_idCategoria;
END ##
DELIMITER ;
call sp_EliminarCategoria (4);

-- ---------------------------------------------------------- --

 /*Procedimiento Insertar Proveedor */
DROP PROCEDURE sp_InsertarProveedor;
DELIMITER ##
CREATE PROCEDURE sp_InsertarProveedor
(g_idproveedor bigint,
g_nombre varchar (45),
g_apellido varchar (45),
g_telefono varchar(45))
BEGIN
 INSERT INTO Proveedor
(idproveedor,nombre,apellido,telefono) VALUES(g_idproveedor,g_nombre,g_apellido,g_telefono);
END ##
DELIMITER ;
call sp_InsertarProveedor(32481891,'Juan Camilo','Rodiguez','2338369');

/*Procedimiento Mostrar Proveedor */
DROP PROCEDURE sp_MostrarProveedor;
DELIMITER ##
CREATE PROCEDURE sp_MostrarProveedor()
BEGIN
 SELECT * FROM Proveedor;
END ##
DELIMITER ;
call sp_MostrarProveedor;

/* Procedimiento Actualizar Proveedor */
DROP PROCEDURE sp_ActualizarProveedor;
DELIMITER ##
CREATE PROCEDURE sp_ActualizarProveedor
(up_idProveedor bigint,
up_nombre varchar (45),
up_apellido varchar (45),
up_telefono varchar (45))
BEGIN
UPDATE Proveedor SET idProveedor = up_idProveedor,nombre = up_nombre,apellido = up_apellido,telefono = up_telefono WHERE idProveedor = up_idProveedor;
END ##
DELIMITER ;
call sp_ActualizarProveedor(1000088550,'Yeison','Rodriguez','3178571103');

/* Procedimiento Eliminar Proveedor */
DROP PROCEDURE sp_EliminarProveedor;
DELIMITER ##
CREATE PROCEDURE sp_EliminarProveedor
(del_idProveedor int)
BEGIN
 delete from Proveedor where idProveedor = del_idProveedor;
END ##
DELIMITER ;
call sp_EliminarProveedor (32481891);

-- ---------------------------------------------------------- --

/*Procedimiento Insertar Roles */
DROP PROCEDURE sp_InsertarRoles;
DELIMITER ##
CREATE PROCEDURE sp_InsertarRoles
(g_descripcion varchar (45))
BEGIN
 INSERT INTO Roles
 (descripcion) VALUES(g_descripcion);
END ##
DELIMITER ;
call sp_InsertarRoles('Superadmin');

/*Procedimiento Mostrar Roles */
DROP PROCEDURE sp_MostrarRoles;
DELIMITER ##
CREATE PROCEDURE sp_MostrarRoles()
BEGIN
 SELECT * FROM Roles;
END ##
DELIMITER ;
call sp_MostrarRoles;

/* Procedimiento Actualizar Roles */
DROP PROCEDURE sp_ActualizarRoles;
DELIMITER ##
CREATE PROCEDURE sp_ActualizarRoles
(up_id_Rol int,
up_descripcion varchar (45))
BEGIN
UPDATE Roles SET descripcion = up_descripcion WHERE id_Rol = up_id_Rol;
END ##
DELIMITER ;
call sp_ActualizarRoles(4,'Gerente');

/* Procedimiento Eliminar Roles */
DROP PROCEDURE sp_EliminarRoles;
DELIMITER ##
CREATE PROCEDURE sp_EliminarRoles
(del_id_rol int)
BEGIN
 delete from Roles where id_rol = del_id_rol;
END ##
DELIMITER ;
call sp_EliminarRoles (4);

-- ---------------------------------------------------------- --

/*Procedimiento Insertar Usuario */
DROP PROCEDURE sp_InsertarUsuario;
DELIMITER ##
CREATE PROCEDURE sp_InsertarUsuario
(g_documento int,
g_nombre varchar (45),
g_apellido varchar(45),
g_telefono varchar(45),
g_direccion varchar(45),
g_username varchar(45),
g_password varchar(45),
g_rol_id int)
BEGIN
 INSERT INTO Usuarios(documento,nombre,apellido,telefono,direccion,username,password,rol_id)
 VALUES(g_documento,g_nombre,g_apellido,g_telefono,g_direccion,g_username,g_password,g_rol_id);
END ##
DELIMITER ;
call sp_InsertarUsuario(10001, 'Julian', 'Valencia', '3159871536','CL 76 CR 76A SUR','Julian@MundoAnimal','115248644',1);

/*Procedimiento Mostrar Usuario */
DROP PROCEDURE sp_MostrarUsuario;
DELIMITER ##
CREATE PROCEDURE sp_MostrarUsuario()
BEGIN
 SELECT * FROM Usuarios;
END ##
DELIMITER ;
call sp_MostrarUsuario;

/* Procedimiento Actualizar Usuario */
DROP PROCEDURE sp_ActualizarUsuario;
DELIMITER ##
CREATE PROCEDURE sp_ActualizarUsuario
(up_documento int,
up_nombre varchar (45),
up_apellido varchar (45),
up_telefono varchar (45),
up_direccion varchar (45),
up_username varchar (45),
up_password varchar (45),
up_rol_id int)
BEGIN
UPDATE Usuarios
SET documento=up_documento,nombre=up_nombre,apellido=up_apellido,telefono=up_telefono,direccion=up_direccion,username=up_username,password=up_password,rol_id = up_rol_id
WHERE documento=up_documento;
END ##
DELIMITER ;
call sp_ActualizarUsuario(10001,'Miguel','Zapata','2338369','CL 80 CR 43-05','Miguel@Admin.com','10001',2);

/* Procedimiento Eliminar Usuario */
DROP PROCEDURE sp_EliminarUsuario;
DELIMITER ##
CREATE PROCEDURE sp_EliminarUsuario
(del_documento int)
BEGIN
 delete from Usuarios where documento = del_documento;
END ##
DELIMITER ;
call sp_EliminarUsuario(10001);

-- ---------------------------------------------------------- --

/*Procedimiento Insertar Producto */
DROP PROCEDURE sp_InsertarProducto;
DELIMITER ##
CREATE PROCEDURE sp_InsertarProducto
(g_nombrep VARCHAR(45),
g_imagen VARCHAR(255),
g_descripcion VARCHAR (45),
g_precio FLOAT,
g_iva FLOAT,
g_categoria_id INT,
g_proveedor_id BIGINT)
BEGIN
 INSERT INTO Productos(nombrep,descripcion,precio,iva,categoria_id,proveedor_id)
 VALUES(g_nombrep,g_descripcion,g_precio,g_iva,g_categoria_id,g_proveedor_id);
END ##
DELIMITER ;
call sp_InsertarProducto('Rondel','DRONTAL.png','Antiparasitante interno',11400,2166,2,1000088550);

/*Procedimiento Mostrar Producto */
DROP PROCEDURE sp_MostrarProducto;
DELIMITER ##
CREATE PROCEDURE sp_MostrarProducto()
BEGIN
 SELECT * FROM Productos;
END ##
DELIMITER ;
call sp_MostrarProducto;

/* Procedimiento Actualizar Producto */
DROP PROCEDURE sp_ActualizarProducto;
DELIMITER ##
CREATE PROCEDURE sp_ActualizarProducto
(up_idproductos int,
up_nombrep varchar (45),
up_imagen varchar (255),
up_descripcion varchar (45),
up_precio float,
up_iva float,
up_categoria_id int,
up_proveedor_id bigint)
BEGIN
UPDATE Productos
SET idproductos=up_idproductos,nombrep=up_nombrep,imagen=up_imagen,descripcion=up_descripcion,precio=up_precio,iva=up_iva,categoria_id=up_categoria_id,proveedor_id=up_proveedor_id
WHERE idProductos = up_idProductos;
END ##
DELIMITER ;
call sp_ActualizarProducto(6,'Prueba Actualizar','DRONTAL.png','Prueba actualizar',11400,2166,3,1000088550);

/* Procedimiento Eliminar Producto */
DROP PROCEDURE sp_EliminarProducto;
DELIMITER ##
CREATE PROCEDURE sp_EliminarProducto
(del_idProductos int)
BEGIN
 delete from Productos where idProductos = del_idProductos;
END ##
DELIMITER ;
call sp_EliminarProducto(5);

-- ---------------------------------------------------------- --
-- --------------------- VIEWS --------------------- --
-- ---------------------------------------------------------- --
select * from usuarios;

DROP VIEW view_DETALLE_DE_COMPRA;

CREATE VIEW view_DETALLE_DE_COMPRA
AS
SELECT ID_ORDEN,DOCUMENTO,NOMBRE,APELLIDO,TELEFONO,DIRECCION,NOMBREP AS NOMBRE_PRODUCTO,PRECIO,QUANTITY AS CANTIDAD,SUBTOTAL,TOTAL_PRICE AS PRECIO_TOTAL,CREATED AS FECHA_COMPRA
FROM ORDEN_ARTICULOS
INNER JOIN PRODUCTOS ON ORDEN_ARTICULOS.PRODUCTOS_ID=PRODUCTOS.IDPRODUCTOS
INNER JOIN ORDEN ON ORDEN_ARTICULOS.ORDER_ID=ORDEN.ID_ORDEN
INNER JOIN USUARIOS ON ORDEN.DOCUMENTO_ID=USUARIOS.DOCUMENTO;

SELECT * FROM view_DETALLE_DE_COMPRA;


DROP VIEW view_ROL_DE_USUARIO;
CREATE VIEW view_ROL_DE_USUARIO
AS
SELECT documento,nombre,apellido,telefono,direccion,username,password,descripcion
FROM usuarios
INNER JOIN roles ON usuarios.rol_id=roles.id_rol;

SELECT * FROM view_ROL_DE_USUARIO;

SELECT * FROM view_ROL_DE_USUARIO WHERE descripcion="empleado";