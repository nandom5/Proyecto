<?php
include_once "../../BaseDatos/database_connection.php";
$sentencia = $connect->query("SELECT * FROM TB_CAT_DESTINO_SUBSIDIO;");
$personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!--Recordemos que podemos intercambiar HTML y PHP como queramos-->
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Tabla subsidios</title>
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
				<th>ID_Subsidio</th>
                <th>Tipo de subsidio</th>

			</tr>
		</thead>
		<tbody>
			<!--
				Atención aquí, sólo esto cambiará
				Pd: no ignores las llaves de inicio y cierre {}
			-->
			<?php foreach($personas as $persona){ ?>
			<tr>
				<td><?php echo $persona->ID_TIPO_SOILCITUD_SUBSIDIO ?></td>
				<td><?php echo $persona->DESCRIPCION ?></td>
				<td><a href="<?php echo "editar.php?id=" . $persona->ID_TIPO_SOILCITUD_SUBSIDIO?>">Editar</a></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
    <a href="../../Inicios/InicioAdministrador/InicioAdministrador.php" title="Ir la página anterior">Volver</a>
</body>
</html>