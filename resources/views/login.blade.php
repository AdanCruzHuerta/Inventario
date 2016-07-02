<!DOCTYPE html>
<html lang="es">
<head>
    <title>Acceso</title>
    <meta charset="UTF-8">
    <link rel="icon"  href="img/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">

</head>
<body>
<div class="container">
    <center><h1>Control de inventarios</h1></center>
    <div class="jumbotron boxlogin">
    <center><img src="img/surtidora.png" alt=""></center>
        <form action="/login" method="post" name="login" id="login">
            {{ csrf_field() }}
            <label for="">Usuario</label>
            <input type="email" name="email" id="user" class="form-control" required>
            <label for="">Contraseña</label>
            <input type="password" name="password" id="pass" class="form-control" required> 
            <input type="submit" class="btn btn-primary btn-block btn-lg" value="Iniciar sesión">
        </form>
    </div>
</div>

</body>
</html>