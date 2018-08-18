<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "../../BaseDatos/database_connection.php";
$sentencia = $connect->prepare("SELECT * 
        FROM tb_cat_municipios  WHERE ID_MUNICIPIO = ?");
$sentencia->execute([$id]);
$persona = $sentencia->fetch(PDO::FETCH_OBJ);
if($persona === FALSE){
    #No existe
    echo "¡No existe alguna persona con ese ID!";
    exit();
}

#Si la persona existe, se ejecuta esta parte del código
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Subsidio</title>
</head>
<body>
<form method="post" action="guardarDatosEditados.php">
    <!-- Ocultamos el ID para que el usuario no pueda cambiarlo (en teoría) -->
    <input type="hidden" name="id" value="<?php echo $persona->ID_MUNICIPIO; ?>">
    <label for="nombremuni">Municipio:</label>
    <br>
    <input value="<?php echo $persona->DESCRIPCION_MUNICIPIO ?>" name="municipio" required type="text" id="municipio" placeholder="Ingrese el nuevo nombre">
    <br><br>

    <br><br><input type="submit" value="Guardar cambios">
</form>
</body>
</html>