<?php

include_once "../../BaseDatos/database_connection.php";
#Salir si alguno de los datos no está presente
if(
    !isset($_POST["subsidio"])

) exit();

#Si todo va bien, se ejecuta esta parte del código...


$id = $_POST["id"];
$usuario = $_POST["subsidio"];


$sentencia = $connect->prepare("UPDATE tb_cat_destino_subsidio SET DESCRIPCION = ? WHERE  ID_TIPO_SOILCITUD_SUBSIDIO = ?;");
$resultado = $sentencia->execute([$usuario,$id]); # Pasar en el mismo orden de los ?
if($resultado === TRUE) echo "Cambios guardados ";
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario ";
?>

<a href="listarSubsidios.php" title="Ir la página anterior">Volver</a>