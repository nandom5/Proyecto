<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "../../BaseDatos/database_connection.php";
$sentencia = $connect->prepare("DELETE FROM TB_CAT_MUNICIPIOS WHERE ID_MUNICIPIO = ?;");
$resultado = $sentencia->execute([$id]);
if($resultado === TRUE) echo "Eliminado correctamente";
else echo "Algo salió mal";
?>
<a href="listarMunicipio.php" title="Ir la página anterior">Volver</a>
