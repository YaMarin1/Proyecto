CREATE DATABASE MUNDOANIMAL;
USE MUNDOANIMAL;

DROP DATABASE MUNDOANIMAL;

INSERT INTO roles(descripcion) VALUES ("Administrador");
INSERT INTO roles(descripcion) VALUES ("Cliente");
INSERT INTO roles(descripcion) VALUES ("Empleado");
  
INSERT INTO usuarios(documento,nombre,apellido,telefono,direccion,username,password,rol_id) VALUES ('1000088550','Yeison','Marin', '3178571103', 'Cl 87 # 31-60', 'Yeison@MundoAnimal.com','1000088550',1);
INSERT INTO usuarios(documento,nombre,apellido,telefono,direccion,username,password,rol_id) VALUES ('1015066245','Juliana','Marin', '3167399292', 'CR 43 # 80-05', 'Juliana@MundoAnimal.com','1015066245',1);
INSERT INTO usuarios(documento,nombre,apellido,telefono,direccion,username,password,rol_id) VALUES ('32481891','Lucia','Zapata', '3167974548', 'Cl 87 # 31-58', 'Lucia@gmail.com','32481891',2);
INSERT INTO usuarios(documento,nombre,apellido,telefono,direccion,username,password,rol_id) VALUES ('43635764','Cecilia','Piedrahita', '3147200163', 'Cl 87 # 31-58', 'Cecilia@gmail.com','43635764',3);
INSERT INTO usuarios(documento,nombre,apellido,telefono,direccion,username,password,rol_id) VALUES ('1000085835','Mateo','Marin', '3182921347', 'Cl 87 # 31-58', 'Mateo@gmail.com','1000085835',3);
INSERT INTO usuarios(documento,nombre,apellido,telefono,direccion,username,password,rol_id) VALUES ('71740075','Efren',	'Marin','3128353889','CL N87 - CR 83-54','Efren@gmail.com','71740075',2);

select * from usuarios;
select * from roles;
select * from categoria;
INSERT INTO categoria(nombrec) VALUES ('Accesorios');



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
  idproveedor INT AUTO_INCREMENT PRIMARY KEY,
  documento VARCHAR(45) NOT NULL,
  nombre VARCHAR(45) NOT NULL);

-- -----------------------------------------------------
-- Table Productos
-- -----------------------------------------------------
CREATE TABLE productos (
  idproductos INT AUTO_INCREMENT PRIMARY KEY,
  descripcion VARCHAR(45) NOT NULL,
  precio DOUBLE NOT NULL,
  iva DOUBLE NOT NULL,
  existencias INT NOT NULL,
  categoria_id INT NOT NULL,
  proveedor_id INT NOT NULL);

ALTER TABLE productos ADD FOREIGN KEY (proveedor_id) REFERENCES proveedor(idproveedor);
ALTER TABLE productos ADD FOREIGN KEY (categoria_id) REFERENCES categoria(idcategoria);

-- -----------------------------------------------------
-- Table KardexProducto
-- -----------------------------------------------------
CREATE TABLE kardexproducto (
  idkardexproducto INT AUTO_INCREMENT PRIMARY KEY,
  fechaK DATE NOT NULL,
  detalleK VARCHAR(45) NOT NULL,
  cantidadEntradak INT NOT NULL,
  costoEntradak DOUBLE NOT NULL,
  cantidadSalidak INT NOT NULL,
  costoSalidak DOUBLE NOT NULL,
  productos_id INT NOT NULL);

ALTER TABLE kardexproducto ADD FOREIGN KEY (productos_id) REFERENCES productos(idproductos);

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
  id_usuarios INT AUTO_INCREMENT PRIMARY KEY,
  documento VARCHAR(45) NOT NULL,
  nombre VARCHAR(45) NOT NULL,
  apellido VARCHAR(45) NOT NULL,
  telefono VARCHAR(45) NOT NULL,
  direccion VARCHAR(45) NOT NULL,
  username VARCHAR(45) NOT NULL,
  password VARCHAR(10) NOT NULL,
  rol_id INT NOT NULL);
  
  ALTER TABLE usuarios ADD FOREIGN KEY (rol_id) REFERENCES roles(id_rol);

-- -----------------------------------------------------
-- Table Empleado
-- -----------------------------------------------------
CREATE TABLE empleado (
  idempleado INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(45) NOT NULL,
  username VARCHAR(45) NOT NULL,
  Password VARCHAR(10) NOT NULL,
  rol_id INT NOT NULL);
  
  ALTER TABLE empleado ADD FOREIGN KEY (rol_id) REFERENCES roles(id_rol);

