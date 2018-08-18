<?php
include_once "../../BaseDatos/database_connection.php";
$sentencia = $connect->query("SELECT * FROM tb_usuarios;");
$personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Tabla de ejemplo</title>
	<style>
	table, th, td {
	    border: 1px solid black;
	}
	</style>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>ID</th>
                <th>Usuario</th>
				<th>Nombre</th>
				<th>Apellido</th>
                <th>Fecha de Nacimiento</th>
				<th>Género</th>
                <th>Email</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			<!--
				Atención aquí, sólo esto cambiará
				Pd: no ignores las llaves de inicio y cierre {}
			-->
			<?php foreach($personas as $persona){ ?>
			<tr>
				<td><?php echo $persona->ID_USUARIO ?></td>
				<td><?php echo $persona->LOGIN ?></td>
				<td><?php echo $persona->NOMBRE ?></td>
				<td><?php echo $persona->APELLIDO ?></td>
                <td><?php echo $persona->FECHA_NACIMIENTO ?></td>
                <td><?php echo $persona->GENERO ?></td>
                <td><?php echo $persona->EMAIL ?></td>
				<td><a href="<?php echo "editar.php?id=" . $persona->ID_USUARIO?>">Editar</a></td>
				<td><a href="<?php echo "eliminar.php?id=" . $persona->ID_USUARIO?>">Eliminar</a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
    <a href="../../Inicios/InicioAdministrador/InicioAdministrador.php" title="Ir la página anterior">Volver</a>
</body>
</html>