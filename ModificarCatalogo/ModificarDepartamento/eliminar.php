<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "../../BaseDatos/database_connection.php";
$sentencia = $connect->prepare("DELETE FROM TB_CAT_DEPARTAMENTO WHERE ID_DEPARTAMENTO = ?;");
$resultado = $sentencia->execute([$id]);
if($resultado === TRUE) echo "Eliminado correctamente";
else echo "Algo salió mal";
?>
<a href="listarDepartamentos.php" title="Ir la página anterior">Volver</a>
