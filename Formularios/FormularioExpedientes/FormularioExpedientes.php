<?php

session_start();

include("../../BaseDatos/database_connection.php");

if(!isset($_SESSION['usuario']))   // Checking whether the session is already there or not if
    // true then header redirect it to the home page directly
{
    header("Location: ../../index.php");
}

$query = "SELECT * FROM proyecto.tb_tipo_ingreso;";

$data = $connect->prepare($query);    // Prepare query for execution
$data->execute();// Execute (run) the query

$query2 = "SELECT * FROM proyecto.tb_cat_destino_subsidio";

$data2 = $connect->prepare($query2);    // Prepare query for execution
$data2->execute();// Execute (run) the query

if(isset($_POST['submit']))
{
    if(isset($_POST['tipoproyecto'])) {
        $tipoproyecto = $_POST['tipoproyecto'];
    }
    if(isset($_POST['tiposubsidio'])) {
        $tiposubsidio = $_POST['tiposubsidio'];
    }
    if(isset($_POST['expediente'])) {
        $codigo = $_POST['expediente'];
    }

    if(isset($_POST['dateregistro'])) {
        $fecharegistro = $_POST['dateregistro'];
    }
    if(isset($_POST['Message'])) {
        $observaciones = $_POST['Message'];
    }
    if(isset($_POST['montosoli'])) {
        $montosolicitado = $_POST['montosoli'];
    }
    if(isset($_POST['latitud2'])) {
        $latitud = $_POST['latitud2'];
    }
    if(isset($_POST['longitud2'])) {
        $longitud= $_POST['longitud2'];
    }


    $query3 = "INSERT INTO proyecto.tb_expediente
(ID_TIPO_INGRESO,
ID_TIPO_SOILCITUD_SUBSIDIO,
CODIGO_EXPEDIENTE,
FECHA_REGISTRO,
OBSERVACIONES_EXPEDIENTE,
MONTO_SOLICITADO,
LONGITUD_PROYECTO,
LATITUD_PROYECTO)
VALUES(?,?,?,STR_TO_DATE(?,'%m/%d/%Y'),?,?,?,?)";

    $stm = $connect->prepare($query3);



    $stm->execute(array($_POST['tipoproyecto'],
        $_POST['tiposubsidio'],$_POST['expediente'],
        $_POST['dateregistro'],$_POST['Message'],
        $_POST['montosoli'],$_POST['longitud2'],
        $_POST['latitud2']));


    header("Location: ../Botones/Botones.php");

}



?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <title>Expedientes</title>
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
    <span>E</span>xpediente
    </h1>
<!-- //header -->
<!-- content -->
<div class="main-content-agile">
    <div class="sub-main-w3">
        <form action="#" method="post">

               <div class="form-style-agile">
                <label>Tipo de proyecto</label>
                   <select name="tipoproyecto" id="tiposubsidio" class="category"  required="">
                       <option value="0">Seleccione el Tipo de Proyecto</option>
                       <?php
                       while($row=$data->fetch(PDO::FETCH_ASSOC)){
                           echo '<option value="'.$row['ID_TIPO_INGRESO'].'">'.$row['DESCRIPCION_INGRESO'].'</option>';
                           //print_r($row);
                       }
                       ?>
                   </select>
               </div>

            <div class="form-style-agile">
                <label>Tipo de Subsidio</label>
                <select name="tiposubsidio" id="tiposubsidio" class="category"  required="">
                    <option value="0">Seleccione un Subsidio</option>
                    <?php
                    while($row=$data2->fetch(PDO::FETCH_ASSOC)){
                        echo '<option value="'.$row['ID_TIPO_SOILCITUD_SUBSIDIO'].'">'.$row['DESCRIPCION'].'</option>';
                        //print_r($row);
                    }
                    ?>
                </select>
            </div>

                   <div class="form-style-agile">
                       <label>Fecha de registro</label>
                       <input id="datepicker" placeholder="Fecha de registro" name="dateregistro" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}"
                              required="">
                   </div>
                   <div class="w3layouts-grids">
                       <div class="form-style-agile form-grids-w3l">
                           <label>Numero de Expediente</label>
                           <input placeholder="000" name="expediente" type="text" required="">
                       </div>
                       <div class="form-style-agile form-grids-w3l">
                       <label>Monto solicitado</label>
                       <input placeholder="Ingrese el monto que desea solicitar" name="montosoli" type="text" required="">
                       </div>
                   </div>
                   <div class="w3layouts-grids">
                       <div class="form-style-agile form-grids-w3l">
                           <label>Longitud</label>
                           <input placeholder="Ingrese la longitud" name="longitud2" type="text" required="">
                       </div>
                       <div class="form-style-agile form-grids-w3l">
                           <label>Latitud</label>
                           <input placeholder="Ingrese Latitud" name="latitud2" type="text" required="">
                       </div>

                   </div>


            <div class="form-style-agile">
                <label>Observaciones</label>
                <textarea name="Message" placeholder="Escriba las observaciones del proyecto" ></textarea>
            </div>



            <div class="w3layouts-grids">
                <input type="submit"  name="submit" value="Continuar"  >



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
