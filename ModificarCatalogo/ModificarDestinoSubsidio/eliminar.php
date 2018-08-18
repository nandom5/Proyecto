<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "../../BaseDatos/database_connection.php";
$sentencia = $connect->prepare("DELETE FROM TB_CAT_DESTINO_SUBSIDIO WHERE  ID_TIPO_SOILCITUD_SUBSIDIO = ?;");
$resultado = $sentencia->execute([$id]);
if($resultado === TRUE) echo "Eliminado correctamente";
else echo "Algo salió mal";
?>
<a href="listarSubsidios.php" title="Ir la página anterior">Volver</a>
