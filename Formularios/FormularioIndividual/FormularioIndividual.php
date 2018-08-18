<?php

session_start();

include("../../BaseDatos/database_connection.php");

if(!isset($_SESSION["usuario"]))
{
    header("Location: ../../index.php");
}


$query = "SELECT * FROM proyecto.tb_expediente";

$data = $connect->prepare($query);    // Prepare query for execution
$data->execute();// Execute (run) the query

$message = '';

if(isset($_POST['submit'])) {

    $relacion=null;

    if (isset($_POST['expe'])) {
        $expediente = $_POST['expe'];
    }

    if (isset($_POST['DPI'])) {
        $dpi = $_POST['DPI'];
    }
    if (isset($_POST['nombre1'])) {
        $nombre1 = $_POST['nombre1'];
    }
    if (isset($_POST['nombre2'])) {
        $nombre2 = $_POST['nombre2'];
    }

    if (isset($_POST['nombre3'])) {
        $nombre3 = $_POST['nombre3'];
    }
    if (isset($_POST['primerapellido'])) {
        $apellido1 = $_POST['primerapellido'];
    }
    if (isset($_POST['segundoapellido'])) {
        $apellido2 = $_POST['segundoapellido'];
    }
    if (isset($_POST['casada'])) {
        $apellido3 = $_POST['casada'];
    }
    if (isset($_POST['sueldomens'])) {
        $sueldo = $_POST['sueldomens'];
    }
    if (isset($_POST['fecha'])) {
        $fechanac = $_POST['fecha'];
    }

    if (isset($_POST['direccion'])) {
        $direccion = $_POST['direccion'];
    }

    if (isset($_POST['telefono'])) {
        $telefono = $_POST['telefono'];
    }

    $query3 = "INSERT INTO proyecto.tb_informacion_personas_involucradas
(ID_RELACION_FAMILIAR,
ID_NUMERO_EXPEDIENTE,
NUMERO_DOCUMENTO,
NOMBRE1,
NOMBRE2,
NOMBRE3,
APELLIDO1,
APELLIDO2,
APELLIDOCASADA,
SUELDO,
FECHA_NACIMIENTO,
DIRECCION,
TELEFONO)
VALUES(?,?,?,?,?,?,?,?,?,?,STR_TO_DATE(?,'%Y/%m/%d'),?,?)";

    $stm = $connect->prepare($query3);

    $stm->execute(array($relacion,$expediente, $dpi, $nombre1, $nombre2, $nombre3,$apellido1, $apellido2, $apellido3, $sueldo, $fechanac ,$direccion,$telefono));


    if(  $sueldo<3000) {


        header("Location: ../FormularioDigitalizacion/FormularioDigitalizacion.php");
    }
    else{
        header("Location: ../AplicacionNoaprobada/AplicacionNoAprobada.php");
    }

}

?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <title>Informacion Personal </title>
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
    <span>I</span>nformacion
    <span>P</span>ersonal


</h1>
<!-- //header -->
<!-- content -->
<div class="main-content-agile">
    <div class="sub-main-w3">
        <form action="#" method="post">



            <div class="w3layouts-grids">
                <div class="form-style-agile form-grids-w3l">
                    <label>ingrese su primer nombre</label>
                    <input placeholder="Ingrese su primer nombre" name="nombre1" type="text" required="">
                </div>
                <div class="form-style-agile form-grids-w3l">
                    <label>ingrese su segundo nombre</label>
                    <input placeholder="Ingrese su segundo nombre" name="nombre2" type="text" required="">
                </div>
            </div>
            <div class="w3layouts-grids">
                <div class="form-style-agile form-grids-w3l">
                    <label>ingrese su tercer nombre</label>
                    <input placeholder="Ingrese su tercer nombre" name="nombre3" type="text" >
                </div>
                <div class="form-style-agile form-grids-w3l">
                    <label>ingrese su primer apellido</label>
                    <input placeholder="Ingrese su primer apellido" name="primerapellido" type="text" required="">
                </div>

            </div>
            <div class="w3layouts-grids">
                <div class="form-style-agile form-grids-w3l">
                    <label>ingrese su segundo apellido</label>
                    <input placeholder="Ingrese su segundo apellido" name="segundoapellido" type="text" >
                </div>
                <div class="form-style-agile form-grids-w3l">
                    <label>ingrese apellido de casada</label>
                    <input placeholder="Ingrese su apellido de casada" name="casada" type="text" >
                </div>
            </div>

            <div class="w3layouts-grids">
                <div class="form-style-agile form-grids-w3l">
                    <label>DPI</label>
                    <input placeholder="Ingrese su No. DPI" name="DPI" type="text" minlength="13" maxlength="13" required="">
                </div>
                <div class="form-style-agile form-grids-w3l">
                    <label>Sueldo Mensual</label>
                    <input placeholder="Ingrese su sueldo mensual" name="sueldomens" type="text" >
                </div>
            </div>

            <div class="w3layouts-grids">
                <div class="form-style-agile form-grids-w3l">
                    <label>Fecha de nacimiento</label>
                    <input placeholder="año/mes/dia" name="fecha" type="text" required="">

                </div>
                <div class="form-style-agile form-grids-w3l">
                    <label>Ingrese su No. de telefono</label>
                    <input placeholder="ingrese su numero de telefono" name="telefono" type="text" minlength="8" maxlength="8" required="">
                </div>

            </div>

            <div class="form-style-agile">
                <label>Numero de Expediente</label>
                <select name="expe" id="expe" class="category"  required="">
                    <option value="0">Seleccione su Expediente</option>
                    <?php
                    while($row=$data->fetch(PDO::FETCH_ASSOC)){
                        echo '<option value="'.$row['ID_NUMERO_EXPEDIENTE'].'">'.$row['CODIGO_EXPEDIENTE'].'</option>';
                        //print_r($row);
                    }
                    ?>
                </select>
            </div>



            <div class="form-style-agile">
                <label>ingrese su direccion </label>
                <input placeholder="Ingrese su direccion " name="direccion" type="text" required="">
            </div>




            <div class="w3layouts-grids">
                <input type="submit" name="submit" value="Continuar">
            </div>

    </div>

    </div>
    </form>


</div>

</div>
<!-- content -->
<!-- footer -->
<div class="footer">
    <h2><p>© 2018 Best Helper Enterprise. All rights reserved | Design by  <a href="../../Inicios/InicioUsuario/InicioUsuario.php"><span>Regresar al Inicio</span>  </a>
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