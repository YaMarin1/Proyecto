<?php
	/*-------------------------
	Autor: Edilfredo Pineda F
	Mail: edilfredo9@gmail.com
	---------------------------*/
	class Database{
		private $con;
		private $dbhost="localhost";
		private $dbuser="root";
		private $dbpass="";
		private $dbname="mundoanimal";

		function __construct(){
			$this->connect_db();
		}

		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}

        public function sanitize($var){
            $return = mysqli_real_escape_string($this->con, $var);
            	return $return;
        }

        public function create($documento,$nombre,$apellido,$telefono,$direccion,$username,$password,$rol_id){
            $sql = "INSERT INTO `usuarios` (documento,nombre,apellido,telefono,direccion,username,password,rol_id) VALUES ('$documento','$nombre','$apellido','$telefono','$direccion','$username','$password','$rol_id')";
            $res = mysqli_query($this->con, $sql);
            	if($res){
              		return true;
            	}else{
            		return false;
         }
        }

        public function read(){
            $sql = "SELECT * FROM usuarios";
            $res = mysqli_query($this->con, $sql);
            	return $res;
        }

        public function single_record($id_usuarios){
			$sql = "SELECT * FROM usuarios where id_usuarios='$id_usuarios'";
			$res = mysqli_query($this->con, $sql);
				$return = mysqli_fetch_object($res );
					return $return ;
		}

		public function update($documento,$nombre,$apellido,$telefono,$direccion,$username,$password,$rol_id,$id_usuarios){
			$sql = "UPDATE usuarios SET documento='$documento',nombre='$nombre', apellido='$apellido', telefono='$telefono', direccion='$direccion', username='$username', password='$password', rol_id='$rol_id' WHERE id_usuarios=$id_usuarios";
			$res = mysqli_query($this->con, $sql);
				if($res){
					MostrarAlerta();
					return true;
				}else{
					return false;
			}
		}

        public function delete($id_usuarios){
            $sql = "DELETE FROM usuarios WHERE id_usuarios=$id_usuarios";
            $res = mysqli_query($this->con, $sql);
            	if($res){
            		return true;
            	}else{
            		return false;
            }
        }
}
?>
