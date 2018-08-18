<?php
session_start();
if(!isset($_SESSION["usuario"]))
{
    header("location: ../../index.php");
}


include("../../BaseDatos/database_connection.php");
$query = "SELECT tb_cat_departamento.ID_DEPARTAMENTO,
    tb_cat_departamento.DESCRIPCION_DEPARTAMENTO
FROM proyecto.tb_cat_departamento order by
DESCRIPCION_DEPARTAMENTO asc";

$data = $connect->prepare($query);    // Prepare query for execution
$data->execute();// Execute (run) the query


$query2 = "SELECT * FROM proyecto.tb_desarrolladores";

$data2 = $connect->prepare($query2);    // Prepare query for execution
$data2->execute();// Execute (run) the query


if(isset($_POST['submit']))
{
    if(isset($_POST['proyecto'])) {
        $proyecto = $_POST['proyecto'];
    }
    if(isset($_POST['cbx_municipio'])) {
        $muni = $_POST['cbx_municipio'];
    }
    if(isset($_POST['montosoli'])) {
        $soli = $_POST['montosoli'];
    }

    if(isset($_POST['date'])) {
        $fecha = $_POST['date'];
    }
    if(isset($_POST['Message'])) {
        $observaciones = $_POST['Message'];
    }
    if(isset($_POST['monto'])) {
        $monto = $_POST['monto'];
    }
    if(isset($_POST['latitud'])) {
        $latitud = $_POST['latitud'];
    }
    if(isset($_POST['longitud'])) {
        $longitud= $_POST['longitud'];
    }
    if(isset($_POST['desarrollador'])) {
        $desa= $_POST['desarrollador'];
    }

    $query3 = "INSERT INTO proyecto.tb_cat_proyectos
(ID_MUNICIPIO_PROYECTO,
ID_DESARROLLADOR,
NOMBRE_PROYECTO,
LONGITUD_PROYECTO,
LATITUD_PROYECTO,
MONTO_APROXIMADO_PROYECTO,
MONTO_SOLICITADO_PROYECTO,
FECHA_INICIO_TRABAJOS,
INFORMACION_ADICIONAL)
VALUES(?,?,?,?,?,?,?,STR_TO_DATE(?,'%m/%d/%Y'),?)";

    $stm = $connect->prepare($query3);

    $stm->execute(array($muni,
       $desa,$proyecto,$longitud,
        $latitud,$monto,
        $soli,$fecha,
       $observaciones));

    header("Location: ../Requisitos/Requisitos.php");

}

?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <title>Catalogo de Proyectos</title>
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
    <span>C</span>atalogo
    <span>D</span>e
    <span>P</span>royectos</h1>
<!-- //header -->
<!-- content -->
<div class="main-content-agile">
    <dv class="sub-main-w3">
        <form action="#" method="post">
            <div class="form-style-agile">
                <label>Nombre del Proyecto</label>
                <input placeholder="Ingrese el Nombre" name="proyecto" type="text" required="">
            </div>



            <div class="w3layouts-grids">
                <div class="form-style-agile form-grids-w3l">
                    <label>Fecha de Inicio de Trabajo</label>
                    <input id="datepicker" placeholder="Fecha Inicio" name="date" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}"
                           required="">
                </div>

                <div class="form-style-agile form-grids-w3l">
                    <label>Monto Aproximado del Proyecto</label>
                    <input placeholder="Ingrese el monto" name="monto" type="text" required="">
                </div>

            </div>

            <div class="w3layouts-grids">
            <div class="form-style-agile form-grids-w3l">

                    <label>Desarrollador que Desea</label>
                <select name="desarrollador" id="desarrollador" class="category"  required="">
                    <option value="0">Desarrollador</option>
                    <?php
                    while($row=$data2->fetch(PDO::FETCH_ASSOC)){
                        echo '<option value="'.$row['ID_DESARROLLADOR'].'">'.$row['NOMBRE_DESARROLLADOR'].'</option>';
                        //print_r($row);
                    }
                    ?>
                </select>


            </div>
                <div class="form-style-agile form-grids-w3l">
                    <label>Monto Solicitado del Proyecto</label>
                    <input placeholder="Ingrese el monto" name="montosoli" type="text" required="">
                </div>
            </div>

            <div class="w3layouts-grids">
                <div class="form-style-agile form-grids-w3l">
                    <label>Longitud</label>
                    <input placeholder="Ingrese la longitud" name="longitud" type="text" required="">
                </div>
                <div class="form-style-agile form-grids-w3l">
                    <label>Latitud</label>
                    <input placeholder="Ingrese Latitud" name="latitud" type="text" required="">
                </div>

            </div>

            <div class="w3layouts-grids">
                <div class="form-style-agile form-grids-w3l">
                <label>Departamento</label>
                <select name="cbx_departamento" id="cbx_departamento">
                    <option value="0">Seleccionar Departamento</option>
                    <?php
                    while($row=$data->fetch(PDO::FETCH_ASSOC)){
                        echo '<option value="'.$row['ID_DEPARTAMENTO'].'">'.$row['DESCRIPCION_DEPARTAMENTO'].'</option>';
                    }
                    ?>
                </select>

            </div>





                <div class="form-style-agile form-grids-w3l">
        <label>Municipio:</label>
        <select name="cbx_municipio" id="cbx_municipio"></select>

    </div>
    </div>

            <div class="form-style-agile">
                <label>Otra Información que considere importante</label>
                <textarea name="Message" placeholder="Escriba la informacion..." required=""></textarea>
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

<script language="javascript">
    $(document).ready(function(){
        $("#cbx_departamento").change(function () {


            $("#cbx_departamento option:selected").each(function () {
                id_departamento = $(this).val();
                $.post("getMunicipio.php", { id_departamento: id_departamento }, function(data){
                    $("#cbx_municipio").html(data);
                });
            });
        })
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
