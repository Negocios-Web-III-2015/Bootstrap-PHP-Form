<?php
	if (isset($_POST["submit"])) {
		// Igualar los valores enviados desde el formulario de
		// contacto mediante el método POST
		$nombre = $_POST["contacto-nombre"];
		$email = $_POST["contacto-email"];
		$mensaje = $_POST["contacto-mensaje"];
		$humano = $_POST["contacto-humano"];
		$desde = "Bootstrap Formulario de contácto";
		$para = "negociosweb@unicah.edu";
		$titulo = "Mensaje nuevo desde la página de Bootstrap 101 - Negocios Web";
		$contenido = "Desde: $nombre\n Correo Electrónico: $email'\n Mensaje: $mensaje";

		// Verificar que el nombre haya sido enviado
		if (!$_POST["contacto-nombre"]) {
			$errorNombre = "Favor ingresar su nombre";
		}

		// Verificar que el email haya sido ingresado y sea válido
		if (!$_POST["contacto-email"] || !filter_var($_POST["contacto-email"], FILTER_VALIDATE_EMAIL)) {
			$errorEmail = "Favor ingrese una dirección de correo válida.";
		}

		// Verificar que un mensaje haya sido enviado
		if (!$_POST["contacto-mensaje"]) {
			$errorMensaje = "Favor ingrese un mensaje";
		}

		// Verificar que nuestra prueba anti-bot es correcta
		if ($_POST["contacto-humano"] != 7) {
			$errorHumano = "El anti-spam es incorrecto.";
		}

		// Si no existe ningún error, enviar el email
		/*if (!$errorNombre && !$errorEmail && !$errorMensaje && !$errorHumano) {
			if (mail($para, $titulo, $contenido)) {
				$resultado = '<div class="alert alert-success">Gracias, estaremos en contacto.</div>';
			} else {
				$resultado = '<div class="alert alert-danger">Error al momento de enviar el correo.</div>';
			}
		} */
	}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Negocios Web</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Hpja de estilos personalizada -->
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Google Web Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- Navegación -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Negocios Web</a>
        </div>
        <!-- Navegación -->
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#">Inicio</a></li>       
            <li><a href="#about">Acerca de</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Temas <b class="caret"></b></a>
              <ul class="dropdown-menu">
              <li class="dropdown-header">Dashboard</li>
                <li><a href="html5.html">HTML5</a></li>
                <li><a href="#">CSS3</a></li>
                <li><a href="#">JavaScript</a></li>
                <li class="divider"></li>
              </ul>
            </li>            
            <li><a href="#contacto" data-toggle="modal">Contáctenos</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <!-- Contenido -->
    <div class="container">
    	<h1>Contáctenos</h1>
    	<form class="form-horizontal" role="form" method="post" action="contacto.php">
              <div class="form-group">
                <label for="contacto-nombre" class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-10">
                  <?php if (isset($nombre)) : ?>
                  	<input type="text" class="form-control" id="contacto-nombre" name="contacto-nombre" placeholder="Nombre y Apellido" value="<?php echo $nombre ?>">
                  <?php else : ?>
                  	<input type="text" class="form-control" id="contacto-nombre" name="contacto-nombre" placeholder="Nombre y Apellido">
                  <?php endif; ?>
                  <?php if (isset($errorNombre)) : ?>
                  	<p class="text-danger"><?php echo $errorNombre ?></p>
                  <?php endif; ?>
                </div>
              </div>
              <div class="form-group">
                <label for="contacto-email" class="col-sm-2 control-label">Correo Electrónico</label>
                <div class="col-sm-10">
                  <?php if (isset($email)) : ?>
                  	<input type="text" class="form-control" id="contacto-email" name="contacto-email" placeholder="jconnor@skynet.com" value="<?php echo $email ?>">
                  <?php else : ?>
                  	<input type="text" class="form-control" id="contacto-email" name="contacto-email" placeholder="jconnor@skynet.com">
                  <?php endif; ?>
                  <?php if (isset($errorEmail)) : ?>
                  	<p class="text-danger"><?php echo $errorEmail ?></p>
                  <?php endif; ?>
                </div>
              </div>
              <div class="form-group">
                <label for="contacto-mensaje" class="col-sm-2 control-label">Mensaje</label>
                <div class="col-sm-10">
                  <?php if (isset($mensaje)) : ?>
                  	<textarea class="form-control" placeholder="Mensaje" name="contacto-mensaje" rows="5"><?php echo $mensaje ?></textarea>
                  <?php else : ?>
                  	<textarea class="form-control" placeholder="Mensaje" name="contacto-mensaje" rows="5"></textarea>
                  <?php endif; ?>
                  <?php if (isset($errorMensaje)) : ?>
                  	<p class="text-danger"><?php echo $errorMensaje ?></p>
                  <?php endif; ?>
                </div>
              </div>
              <div class="form-group">
                <label for="humano" class="col-sm-2 control-label">5 + 2 =</label>
                <div class="col-sm-10">
                  <?php if(isset($humano)) : ?>
                  	<input type="text" id="humano" class="form-control" name="contacto-humano" placeholder="Tu respuesta" value="<?php echo $humano ?>">
                  <?php else : ?>
                  	<input type="text" id="humano" class="form-control" name="contacto-humano" placeholder="Tu respuesta">
                  <?php endif; ?>
                  <?php if (isset($errorHumano)) : ?>
                  	<p class="text-danger"><?php echo $errorHumano ?></p>
                  <?php endif; ?>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                  <!-- Alerta para el usuario -->
                  <?php if (isset($resultado))
                  			echo $resultado;
                  ?>
                </div>
              </div>
              <div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<input id="submit" name="submit" type="submit" value="Enviar" class="btn btn-primary">
				</div>
			  </div>
            </div>
          </form>
    </div>

    <!-- Footer -->
    <div class="navbar navbar-inverse navbar-static-bottom" role="navigation">
      <div class="container">
        <div class="navbar-text pull-left">
          <p>© Negocios Web - UNICAH Campus Jesús Sacramentado</p>
          <p>III Período 2015</p>
        </div>
        <div class="navbar-text pull-right">
          <a href="#"><i class="fa fa-facebook-square fa-2x facebook"></i></a>
          <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
          <a href="#"><i class="fa fa-google-plus fa-2x"></i></a>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>