<?php
require('../config.php');
require('../librerias/db_mysql.php');
$conn=db_open();

$num_por_pagina=8;  // Items por página
$pagina=isset($_GET['p']) ? $_GET['p'] : 1; // Obtenemos el número de la página

$total=db_query($conn, "select count(*) as total from juegos")[0]['total'];  // Obtenemos el total

$num_paginas=ceil($total/$num_por_pagina);  // Obtenemos el número de páginas
$offset=($pagina-1)*$num_por_pagina;

$juegos = db_query($conn, "SELECT juegos.id, juegos.nombre, juegos.precio, juegos.codigo_barras, juegos.cantidad, juegos.genero_id, generos.nombre AS genero_nombre
                           FROM juegos
                           JOIN generos ON juegos.genero_id = generos.id
                           LIMIT $num_por_pagina OFFSET $offset");

$generos=db_query($conn, "SELECT * from generos LIMIT $num_por_pagina OFFSET $offset");

db_close($conn);
?>

<!DOCTYPE html>
<html lang="es">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Andrei's Shop - Shop Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-lugx-gaming.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <?php require("plantilla.php");?>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>BLOG</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="section trending">
    <div class="container">
          
      <div class="row trending-box">
        <?php foreach($juegos as $juego): ?>
          <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 adv">
            <div class="item">
              <div class="thumb">
                <img height="220px" width="300px" src="../admin/imagenes/<?php echo $juego['id']?>.jpg" alt="">
              </div>
              <div class="down-content">
                <span class="category"><?php echo $juego['genero_nombre']?></span>
                <h4><?php echo $juego['nombre']?></h4>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
      </div>
        <div class="row">
          <div class="col-lg-12">
            <ul class="pagination">
              <?php for($i=1; $i<=$num_paginas; $i++): ?>
                <li class="<?php echo $i==$pagina?'is_active':'' ?>">
                  <a href="?p=<?php echo $i?>"><?php echo $i?></a>
                </li>
              <?php endfor;?>
            </ul>
          </div>
        </div>
    </div>
  </div>
  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>Realizado por Munteanu Popa Andrei Alexandro del curso ASIR 2º</a></p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>

  </body>
</html>