-- -----------------------------------------------------
-- Table Factura
-- -----------------------------------------------------
CREATE TABLE factura (
  idfactura INT AUTO_INCREMENT PRIMARY KEY,
  fecha DATE NOT NULL,
  total DOUBLE NOT NULL,
  usuario_id INT NOT NULL,
  empleado_id INT NOT NULL);
  
  ALTER TABLE factura ADD FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuarios);
  ALTER TABLE factura ADD FOREIGN KEY (empleado_id) REFERENCES empleado(idempleado);

-- -----------------------------------------------------
-- Table Detalle_factura
-- -----------------------------------------------------
CREATE TABLE detalle_factura(
  iddetalle_factura INT AUTO_INCREMENT PRIMARY KEY,
  descripcion VARCHAR(45) NOT NULL,
  precio DOUBLE NOT NULL,
  iva DOUBLE NOT NULL,
  cantidad INT NOT NULL,
  devolucion VARCHAR(45) NOT NULL,
  subtotal DOUBLE NOT NULL,
  productos_id INT NOT NULL,
  factura_id INT NOT NULL);
  
  ALTER TABLE detalle_factura ADD FOREIGN KEY (productos_id) REFERENCES productos(idproductos);
  ALTER TABLE detalle_factura ADD FOREIGN KEY (factura_id) REFERENCES empleado(idempleado);

-- ---------------------------------------------------------- --
-- --------------------- PROCEDIMIENTOS --------------------- --
-- ---------------------------------------------------------- --
  
  /*Procedimiento Insertar Categoria */
DROP PROCEDURE sp_InsertarCategoria;
DELIMITER ##
CREATE PROCEDURE sp_InsertarCategoria
(g_nombre varchar (45))
BEGIN
 INSERT INTO Categoria
 (nombre) VALUES(g_nombre);
END ##
DELIMITER ;
call sp_InsertarCategoria('Alimentos');

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
up_nombre varchar (45))
BEGIN
UPDATE Categoria SET nombre = up_nombre WHERE idCategoria = up_idCategoria;
END ##
DELIMITER ;
call sp_ActualizarCategoria(1,'Alimentos');

/* Procedimiento Eliminar Categoria */
DROP PROCEDURE sp_EliminarCategoria;
DELIMITER ##
CREATE PROCEDURE sp_EliminarCategoria
(del_idCategoria int)
BEGIN
 delete from Categoria where idCategoria = del_idCategoria;
END ##
DELIMITER ;
call sp_EliminarCategoria (2);

-- ---------------------------------------------------------- --

 /*Procedimiento Insertar Proveedor */
DROP PROCEDURE sp_InsertarProveedor;
DELIMITER ##
CREATE PROCEDURE sp_InsertarProveedor
(g_documento varchar (45),
g_nombre varchar (45))
BEGIN
 INSERT INTO Proveedor
 (documento,nombre) VALUES(g_documento,g_nombre);
END ##
DELIMITER ;
call sp_InsertarProveedor('1000088550','Juan Camilo Rodiguez');

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
(up_idProveedor int,
up_documento varchar (45),
up_nombre varchar (45))
BEGIN
UPDATE Proveedor SET documento = up_documento,nombre = up_nombre WHERE idProveedor = up_idProveedor;
END ##
DELIMITER ;
call sp_ActualizarProveedor(1,'1000088550','Yeison Rodriguez');

/* Procedimiento Eliminar Proveedor */
DROP PROCEDURE sp_EliminarProveedor;
DELIMITER ##
CREATE PROCEDURE sp_EliminarProveedor
(del_idProveedor int)
BEGIN
 delete from Proveedor where idProveedor = del_idProveedor;
END ##
DELIMITER ;
call sp_EliminarProveedor (1);

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
(g_documento varchar (45),
g_nombre varchar (45),
g_apellido varchar(45),
g_telefono varchar(45),
g_direccion varchar(45),
g_username varchar(45),
g_password varchar(10),
g_rol_id int)
BEGIN
 INSERT INTO Usuarios(documento,nombre,apellido,telefono,direccion,username,password,rol_id)
 VALUES(g_documento,g_nombre,g_apellido,g_telefono,g_direccion,g_username,g_password,g_rol_id);
END ##
DELIMITER ;
call sp_InsertarUsuario('115248644', 'Julian', 'Valencia', '3159871536','CL 76 CR 76A SUR','Julian@MundoAnimal','115248644',1);

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
(up_id_usuarios int,
up_documento varchar (45),
up_nombre varchar (45),
up_apellido varchar (45),
up_telefono varchar (45),
up_direccion varchar (45),
up_username varchar (45),
up_password varchar (10),
up_rol_id int)
BEGIN
UPDATE Usuarios
SET documento=up_documento,nombre=up_nombre,apellido=up_apellido,telefono=up_telefono,direccion=up_direccion,username=up_username,password=up_password,rol_id = up_rol_id
WHERE id_usuarios = up_id_usuarios;
END ##
DELIMITER ;
call sp_ActualizarUsuario(7,'11111','Juliana','Zapata','2338369','CL 80 CR 43-05','Juliana@Admin.com','11111',2);

