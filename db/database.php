<?php
	/*-------------------------
	Autor: Edilfredo Pineda F
	Mail: edilfredo9@gmail.com
	---------------------------*/
	class Database{
		private $con;
		private $dbhost="localhost";
		private $dbuser="root";
		private $dbpass="root";
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

		public function close(){
			$this->con = null;
	  }

        public function sanitize($var){
            $return = mysqli_real_escape_string($this->con, $var);
            	return $return;
        }

		public function readFactura(){
            $sql = "SELECT * FROM view_DETALLE_DE_COMPRA";
            $res = mysqli_query($this->con, $sql);
            return $res;
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

        public function single_record($documento){
			$sql = "SELECT * FROM usuarios where documento='$documento'";
			$res = mysqli_query($this->con, $sql);
				$return = mysqli_fetch_object($res );
					return $return ;
		}

		public function update($documento,$nombre,$apellido,$telefono,$direccion,$username,$password,$rol_id,$id){
			$sql = "UPDATE usuarios SET documento='$documento',nombre='$nombre', apellido='$apellido', telefono='$telefono', direccion='$direccion', username='$username', password='$password', rol_id='$rol_id' WHERE documento=$id";
			$res = mysqli_query($this->con, $sql);
				if($res){
					return true;
				}else{
					return false;
			}
		}

        public function delete($documento){
            $sql = "DELETE FROM usuarios WHERE documento=$documento";
            $res = mysqli_query($this->con, $sql);
            	if($res){
            		return true;
            	}else{
            		return false;
            }
        }




		public function createCat($nombrec){
            $sql = "INSERT INTO categoria (nombrec) VALUES ('$nombrec')";
            $res = mysqli_query($this->con, $sql);
            	if($res){
              		return true;
            	}else{
            		return false;
         }
        }

        public function readCat(){
            $sql = "SELECT * FROM categoria";
            $res = mysqli_query($this->con, $sql);
            	return $res;
        }

        public function single_recordCat($idcategoria){
			$sql = "SELECT * FROM categoria where idcategoria='$idcategoria'";
			$res = mysqli_query($this->con, $sql);
				$return = mysqli_fetch_object($res );
					return $return ;
		}

		public function updateCat($nombrec,$idcategoria){
			$sql = "UPDATE categoria SET nombrec='$nombrec' WHERE idcategoria=$idcategoria";
			$res = mysqli_query($this->con, $sql);
				if($res){
					return true;
				}else{
					return false;
			}
		}

        public function deleteCat($idcategoria){
            $sql = "DELETE FROM categoria WHERE idcategoria=$idcategoria";
            $res = mysqli_query($this->con, $sql);
            	if($res){
            		return true;
            	}else{
            		return false;
            }
        }





		public function createRol($descripcion){
            $sql = "INSERT INTO roles (descripcion) VALUES ('$descripcion')";
            $res = mysqli_query($this->con, $sql);
            	if($res){
              		return true;
            	}else{
            		return false;
         }
        }

        public function readRol(){
            $sql = "SELECT * FROM roles";
            $res = mysqli_query($this->con, $sql);
            	return $res;
        }

        public function single_recordRol($id_rol){
			$sql = "SELECT * FROM roles where id_rol='$id_rol'";
			$res = mysqli_query($this->con, $sql);
				$return = mysqli_fetch_object($res );
					return $return ;
		}

		public function updateRol($descripcion,$id_rol){
			$sql = "UPDATE roles SET descripcion='$descripcion' WHERE id_rol=$id_rol";
			$res = mysqli_query($this->con, $sql);
				if($res){
					return true;
				}else{
					return false;
			}
		}

        public function deleteRol($id_rol){
            $sql = "DELETE FROM roles WHERE id_rol=$id_rol";
            $res = mysqli_query($this->con, $sql);
            	if($res){
            		return true;
            	}else{
            		return false;
            }
        }	
		
		
		public function readEmpleado(){
            $sql = "SELECT * FROM usuarios where rol_id=3";
            $res = mysqli_query($this->con, $sql);
            	return $res;
        }





		public function createProductos($nombrep,$imagen,$descripcion,$stock,$precio,$iva,$categoria_id,$proveedor_id){
            $sql = "INSERT INTO productos (nombrep,imagen,descripcion,stock,precio,iva,categoria_id,proveedor_id) VALUES ('$nombrep','".$imagen."','$descripcion',$stock,$precio,$iva,$categoria_id,$proveedor_id)";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			} else{
				return false;
         }
        }

        public function readProductos(){
            $sql = "SELECT * FROM productos";
            $res = mysqli_query($this->con, $sql);
            	return $res;
        }

        public function single_recordProductos($idproductos){
			$sql = "SELECT * FROM productos where idproductos='$idproductos'";
			$res = mysqli_query($this->con, $sql);
				$return = mysqli_fetch_object($res );
					return $return ;
		}

		public function updateProductos($nombrep,$imagen,$descripcion,$stock,$precio,$iva,$categoria_id,$proveedor_id,$idproductos){
			$sql = "UPDATE productos SET nombrep='$nombrep',imagen='.$imagen.', descripcion='$descripcion', stock='$stock', precio='$precio', iva='$iva', categoria_id='$categoria_id', proveedor_id='$proveedor_id' WHERE idproductos=$idproductos";
			$res = mysqli_query($this->con, $sql);
			if($res){
					return true;
				}else{
					return false;
			}
		}

        public function deleteProductos($idproductos){
            $sql = "DELETE FROM productos WHERE idproductos=$idproductos";
            $res = mysqli_query($this->con, $sql);
            	if($res){
            		return true;
            	}else{
            		return false;
            }
        }

		public function actualizarStock($idproductos,$stockDescontar){
            $sql = "SELECT stock FROM productos WHERE idproductos = $idproductos";
			$res = $this->con->ejecutar($sql);

			$stockActual = 0;
				if ($reg = mysqli_fetch_array($res)) {
						$stockActual = $reg[0];
				}
				$stockActual -= $stockDescontar;
				$query = "UPDATE productos SET stock = $stockActual WHERE idproductos = $idproductos";
				$this->con->ejecutar($query);

		}






		public function createProveedor($idproveedor,$nombre,$apellido,$telefono){
            $sql = "INSERT INTO proveedor (idproveedor,nombre,apellido,telefono) VALUES ($idproveedor,'$nombre','$apellido',$telefono)";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			} else{
				return false;
         }
        }

        public function readProveedor(){
            $sql = "SELECT * FROM proveedor";
            $res = mysqli_query($this->con, $sql);
            	return $res;
        }

        public function single_recordProveedor($idproveedor){
			$sql = "SELECT * FROM proveedor where idproveedor='$idproveedor'";
			$res = mysqli_query($this->con, $sql);
				$return = mysqli_fetch_object($res );
					return $return ;
		}

		public function updateProveedor($idproveedor, $nombre,$apellido,$telefono,$id){
			$sql = "UPDATE proveedor SET idproveedor=$idproveedor, nombre='$nombre', apellido='$apellido', telefono=$telefono WHERE idproveedor=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

        public function deleteProveedor($idproveedor){
            $sql = "DELETE FROM proveedor WHERE idproveedor=$idproveedor";
            $res = mysqli_query($this->con, $sql);
            	if($res){
            		return true;
            	}else{
            		return false;
            }
        }

}
?>