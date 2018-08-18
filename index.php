<?php
session_start();
session_destroy();
session_start();
//login.php

include("BaseDatos/database_connection.php");

if(isset($_SESSION['usuario']))   // Checking whether the session is already there or not if
    // true then header redirect it to the home page directly
{
    header("Location: index.php");
}

$message = '';

if(isset($_POST["login"]))
{

        $query = "SELECT * 
        FROM tb_usuarios 
        inner join
        tb_roles  
        on
        tb_usuarios.ID_ROL = tb_roles.ID_ROL
        inner join 
        tb_unidad_trabajo 
        on
        tb_usuarios.ID_UNIDAD= tb_unidad_trabajo.ID_UNIDAD_TRABAJO
        where
        LOGIN = :LOGIN";

        $statement = $connect->prepare($query);
        $statement->execute(array('LOGIN' => $_POST["username"]));
        $count = $statement->rowCount();
        if($count > 0)
        {
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                if(password_verify($_POST["Password"], $row["CLAVE"])) {
                    $_SESSION['usuario'] = $row['EMAIL'];
                    $_SESSION['rol'] = $row["DESCRIPCION_ROL"];


                    if ($_SESSION['rol'] == 'Usuario')
                    {
                        header("Location: Inicios/InicioUsuario/InicioUsuario.php");

                    }
                    if ($_SESSION['rol'] == 'Invitado')
                    {
                        header("Location: Inicios/InicioInvitado/InicioInvitado.php");

                    }
                    if ($_SESSION['rol'] == 'Administrador')
                    {
                        header("Location: Inicios/InicioAdministrador/InicioAdministrador.php");

                    }

                }

            }
        }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <style type="text/css">
        .crear{
            text-decoration: none;
            padding: 10px;
            font-weight: 600;
            font-size: 20px;
            font-weight: bold;
            color: #ffffff;
            background-color: #1883ba;
            border-radius: 6px;
            border: 2px solid #0016b0;
            width: 50px;
            text-align:center;
            height: 50px;
            line-height: 50px;
        }
    </style>





<title>Inicio de Sesion Web Developers</title>
<link href="css/font-awesome.css" rel="stylesheet"><!-- Font-awesome-CSS --> 
<link href="css/style.css" rel='stylesheet' type='text/css'/><!-- style.css --> 
<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Basic Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<script src="js/jquery.min.js"></script>
		<script>$(document).ready(function(c) {
		$('.alert-close').on('click', function(c){
			$('.main-agile').fadeOut('slow', function(c){
				$('.main-agile').remove();
			});
		});	  
	});
	</script>
</head>
<body>
	<h1>Login</h1>
	<div class="main-agile">
		<div class="alert-close"> </div>
		<div class="content-wthree">
		<div class="circle-w3layouts"></div>
			<h2>Iniciar Sesion</h2>
			<form action="#" method="post">
								<div class="inputs-w3ls">
									<i class="fa fa-user" aria-hidden="true"></i>
									<input type="text" name="username" placeholder="Usuario" />
								</div>
								<div class="inputs-w3ls">
									<i class="fa fa-key" aria-hidden="true"></i>
									<input type="password" name="Password" placeholder="Contraseña" />
								</div>
				<input type="submit" name="login" id="login"  value="Login" >
                <a class="crear" href="Formularios/FormularioUsuarios/FormularioUsuarios.php">Crear Usuario</a>


								</form>
		</div>
	</div>

	<div class="footer-w3l">
		<p class="agileinfo"> &copy; 2018 Basic Login Form. All Rights Reserved | Design by Web Developers</p>
	</div>
</body>




</html>

