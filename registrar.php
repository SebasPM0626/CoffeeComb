<?php  

	include'conexion.php';

		$nombre= $_POST["nombre"];
		$apellido= $_POST["apellido"];
		$correo= $_POST["correo"];
		$usuario= $_POST["usuario"];
		$pw= $_POST["pw"];
		$telefono= $_POST["telefono"];

			$insertar = "INSERT INTO usuarios (nombre, apellido, correo, usuario, pw, telefono) VALUES('$nombre', '$apellido', '$correo', '$usuario', '$pw', '$telefono')";

				$verificar_usuario= mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario'"); 
				if (mysqli_num_rows($verificar_usuario) >0)
				{
					echo "
						<script>
						alert('El usuario ya esta siendo utilizado');
						window.history.go(-1);
						</script>
					";
					exit;
				}

					$verificar_correo= mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo'"); 
					if (mysqli_num_rows($verificar_correo) >0) 
					{
						echo "
							<script>
							alert('El correo ya esta siendo utilizado');
							window.history.go(-2);
							</script>
						";
						exit;
					}

						$resultado = mysqli_query($conexion, $insertar);
						if (!$resultado) {
						echo "error al registrarse";
						}else{
							header("location:entrada.html");
						}

							mysqli_close($conexion);

?>