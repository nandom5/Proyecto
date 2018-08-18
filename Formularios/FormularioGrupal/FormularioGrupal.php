<?php

session_start();

include("../../BaseDatos/database_connection.php");

if(!isset($_SESSION["usuario"]))
{
    header("Location: ../../index.php");
}


$query = "SELECT * FROM proyecto.tb_cat_relacion_familiar";

$data = $connect->prepare($query);    // Prepare query for execution
$data->execute();// Execute (run) the query

$query2 = "SELECT * FROM proyecto.tb_expediente";

$data2 = $connect->prepare($query2);    // Prepare query for execution
$data2->execute();// Execute (run) the query

$message="";
if(isset($_POST['submit'])) {

    if (isset($_POST['RelacionFam'])) {
        $relacion = $_POST['RelacionFam'];
    }
    if (isset($_POST['expe'])) {
        $expe = $_POST['expe'];
    }

    if (isset($_POST['DPI'])) {
        $dpi = $_POST['DPI'];
    }
    if (isset($_POST['primernombreinfo'])) {
        $nombre1 = $_POST['primernombreinfo'];
    }
    if (isset($_POST['segundonombreinfo'])) {
        $nombre2 = $_POST['segundonombreinfo'];
    }
    if (isset($_POST['tercernombreinfo'])) {
        $nombre3 = $_POST['tercernombreinfo'];
    }
    if (isset($_POST['primerapellidoinfo'])) {
        $apellido1 = $_POST['primerapellidoinfo'];
    }
    if (isset($_POST['segundoapellidoinfo'])) {
        $apellido2 = $_POST['segundoapellidoinfo'];
    }

    if (isset($_POST['casadainfo'])) {
        $casado = $_POST['casadainfo'];
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

    $stm->execute(array($relacion,$expe, $dpi, $nombre1, $nombre2, $nombre3, $apellido1, $apellido2,$casado, $sueldo, $fechanac,$direccion,$telefono));

    if(  $sueldo<3000) {


        header("Location: ../FormularioDigitalizacionGrupal/FormularioDigitalizacionGrupal.php");
    }
    else{
        header("Location: ../AplicacionNoaprobada/AplicacionNoAprobada.php");
    }

}
?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <title>Informacion Personal Grupal</title>
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
                    <label>Primer nombre</label>
                    <input placeholder="Ingrese su primer nombre" name="primernombreinfo" type="text" required="">
                </div>
                <div class="form-style-agile form-grids-w3l">
                    <label>Segundo nombre</label>
                    <input placeholder="Ingrese su segundo nombre" name="segundonombreinfo" type="text" required="">
                </div>
            </div>
            <div class="w3layouts-grids">
                <div class="form-style-agile form-grids-w3l">
                    <label>Tercer nombre</label>
                    <input placeholder="Ingrese su segundo apellido" name="tercernombreinfo" type="text" >
                </div>
                <div class="form-style-agile form-grids-w3l">
                    <label>Primer apellido</label>
                    <input placeholder="Ingrese su primer apellido" name="primerapellidoinfo" type="text" required="">
                </div>

            </div>
            <div class="w3layouts-grids">
                <div class="form-style-agile form-grids-w3l">
                    <label>Segundo apellido</label>
                    <input placeholder="Ingrese su segundo apellido" name="segundoapellidoinfo" type="text" >
                </div>
                <div class="form-style-agile form-grids-w3l">
                    <label>Apellido de casada</label>
                    <input placeholder="Ingrese su apellido de casada" name="casadainfo" type="text" >
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
                    <label>No. de telefono</label>
                    <input placeholder="ingrese su numero de telefono" name="telefono" type="text" minlength="8" maxlength="8" required="">
                </div>

            </div>

            <div class="form-style-agile">
                <label>Direccion </label>
                <input placeholder="Ingrese su direccion" name="direccion" type="text" required="">
            </div>

            <div class="form-style-agile">
                <label>Numero de Expediente</label>
                <select name="expe" id="expe" class="category"  required="">
                    <option value="0">Seleccione su Expediente</option>
                    <?php
                    while($row=$data2->fetch(PDO::FETCH_ASSOC)){
                        echo '<option value="'.$row['ID_NUMERO_EXPEDIENTE'].'">'.$row['CODIGO_EXPEDIENTE'].'</option>';
                        //print_r($row);
                    }
                    ?>
                </select>
            </div>





            <div class="form-style-agile">
                <label>Relacion Familiar</label>
                <select NAME="RelacionFam" class="category"  required="" >

                    <option value="Relacion Familiar">Seleccione la Relacion</option>
                    <?php
                    while($row=$data->fetch(PDO::FETCH_ASSOC)){
                        echo '<option value="'.$row['ID_RELACION_FAMILIAR'].'">'.$row['DESCRIPCION'].'</option>';
                        //print_r($row);
                    }
                    ?>
                </select>

                <div class="w3layouts-grids">
                    <input type="submit" name="submit" value="Continuar">
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