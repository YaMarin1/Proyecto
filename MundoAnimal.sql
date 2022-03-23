CREATE DATABASE MUNDOANIMAL;
USE MUNDOANIMAL;
DROP DATABASE MUNDOANIMAL;

-- -----------------------------------------------------
-- Table `MUNDOANIMAL`.`ROL`
-- -----------------------------------------------------
CREATE TABLE roles (
  id_rol INT PRIMARY KEY AUTO_INCREMENT,
  descripcion VARCHAR(45) NOT NULL);

INSERT INTO roles(descripcion) VALUES ("Administrador");
INSERT INTO roles(descripcion) VALUES ("Cliente");
INSERT INTO roles(descripcion) VALUES ("Proveedor");
INSERT INTO roles(descripcion) VALUES ("Empleado");

SELECT * FROM roles;

-- -----------------------------------------------------
-- Table `MUNDOANIMAL`.`USUARIO`
-- -----------------------------------------------------
CREATE TABLE usuarios (
  id_usuarios INT PRIMARY KEY AUTO_INCREMENT,
  documento VARCHAR(45) NOT NULL,
  nombre VARCHAR(45) NOT NULL,
  apellido VARCHAR(45) NOT NULL,
  telefono VARCHAR(45) NOT NULL,
  direccion VARCHAR(45) NOT NULL,
  username VARCHAR(45) NOT NULL,
  password VARCHAR(10) NOT NULL);
  
ALTER TABLE usuarios ADD rol_id INT NOT NULL;
ALTER TABLE usuarios ADD FOREIGN KEY (rol_id) REFERENCES roles(id_rol);
  
INSERT INTO usuarios(documento,nombre,apellido,telefono,direccion,username,password,rol_id) VALUES ('1000088550','Yeison','Marin', '3178571103', 'Cl 87 # 31-60', 'Yeison@MundoAnimal.com','1000088550',1);
INSERT INTO usuarios(documento,nombre,apellido,telefono,direccion,username,password,rol_id) VALUES ('1015066245','Juliana','Marin', '3167399292', 'CR 43 # 80-05', 'Juliana@MundoAnimal.com','1015066245',1);
INSERT INTO usuarios(documento,nombre,apellido,telefono,direccion,username,password,rol_id) VALUES ('32481891','Lucia','Zapata', '3167974548', 'Cl 87 # 31-58', 'Lucia@gmail.com','32481891',2);
INSERT INTO usuarios(documento,nombre,apellido,telefono,direccion,username,password,rol_id) VALUES ('43635764','Cecilia','Piedrahita', '3147200163', 'Cl 87 # 31-58', 'Cecilia@gmail.com','43635764',3);
INSERT INTO usuarios(documento,nombre,apellido,telefono,direccion,username,password,rol_id) VALUES ('1000085835','Mateo','Marin', '3182921347', 'Cl 87 # 31-58', 'Mateo@gmail.com','1000085835',4);

SELECT * FROM usuarios;