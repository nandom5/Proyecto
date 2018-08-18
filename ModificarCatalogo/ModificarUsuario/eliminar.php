<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "../../BaseDatos/database_connection.php";
$sentencia = $connect->prepare("DELETE FROM TB_USUARIOS WHERE ID_USUARIO = ?;");
$resultado = $sentencia->execute([$id]);
if($resultado === TRUE) echo "Eliminado correctamente";
else echo "Algo salió mal";
?>
<a href="listarPersonas.php" title="Ir la página anterior">Volver</a>
