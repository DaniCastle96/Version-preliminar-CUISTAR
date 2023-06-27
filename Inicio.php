<style>
  .container-catalogo {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }
  

</style>

<?php
include_once("php/conexion.php");
$productos = "SELECT * FROM productos";
$resultado = mysqli_query($conexion, $productos);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href=".//css/StyleINDEX.css?1.0">
  <!----Anexos----->
  <link rel="shortcut icon" href="img/iconomascotas.png"type="image/x-icon">
  <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
  <title>CUISTAR</title>
</head>
<body>
  <!--------------------------------Encabezado---------------------------------------------------->
  <header>
    <a class="logo" target="_blank">
      <img src="img/iconomascotas.png" alt="logo"/>
      <h2 class="Nombre Empresa">CUISTAR</h2>
      <div class="barra-de-busqueda">
        <input type="text" name="Search" placeholder="Buscar.." class="src">
      </div>
      <nav>
        <a href="html/InterfasFDN.html" class="nav-link"><img src="img/fidelizacion.png"></a>
        <a href="inicio.php" class="nav-link"><img src="img/inicio.png"></a>
        <a href="html/Error500.html" class="nav-link"><img src="img/carro-de-la-carretilla.png"></a>
        <a href="./html/caso_de_uso.html" class="nav-link"><img src="img/casos.png"></a>
        <a href="./html/integrantes.html" class="nav-link"><img src="img/presentacion.png"></a>
        <a href="./html/InterfazLOGIN.html" class="nav-link"><img src="img/usuario.png"></a>
      </nav>
    </a>
  </header>
  <!--------------------------------Carrusel Publicidad---------------------------------------------------->
  <div class="slider-frame">
    <ul>
        <li><img src="img/anuncio1.1.jpg" alt=""></li>
        <li><img src="img/anuncio2.2.jpg" alt=""></li>
        <li><img src="img/anuncio3.jpg" alt=""></li>
        <li><img src="img/anuncio4.1.jpg" alt=""></li>
    </ul>
  </div>
  <!--------------------------------Catalogo Productos Destacados---------------------------------------------------->
  <div class="Titulo"><img src="img/favorito.png">Productos Destacados<img src="img/favorito.png"></div>
  <br>
  <div class="container-catalogo">
    <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
      <div class="caja <?php echo $row["id"]; ?>">
      <img src="img/<?php echo $row['imagen']; ?>">
        <p><?php echo $row["nombre_producto"]; ?></p>
        <p><?php echo $row["precio"]; ?></p>
       
        <a href="./php/formularioagregarventa.php?id=<?php echo $row["id"]; ?>" class="btn-comprar">Comprar</a>
      </div>
    <?php } ?>
  </div>
   
  <!--------------------------------Items Principales Productos---------------------------------------------------->
  <div class="imagenes-container">
    <div class="imagen">
      <a href="html/InterfazMEDICAMENTOS.html">
      <img src="img/medicamento.png" alt="Medicamentos"/>
      </a>
      <span class="nombre">
        <span class="text">Medicamentos</span>
      </span>
    </div>
    <div class="imagen">
      <a href="html/InterfazCOMGATOS.html">
      <img src="img/Comida para gatos.png" alt="Comida para gatos"/>
      </a>
      <span class="nombre">
        <span class="text">Comida para gatos</span>
      </span>
    </div>
    <div class="imagen">
      <a href="html/InterfazCOMPERROS.html">
      <img src="img/comida para perros.png" alt="Comida para perros"/>
      </a>
      <span class="nombre">
        <span class="text">Comida para perros</span>
      </span>
    </div>
    <div class="imagen">
      <a href="./html/InterfazJUGEPERROS.html">
      <img src="img/juguetes.png" alt="Juguetes"/>
    </a>
      <span class="nombre">
        <span class="text">Juguetes</span>
      </span>
    </div>
    <div class="imagen">
      <a href="html/InterfazACCESORIOS.html">
      <img src="img/accesorios.png" alt="Accesorios"/>
    </a>
      <span class="nombre">
        <span class="text">Accesorios</span>
      </span>
    </div>
    <div class="imagen">
      <a href="html/Error404.html">
      <img src="img/Ropamascotas.png" alt="Ropa"/>
    </a>
      <span class="nombre">
        <span class="text">Ropa</span>
      </span>
    </div>
  </div>
  <!--------------------------------Fidelizacion---------------------------------------------------->
  <div class="Titulo"><img src="img/favorito.png">Te ofrecemos beneficios únicos<img src="img/favorito.png"></div>
  <br>
  <div class="ContainerFidelizacion">
    <div class="F1">
      <a href="html/Error404.html">
        <img src="img/perro-gracioso-dando-pata-mujer-concepto-amistad-perro-humano.jpg"/>
      </a>
      <p>
        Queremos hacerte sentir especial.
      </p>
    </div>
    <div class="F2">
      <a href="html/Error404.html">
        <img src="img/dogo-frances-toma-paseo-concepto-encantador-animal-animal-domestico.jpg"/>
      </a>
      <P>
        No te pierdas nuestras ofertas exclusivas.
      </P>
    </div>
    <div class="F3">
      <a href="html/Error404.html">
        <img src="img/lindo-pequeno-bulldog-frances-negro-estudio.jpg"/>
      </a>
      <P>
        Nos importa tu opinión.
      </P>
    </div>
  </div>
  <br>
  <div class="DescuentoVector">
    <div class="Vector">
    <a href="html/Error404.html">
      <img src="img/DESCUENTO12.jpg">
    </a>
  </div>
  </div>
  <br>
  <!--------------------------------Pie de Pagina---------------------------------------------------->
  <footer class="pie-pagina">
    <div class="grupo-1">
        <div class="box">
            <figure>
                <a href="Inicio.php">
                    <img src="imG/iconomascotas.png" alt="Logo CUISTAR">
                </a>
            </figure>
        </div>
        <div class="box">
            <h2>SOBRE NOSOTROS</h2>
            <p>Somos una empresa dedicado a la venta de productos para mascotas como alimentos, juguetes, snacks, cepillos, medicamentos y accesorios para mascotas en general.</p>
            <p>Contribuimos a crear un mundo mejor, ayudando a amar y proteger a sus mascotas. </p>
        </div>
        <div class="box">
            <h2>SIGUENOS</h2>
            <div class="red-social">
                <a href="https://es-la.facebook.com/" class="fa fa-facebook"></a>
                <a href="https://www.instagram.com/" class="fa fa-instagram"></a>
                <a href="https://twitter.com/?lang=es" class="fa fa-twitter"></a>
                <a href="https://www.youtube.com/" class="fa fa-youtube"></a>
            </div>
        </div>
    </div>
    <div class="grupo-2">
        <small>&copy; 2023 <b>CUISTAR</b> - Todos los Derechos Reservados.</small>
    </div>
</footer>
</body>
</html>
