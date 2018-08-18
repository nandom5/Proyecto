<?php


include("../../BaseDatos/database_connection.php");



$query = "SELECT *
FROM proyecto.tb_roles order by DESCRIPCION_ROL asc
";

$data = $connect->prepare($query);    // Prepare query for execution
$data->execute();// Execute (run) the query

$query2 = "SELECT * FROM proyecto.tb_unidad_trabajo order by DESCRIPCION_UNIDAD asc
";

$data2 = $connect->prepare($query2);    // Prepare query for execution
$data2->execute();// Execute (run) the query


if(isset($_POST['crear']))
{
    if(isset($_POST['primernombre'])) {
        $primernombre = $_POST['primernombre'];
    }
    if(isset($_POST['primerapellido'])) {
        $primerapellido = $_POST['primerapellido'];
    }
    if(isset($_POST['fechanac1'])) {
        $fechanac1= $_POST['fechanac1'];
    }
    if(isset($_POST['correo1'])) {
        $correo1 = $_POST['correo1'];
    }
    if(isset($_POST['usuario1'])) {
        $usuario1 = $_POST['usuario1'];
    }
    if(isset($_POST['contra1'])) {
        $contra1 = $_POST['contra1'];
    }
    if(isset($_POST['genero'])) {
        $genero = $_POST['genero'];
    }
    if(isset($_POST['rol'])) {
        $rol = $_POST['rol'];
    }
    if(isset($_POST['unidad'])) {
        $unidad = $_POST['unidad'];
    }

    $options = [
        'cost' => 12,
    ];

    $contra2=password_hash($contra1, PASSWORD_BCRYPT, $options);

    $query3 = "INSERT INTO proyecto.tb_usuarios(LOGIN,ID_ROL,ID_UNIDAD,NOMBRE,APELLIDO,FECHA_NACIMIENTO,GENERO,EMAIL,CLAVE)
VALUES (:usuario1,:rol,:unidad,:primernombre,:primerapellido,STR_TO_DATE(:fechanac1,'%Y/%m/%d'),:genero,:correo1,:contra2)";



    $stm = $connect->prepare($query3);

    $result =$stm ->execute(array(":usuario1"=>$usuario1,":rol"=>$rol,":unidad"=>$unidad,":primernombre"=>$primernombre,":primerapellido"=>$primerapellido,":fechanac1"=>$fechanac1,":genero"=>$genero,":correo1"=>$correo1,":contra2"=>$contra2));

}

?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <title>Creacion de Usuarios</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Photography Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements"
    />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Meta tag Keywords -->
    <!-- css files -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- //css files -->
    <!-- web-fonts -->
    <link href="//fonts.googleapis.com/css?family=Londrina+Outline" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <!-- //web-fonts -->
</head>

<body>
<!-- header -->
<h1>
    <span>C</span>reacion
    <span>D</span>e
    <span>U</span>suarios
</h1>
<!-- //header -->
<!-- content -->
<div class="main-content-agile">
    <div class="sub-main-w3">
        <form action="#" method="post">



            <div class="w3layouts-grids">
                <div class="form-style-agile form-grids-w3l">
                    <label>ingrese su primer nombre</label>
                    <input placeholder="Ingrese su primer nombre" name="primernombre" type="text" required="">
                </div>
                <div class="form-style-agile form-grids-w3l">
                    <label>ingrese su primer apellido</label>
                    <input placeholder="Ingrese el nombre del objeto" name="primerapellido" type="text" required="">
                </div>
            </div>
            <div class="w3layouts-grids">
                <div class="form-style-agile form-grids-w3l">
                    <label>Fecha de nacimiento</label>
                    <input placeholder="año/mes/dia" name="fechanac1" type="text" required="">

                </div>
                <div class="form-style-agile form-grids-w3l">
                    <label>Ingrese su Correo</label>
                    <input placeholder="ejemplo1@ejemplo.com" name="correo1" type="email" required="">
                </div>

            </div>
            <div class="w3layouts-grids">
                <div class="form-style-agile form-grids-w3l">
                    <label>ingrese su usuario</label>
                    <input placeholder="Ingrese el usuario" name="usuario1" type="text" minlength="6" maxlength="25" required="">
                </div>
                <div class="form-style-agile form-grids-w3l">
                    <label>Ingrese su contraseña</label>
                    <input placeholder="Ingrese su contraseña" name="contra1" type="password" minlength="8" maxlength="25" required="">
                </div>
            </div>

            <div class="form-style-agile">
                <label>Genero</label>
                <select NAME="genero" class="category"  required="" >

                    <option value="">Seleccione su Genero</option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>




                <div class="form-style-agile">
                    <label>Rol</label>
                    <select name="rol" id="rol" class="category"  required="">
                        <option value="0">Seleccione un rol</option>
                        <?php
                        while($row=$data->fetch(PDO::FETCH_ASSOC)){
                            echo '<option value="'.$row['ID_ROL'].'">'.$row['DESCRIPCION_ROL'].'</option>';
                            //print_r($row);
                        }
                        ?>
                    </select>
                </div>
                    <div class="form-style-agile">
                        <label>Unidad de Trabajo</label>
                        <select name="unidad" id="unidad" class="category"  required="">
                            <option value="0">Seleccione una unidad</option>
                            <?php
                            while($row2=$data2->fetch(PDO::FETCH_ASSOC)){
                                echo '<option value="'.$row2['ID_UNIDAD_TRABAJO'].'">'.$row2['DESCRIPCION_UNIDAD'].'</option>';

                            }
                            ?>
                        </select>
                    </div>

                    <div class="w3layouts-grids">
                        <input type="submit" name="crear" id="submit" value="Crear">
                    </div>
                </div>






        </form>


    </div>

</div>
<!-- content -->
<!-- footer -->
<div class="footer">
    <h2><p>© 2018 Best Helper Enterprise. All rights reserved | Design by  <a href="../../index.php"><span>Regresar al Inicio</span>  </a>
    </h2>
</div>
<!-- //footer -->


<!-- js -->
<script src="js/jquery-2.1.4.min.js"></script>

<!-- date-->
<link rel="stylesheet" href="css/jquery-ui.css" />
<script src="js/jquery-ui.js"></script>
<script>
    $(function () {
        $("#datepicker,#datepicker1").datepicker();
    });
</script>
<!-- //date -->

<!-- time -->
<script src="js/wickedpicker.js"></script>
<script>
    $('.timepicker').wickedpicker({
        twentyFour: false
    });
</script>
<link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
<!-- //time -->

</body>

</html>