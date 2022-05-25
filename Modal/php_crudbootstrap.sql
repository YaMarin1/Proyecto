create database php_crudbootstrap;
use php_crudbootstrap;

drop database php_crudbootstrap;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS empleados (
idEmp int PRIMARY KEY AUTO_INCREMENT,
Nombres varchar(100) NOT NULL,
Apellidos varchar(100) NOT NULL,
Telefono text NOT NULL,
Carrera varchar(100) NOT NULL,
Pais varchar(100) NOT NULL);


INSERT INTO empleados (Nombres,Apellidos,Telefono,Carrera,Pais) VALUES
('Luis', 'Morales', '784521589', 'Modelamiento', 'Mexico'),
('Katrina', 'Cespedes', '215489653', 'Psicologia', 'Panama'),
('Antonio', 'Castelino', '025412569', 'Administracion', 'Adminsitrador '),
('German', 'Molina', '745845214', 'Ing. Sistemas', 'Argentina'),
('Marcial', 'Cancares', '545678903', 'Ing. Produccion', 'Colombia');
