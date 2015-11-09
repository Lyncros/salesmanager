<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Okeefe - crm </title>

    <!-- CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="home">

    <nav class="navbar navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="icon icon-menu"></span>
          </button>
          <a class="navbar-brand" href="/">Okeefe - Inmobiliaria rural y urbana</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li <?php if ( CURRENT_SECTION == 'actividades' ) echo ' class="active"'; ?>><a href="index.php">Actividades</a></li>
            <li <?php if ( CURRENT_SECTION == 'contactos' ) echo ' class="active"'; ?>><a href="contactos.php">Contactos</a></li>
            <li><a href="#">Inmuebles</a></li>
          </ul>
          <form class="navbar-form pull-right">
            <input type="text" class="form-control" placeholder="Busqueda rapida...">
          </form>
          <a href="nuevo-contacto.php" class="btn-fix" data-toggle="tooltip" data-placement="left" title="Nuevo contacto">Nuevo contacto</a>
        </div>
      </div>
    </nav>