<?php

include_once "../../BaseDatos/database_connection.php";
#Salir si alguno de los datos no está presente
if(
    !isset($_POST["relacion"])

) exit();

#Si todo va bien, se ejecuta esta parte del código...


$id = $_POST["id"];
$usuario = $_POST["relacion"];


$sentencia = $connect->prepare("UPDATE TB_CAT_RELACION_FAMILIAR SET DESCRIPCION = ? WHERE ID_RELACION_FAMILIAR = ?;");
$resultado = $sentencia->execute([$usuario,$id]); # Pasar en el mismo orden de los ?
if($resultado === TRUE) echo "Cambios guardados ";
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario ";
?>

<a href="listarRelacionFamiliar.php" title="Ir la página anterior">Volver</a>