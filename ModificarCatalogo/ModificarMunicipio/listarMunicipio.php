<?php
include_once "../../BaseDatos/database_connection.php";
$sentencia = $connect->query("SELECT * FROM tb_cat_municipios;");
$personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Tabla departamentos</title>
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
				<th>ID Departamento</th>
                <th>ID Municipio</th>
                <th>Nombre del municipio</th>
			</tr>
		</thead>
		<tbody>
			<!--
				Atención aquí, sólo esto cambiará
				Pd: no ignores las llaves de inicio y cierre {}
			-->
			<?php foreach($personas as $persona){ ?>
			<tr>
				<td><?php echo $persona->ID_DEPARTAMENTO ?></td>
				<td><?php echo $persona->ID_MUNICIPIO ?></td>
                <td><?php echo $persona->DESCRIPCION_MUNICIPIO ?></td>
				<td><a href="<?php echo "editar.php?id=" . $persona->ID_MUNICIPIO?>">Editar</a></td>
                <td><a href="<?php echo "eliminar.php?id=" . $persona->ID_MUNICIPIO?>">Eliminar</a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
    <a href="../../Inicios/InicioAdministrador/InicioAdministrador.php" title="Ir la página anterior">Volver</a>
</body>
</html>