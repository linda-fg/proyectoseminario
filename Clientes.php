<?php 
	include "Conexion.php";

	class Clientes extends Conexion {
	public function agregarNuevoClientes($datos){
			$conexion = Conexion::conectar();
			$sql = "INSERT INTO t_clientes (id_usuario,
											id_cliente,
											nombre,
										  	apellido,
										  	direccion,
										  	fecha_nacimiento,
										  	sexo,
										  	telefono,
										  	correo)
					VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$query = $conexion->prepare($sql);
			$query->bind_param("iisssssss", $datos['idUsuario'],
										$datos['idCliente'], 
										$datos['nombre'],
										$datos['apellido'],
										$datos['direccion'],
										$datos['fecha_nacimiento'],
										$datos['sexo'],
										$datos['telefono'],
										$datos['correo']);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}


		
		public function obtenerDatosClientes($idCliente){
			$conexion = Conexion::conectar();

		echo	$sql = "SELECT 
					usuarios.id_usuario AS idUsuario,
					usuarios.usuario AS nombreUsuario,
					roles.nombre AS rol,
					usuarios.id_rol AS idRol,
					usuarios.ubicacion AS ubicacion,
					usuarios.activo AS estatus,
					usuarios.id_persona AS idPersona,
					persona.nombre AS nombrePersona,
					 persona.id_cliente AS idCliente,
					persona.apellido AS apellido,
					persona.direccion AS direccion,
					persona.fecha_nacimiento AS fecha_nacimiento,
					persona.sexo AS sexo,
					persona.correo AS correo,
					persona.telefono AS telefono

				FROM
					t_usuarios AS usuarios
						INNER JOIN
					t_cat_roles AS roles ON usuarios.id_rol = roles.id_rol
						INNER JOIN
					t_clientes AS persona ON usuarios.id_persona = persona.id_cliente
						AND usuarios.id_usuario = '$idCliente'";

			$respuesta = mysqli_query($conexion, $sql);
			$cliente = mysqli_fetch_array($respuesta);

			$datos = array(
					'idCliente' => $cliente['idCliente'],
					'nombre' => $cliente['nombre'],
					'apellido' => $cliente['apellido'],
					'direccion' => $cliente['direccion'],
					'fecha_nacimiento' => $cliente['fecha_nacimiento'],
					'sexo' => $cliente['sexo'],
					'telefono' => $cliente['telefono'],
				 	'correo' => $cliente['correo']

					

			);
			return $datos;
		}


		public function actualizarClientes($datos){
			$conexion = Conexion::conectar();
			$idCliente = self::obtenerIdCliente($datos['idCliente']);
			$sql = "UPDATE t_clientes SET 	nombre = ?,
										  	apellido = ?,
										  	direccion = ?,
										  	fecha_nacimiento = ?,
										 	sexo = ?,
										 	telefono = ?,
										 	correo = ?
					WHERE id_cliente = ?";

			$query = $conexion->prepare($sql);
			$query->bind_param('sssssssi',  $datos['nombre'],
											$datos['apellido'],
											$datos['direccion'],
											$datos['fecha_nacimiento'],
											$datos['sexo'],
											$datos['telefono'],
											$datos['correo'],
											$idCliente);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;

		}


	public function obtenerIdCliente($idCliente){
			$conexion = Conexion::conectar();
			$sql = "SELECT 
							id_cliente
					FROM
						
						t_clientes
                    WHERE id_cliente = 'idCliente'";
			$respuesta = mysqli_query($conexion, $sql);

			$idCliente = mysqli_fetch_array($respuesta)['idCliente'];

			return $idCliente;
		}


		
	  public function eliminarClientes($idCliente){
	  	$conexion = Conexion::conectar();
	  	$sql = "DELETE FROM t_clientes WHERE id_cliente = ?";
	  	$query = $conexion->prepare($sql);
	  	$query->bind_param('i', $idCliente);
	  	$respuesta = $query->execute();
	  	$query->close();
	  	return $respuesta;
	  }




        function calculaTiempo($fechaInicio,$fechaFin){
            //indice 0 = años
            //indice 1= meses
            //indice 2 = dias
            //indice 11 = total en dias 
            $datetime1 = date_create($fechaInicio);
            $datetime2 = date_create($fechaFin);
            $interval = date_diff($datetime1, $datetime2);
        
            $tiempo=array();
        
            foreach ($interval as $valor) {
                $tiempo[]=$valor;
            }
        
            return $tiempo;
        }




    }

	
