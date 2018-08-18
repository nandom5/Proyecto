<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "../../BaseDatos/database_connection.php";
$sentencia = $connect->prepare("SELECT * 
        FROM tb_usuarios 
        inner join
        tb_roles  
        on
        tb_usuarios.ID_ROL = tb_roles.ID_ROL
        inner join 
        tb_unidad_trabajo 
        on
        tb_usuarios.ID_UNIDAD= tb_unidad_trabajo.ID_UNIDAD_TRABAJO WHERE ID_USUARIO = ?;");
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
        <input type="hidden" name="id" value="<?php echo $persona->ID_USUARIO; ?>">
        <label for="usuario">Usuario:</label>
        <br>
        <input value="<?php echo $persona->LOGIN ?>" name="usuario" required type="text" id="usuario" placeholder="Escribe usuario nuevo">
        <br><br>
		<label for="nombre">Nombre:</label>
		<br>
        <input value="<?php echo $persona->NOMBRE ?>" name="nombre" required type="text" id="nombre" placeholder="Escribe tu nombre...">
		<br><br>
		<label for="apellidos">Apellidos:</label>
		<br>
		<input value="<?php echo $persona->APELLIDO ?>" name="apellidos" required type="text" id="apellidos" placeholder="Escribe tu apellido...">
		<br><br>
        <label for="fechanac">Fecha de nacimiento:</label>
        <br>
        <input value="<?php echo $persona->FECHA_NACIMIENTO ?>" name="fechanac" required type="text" id="fechanaci" placeholder="Escribe tu fecha de nacimiento">
        <br><br>

		<label for="sexo">Género</label>
		<select name="sexo" required name="sexo" id="sexo">
			<!-- 
			Para seleccionar una opción con defecto, se debe poner el atributo selected.
			Usamos el operador ternario para que, si es esa opción, marquemos la opción seleccionada
			 -->
			<option value="">--Selecciona--</option>
			<option <?php echo $persona->GENERO === 'M' ? "selected='selected'": "" ?> value="M">Masculino</option>
			<option <?php echo $persona->GENERO === 'F' ? "selected='selected'": "" ?> value="F">Femenino</option>
		</select>
        <br>
        <label for="email">Email:</label>
        <br>
        <input value="<?php echo $persona->EMAIL ?>" name="email" required type="email" id="email" placeholder="Escribe tu email">
        <br><br>
		<br><br><input type="submit" value="Guardar cambios">
	</form>
</body>
</html>