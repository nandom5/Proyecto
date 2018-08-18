<?php

include_once "../../BaseDatos/database_connection.php";
#Salir si alguno de los datos no está presente
if(
    !isset($_POST["municipio"])

) exit();

#Si todo va bien, se ejecuta esta parte del código...


$id = $_POST["id"];
$usuario = $_POST["municipio"];


$sentencia = $connect->prepare("UPDATE tb_cat_municipios SET DESCRIPCION_MUNICIPIO = ? WHERE ID_MUNICIPIO = ?;");
$resultado = $sentencia->execute([$usuario,$id]); # Pasar en el mismo orden de los ?
if($resultado === TRUE) echo "Cambios guardados ";
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario ";
?>

<a href="listarMunicipio.php" title="Ir la página anterior">Volver</a>