<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/StyleADMIN.css?1.0">
    <!----Anexos----->
    <link rel="shortcut icon" href="../img/iconomascotas.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <title>CUISTAR</title>
</head>
<body>
    <!----Encabezado----->
    <header>
        <div class="container-flex1">
            <div class="caja1">
                <a href="../Inicio.php"><img src="../img/iconomascotas.png" alt="logo"></a>
                <h2>CUISTAR</h2>
            </div>
        </div>
    </header>
    <div class="welcome-container">
            <?php
            if (isset($_COOKIE) && isset($_COOKIE["administrador"])) {
                $usuario = $_COOKIE["administrador"];
                echo '<span>Administrador@ ' . $usuario . '</span>';
            } else {
                echo "La cookie 'cliente' no está definida";
            }
            ?>
          
        </div>
    <br>
    <main>
        <!----Bloues--modulos---->
        <div class="container-flex">
            <h2 class="T-M">Modulos</h2>
      
            <div class="cajas">
                <div class="C">
                    <img src="../img/lindo-perrito-haciendose-pasar-persona-negocios.jpg" alt="">
                    <h3>Ventas</h3>
                    <a href="./InterfazVENTAS.php"><button type="submit">Continuar</button></a>
                </div>
                <div class="C">
                    <img src="../img/coleccion-retratos-adorables-cachorros.jpg" alt="">
                    <h3>Inventario</h3>
                    <a href="../html/InterfazINVENTARIO.php"><button type="submit">Continuar</button></a>
                </div>
                <div class="C">
                    <img src="../img/mujer-buen-humor-sostiene-perro-riendo-sobre-fondo-rosa-chica-pelirroja-emocional-sudadera-capucha-gris-posa-corgi-aislado.jpg" alt="">
                    <h3>Fidelizacion</h3>
                    <a href="../php/CrudPQRS.php"><button type="submit">Continuar</button></a>
                </div>
                <div class="C">
                    <img src="../img/imgprovedores.jpeg" alt="">
                    <h3>Proveedores</h3>
                    <a href="../html/InterfazPROVEDORES.php"><button type="submit">Continuar</button></a>
                </div>
            </div>
        </div>

        <div class="welcome-container">
      
            <form action="../php/cerrar_sesion.php" method="post">
                <button type="submit">Salir</button>
            </form>
        </div>
    </main>
    <br>

    <!----Pie-de-pagina----->
    <footer>
        <div class="container-flex3">
            <h2>&copy; 2023 <b>CUISTAR</b> - Todos los Derechos Reservados.</h2>
            <h4 class="T-F">Info: Cuistar@gmail.com</h4>
        </div>
    </footer>
    <!------Anexo--js------>
</body>
</html>
