<?php 

		$usuario = $_POST['usuario'];
		$pw= $_POST['pw'];
		$conexion = mysqli_connect("localhost", "root", "temporal12345", "coffeecomb");
		$consulta="SELECT * FROM usuarios WHERE usuario='$usuario' and pw='$pw' and Tipo='1'";
		$resultado = mysqli_query($conexion, $consulta);

		$filas=mysqli_num_rows($resultado);

		$consulta2="SELECT * FROM usuarios WHERE usuario='$usuario' and pw='$pw' and Tipo='2'";
		$resultado2 = mysqli_query($conexion, $consulta2);

		$filas2=mysqli_num_rows($resultado2);


		if($filas>0){
			header("location:entrada.html");
		}elseif ($filas2>0) {
			header("location:Admin/entrada.html");
		}else{
			echo "
				<script>
				alert('Error de autenticacion');
				window.history.go(-1);
				</script>
			";
			exit;
		}

		mysqli_free_result($resultado);
		mysqli_close($conexion);
?>	