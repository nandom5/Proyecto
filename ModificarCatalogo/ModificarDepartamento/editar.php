<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "../../BaseDatos/database_connection.php";
$sentencia = $connect->prepare("SELECT * 
        FROM tb_cat_departamento WHERE ID_DEPARTAMENTO = ?");
$sentencia->execute([$id]);
$persona = $sentencia->fetch(PDO::FETCH_OBJ);
if($persona === FALSE){
	#No existe
	echo "¡No existe alguna persona con ese ID!";
	exit();
}

#Si la persona existe, se ejecuta esta parte del código
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Usuario</title>
</head>
<body>
	<form method="post" action="guardarDatosEditados.php">
		<!-- Ocultamos el ID para que el usuario no pueda cambiarlo (en teoría) -->
        <input type="hidden" name="id" value="<?php echo $persona->ID_DEPARTAMENTO; ?>">
        <label for="nombredepa">Departamento:</label>
        <br>
        <input value="<?php echo $persona->DESCRIPCION_DEPARTAMENTO ?>" name="depa" required type="text" id="depa" placeholder="escribe nuevo departamento">
        <br><br>

		<br><br><input type="submit" value="Guardar cambios">
	</form>
</body>
</html>