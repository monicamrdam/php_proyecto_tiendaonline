<?php
require_once("../config.php");
?>

<?php
include(FRONT . DS . "header.php");
?>

<!--Image Carousel-->
<div id="carouselExample" class="carousel slide mt-5">
  <div class="carousel-inner">
    <div class="carousel-item active" style="max-height: 350px;">
      <img src="../resources/img/RollingStones.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" style="max-height: 350px;">
      <img src="../resources/img/HeroesSilencio.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" style="max-height: 350px;">
      <img src="../resources/img/extremoduro.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" style="max-height: 350px;">
      <img src="../resources/img/OrejaVanGogh.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" style="max-height: 350px;">
      <img src="../resources/img/StevieNicks.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" style="max-height: 350px;">
      <img src="../resources/img/taylorSwift.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" style="max-height: 350px;">
      <img src="../resources/img/lp.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" style="max-height: 350px;">
      <img src="../resources/img/depecheMode.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>

  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<!--Menu Carousel -->
<div class="container_fluid bg-light mt-5 text-center">
  <div class="row">
    <div class="col">Pago seguro</div>
    <div class="col">Garantía de devolución</div>
    <div class="col">Envío gratis para Socios </div>
  </div>

</div>

<!--About -->
<div class="container mt-5">
  <h2 class="text-center bg-dark text-white py-2">Sobre nosotros</h2>
  <div class="row">
    <div class="col py-2 ">
      <p class="texto">
        Discolandia somos una plataforma online de venta física de discos y merchandising. Con más de 40.000 clientes
        activos, somos una de las primeras plataformas de venta de discos por detrás de grandes plataformas como Amazon
        o El Corte Inglés.</p>
      <p class="texto">
        Con envíos a todo el mundo y seguimiento en tiempo real, ofrecemos a bandas y artistas una plataforma donde
        vender su música y productos a sus fans creando un espacio dedicado y exclusivo dentro de nuestra web
        completamente GRATIS.</p>
    </div>
    <div class="col">
      <div class="col">
        <p class="texto">
          Es una tienda especializada sobretodo en vinilos, ya sean novedades, ediciones limitadas, picture disc,
          vinilos de colores, así como rarezas, LP’s descatalogados, LP’s de coleccionistas, etc.</p>
        </p>
        <p class="texto">
          Sabemos que algunos sois más clásicos, otros más modernos, pero a todos nos gusta la música, por eso, también
          en nuestra tienda disponemos del soporte CD.</p>
      </div>
    </div>
  </div>
</div>
</div>

<?php
include(FRONT . DS . "footer.php");
?>