<?php include_once("conexion.php")?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/InterfasPQRS.css?1.1">
    <!----Anexos----->
    <link rel="shortcut icon" href="../img/iconomascotas.png"type="image/x-icon">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <title>CUISTAR</title>
</head>
<body>
    <!----Encabezado----->
    <header>
        <div class="container-flex1">
            <div class="caja1">
                <img src="../img/iconomascotas.png" alt="logo">
                <h2>CUISTAR</h2>
            </div>
            <div class="caja2">
                    <nav>
                        <a href="../Inicio.php">Inicio</a>
                       
                        <a href="InterfazEstado.php">Estado(PQRS)</a>
                        <a href="../html/InterfasFDN.html">Volver</a>
                    </nav>
            </div>
        </div>
    </header>
    <br>
    <main>
        <!----Formulario----->
        <div class="container-flex2">
            <div class="formularioPQRS">
            <h2><img src="../img/iconomascotas.png" alt="logo" width="90" style="vertical-align: middle; margin-right: 10px;"/> Solicitud</h2>

                <form target="_self" action="registro.php" method="post">
                    <select name="tipo" required>
                        <option disabled selected>Elija una opcion...</option>
                        <option value="solicitud">Solicitud</option>
                        <option value="queja">Queja</option>
                        <option value="reclamo">Reclamo</option>
                        <option value="sugerencia">Sugerencia</option>
                    </select>
                    <input type="hidden" name="estado" value="En espera" required>
                    <label for="">Numero de documento:</label>
                    <input type="text" placeholder="Escriba su numero de documento" name="documento" required>
                    <label for="">Nombres:</label>
                    <input type="text" placeholder="Escriba sus nombres" name="nombre" required>
                    <label for="">Apellidos:</label>
                    <input type="text" placeholder="Escriba sus apellidos" name="apellido" required>
                    <label for="">Correo Electronico:</label>
                    <input type="email" placeholder="name@example.com" name="correo" required>
                    <label for="">Asunto:</label>
                    <textarea name="asunto" rows="10" placeholder="Esriba su asunto"  required></textarea>
                    <input  class="file" type="file" name="archivo" enctype="multipart/form-data">
                    <button type="submit" name="">Enviar</button>
                </form>
            </div>
            <div class="imagenformulario">
                <img src="../img/lindo-mascota-collage-aislado.jpg" alt="">
            </div>
        </div>
    </main>
    <br>
    <!----Pie-de-pagina----->
    <footer>
        <div class="container-flex3">
            <h2>&copy; 2023 <b>CUISTAR</b> - Todos los Derechos Reservados.</h2>
            <h3>Info: Cuistar@gmail.com</h3>
        </div>
    </footer>
</body>
</html>