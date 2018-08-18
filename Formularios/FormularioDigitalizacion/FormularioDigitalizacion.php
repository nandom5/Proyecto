<?php  session_start();

error_reporting(0);
//index.php
include("../../BaseDatos/database_connection.php");

if(!isset($_SESSION["usuario"]))
{
    header("location: ../../index.php");
}

if(isset($_POST['myfile'])) {
    $tipo = $_POST['myfile'];
}

$query = "SELECT * FROM proyecto.tb_tipo_digitalizacion";

$data = $connect->prepare($query);    // Prepare query for execution
$data->execute();// Execute (run) the query

$currentDir = '../../BaseDatos/Documentacion' ;
$uploadDirectory = '\uploads';

$errors = []; // Store all foreseen and unforseen errors here

$fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions

$fileName = $_FILES['myfile']['name'];
$fileSize = $_FILES['myfile']['size'];
$fileTmpName  = $_FILES['myfile']['tmp_name'];
$fileType = $_FILES['myfile']['type'];
$fileExtension = strtolower(end(explode('.',$fileName)));


$uploadPath = $currentDir . $uploadDirectory . basename($fileName);



if(isset($_POST['submit']))
{
    if(isset($_POST['tipo'])) {
        $tipo = $_POST['tipo'];
    }


    if (!in_array($fileExtension, $fileExtensions)) {
        $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
    }

    if ($fileSize > 2000000) {
        $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
    }

    if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
            echo "The file " . basename($fileName) . " has been uploaded";
            header("Location: ../Aplicacionaprobada/AplicacionAprobada.php");
        } else {
            echo "An error occurred somewhere. Try again or contact the admin";
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "These are the errors" . "\n";
        }
    }




    $query3 = "INSERT INTO proyecto.tb_digitalizacion
(ID_INFORMACION_SOLICITANTE,
ID_TIPO_DIGITALIZACION,
PATH_ARCHIVO)
values
( (SELECT ID_INFORMACION_SOLICITANTE
FROM tb_informacion_personas_involucradas
ORDER by ID_INFORMACION_SOLICITANTE DESC
LIMIT 1),?,?)";

    $stm = $connect->prepare($query3);


    $stm->execute(array($tipo,$uploadPath));

}

?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <title>Digitalizacion</title>
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
    <span>D</span>igitalización

<!-- //header -->
<!-- content -->
<div class="main-content-agile">
    <div class="sub-main-w3">
        <form action="#" method="post"   enctype="multipart/form-data">





            <div class="form-style-agile">
                <label><h1>Tipo de archivo que desea adjuntar</h1></label>
                <select name="tipo" id="tipo" class="category"  required="">
                    <option value="0">Archivo a Subir</option>
                    <?php
                    while($row=$data->fetch(PDO::FETCH_ASSOC)){
                        echo '<option value="'.$row['ID_TIPO_DIGITALIZACION'].'">'.$row['DESCRIPCION'].'</option>';
                        //print_r($row);
                    }
                    ?>
                </select>
            </div>

            <div class="form-style-agile">
                <input style="color:rgb(255,255,255);" type="file" name="myfile" id="fileToUpload">

            </div>
            <div class="form-style-agile">
            <input type="submit" name="submit" value="Adjuntar Archivo" >
            </div>



        </form>
    </div>
</div>
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