/* Procedimiento Eliminar Usuario */
DROP PROCEDURE sp_EliminarUsuario;
DELIMITER ##
CREATE PROCEDURE sp_EliminarUsuario
(del_id_usuarios int)
BEGIN
 delete from Usuarios where id_usuarios = del_id_usuarios;
END ##
DELIMITER ;
call sp_EliminarUsuario(7);

-- ---------------------------------------------------------- --

/*Procedimiento Insertar Empleado */
DROP PROCEDURE sp_InsertarEmpleado;
DELIMITER ##
CREATE PROCEDURE sp_InsertarEmpleado
(g_nombre varchar (45),
g_username varchar(45),
g_password varchar(10),
g_rol_id int)
BEGIN
 INSERT INTO Empleado(nombre,username,password,rol_id)
 VALUES(g_nombre,g_username,g_password,g_rol_id);
END ##
DELIMITER ;
call sp_InsertarEmpleado('Julian','Julian@MundoAnimal.com','115248644',1);

/*Procedimiento Mostrar Empleado */
DROP PROCEDURE sp_MostrarEmpleado;
DELIMITER ##
CREATE PROCEDURE sp_MostrarEmpleado()
BEGIN
 SELECT * FROM Empleado;
END ##
DELIMITER ;
call sp_MostrarEmpleado;

/* Procedimiento Actualizar Empleado */
DROP PROCEDURE sp_ActualizarEmpleado;
DELIMITER ##
CREATE PROCEDURE sp_ActualizarEmpleado
(up_idEmpleado int,
up_nombre varchar (45),
up_username varchar (45),
up_password varchar (10),
up_rol_id int)
BEGIN
UPDATE Empleado
SET nombre=up_nombre,username=up_username,password=up_password,rol_id = up_rol_id
WHERE idEmpleado = up_idEmpleado;

END ##
DELIMITER ;
call sp_ActualizarEmpleado(1,'Julian','Julian@ShopMundoAnimal.com','1000024854',3);

/* Procedimiento Eliminar Empleado */
DROP PROCEDURE sp_EliminarEmpleado;
DELIMITER ##
CREATE PROCEDURE sp_EliminarEmpleado
(del_idEmpleado int)
BEGIN
 delete from Empleado where idEmpleado = del_idEmpleado;
END ##
DELIMITER ;
call sp_EliminarEmpleado(1);

-- ---------------------------------------------------------- --

/*Procedimiento Insertar Producto */
DROP PROCEDURE sp_InsertarProducto;
DELIMITER ##
CREATE PROCEDURE sp_InsertarProducto
(g_descripcion varchar (45),
g_precio double,
g_iva double,
g_existencias int,
g_categoria_id int,
g_proveedor_id int)
BEGIN
 INSERT INTO Productos(descripcion,precio,iva,existencias,categoria_id,proveedor_id)
 VALUES(g_descripcion,g_precio,g_iva,g_existencias,g_categoria_id,g_proveedor_id);
END ##
DELIMITER ;
call sp_InsertarProducto('Delicioso alimento',15000,1500,3,2,1);

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
(up_idProductos int,
up_descripcion varchar (45),
up_precio double,
up_iva double,
up_existencias int,
up_categoria_id int,
up_proveedor_id int)
BEGIN
UPDATE Productos
SET descripcion=up_descripcion,precio=up_precio,iva=up_iva,existencias=up_existencias,categoria_id=up_categoria_id,proveedor_id=up_proveedor_id
WHERE idProductos = up_idProductos;
END ##
DELIMITER ;
call sp_ActualizarProducto(1,'Medicina nutritiva con aloe vera',15000,1500,3,2,1);

/* Procedimiento Eliminar Producto */
DROP PROCEDURE sp_EliminarProducto;
DELIMITER ##
CREATE PROCEDURE sp_EliminarProducto
(del_idProductos int)
BEGIN
 delete from Productos where idProductos = del_idProductos;
END ##
DELIMITER ;
call sp_EliminarProducto(2);

-- ---------------------------------------------------------- --

/*Procedimiento Insertar Factura */
DROP PROCEDURE sp_InsertarFactura;
DELIMITER ##
CREATE PROCEDURE sp_InsertarFactura
(g_fecha date,
g_total double,
g_usuario_id int,
g_empleado_id int)
BEGIN
 INSERT INTO Factura(fecha,total,usuario_id,empleado_id)
 VALUES(g_fecha,g_total,g_usuario_id,g_empleado_id);
END ##
DELIMITER ;
call sp_InsertarFactura('15-03-2022',16500,7,2);
