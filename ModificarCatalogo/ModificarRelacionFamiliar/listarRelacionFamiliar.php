<?php
include_once "../../BaseDatos/database_connection.php";
$sentencia = $connect->query("SELECT * FROM tb_cat_relacion_familiar ;");
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
        <th>ID Relacion Familiar</th>

        <th>Relacion Familiar</th>
    </tr>
    </thead>
    <tbody>
    <!--
        Atención aquí, sólo esto cambiará
        Pd: no ignores las llaves de inicio y cierre {}
    -->
    <?php foreach($personas as $persona){ ?>
        <tr>
            <td><?php echo $persona->ID_RELACION_FAMILIAR ?></td>
            <td><?php echo $persona->DESCRIPCION ?></td>

            <td><a href="<?php echo "editar.php?id=" . $persona->ID_RELACION_FAMILIAR?>">Editar</a></td>
            <td><a href="<?php echo "eliminar.php?id=" . $persona->ID_RELACION_FAMILIAR?>">Eliminar</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<a href="../../Inicios/InicioAdministrador/InicioAdministrador.php" title="Ir la página anterior">Volver</a>
</body>
</html>