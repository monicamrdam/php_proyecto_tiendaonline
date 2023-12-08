<?php
require_once("../config.php");
?>

<?php
include(FRONT . DS . "header.php");
?>


<div class="container-fluid mt-5">
  <div class="row align-items-start">
    <?php get_products() ?>

    <!--primera fila-->

    <div class="container">
      <div class="row align-items-start">
        <div class="col py-5">
          <div class="card" style="width: 18rem;">
            <img src="https://placehold.co/300x150" class="card-img-top" alt="...">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <h5 class="card-title">Card title</h5>
                <h5 class="card-title">0</h5>
              </div>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col py-5">
          <div class="card" style="width: 18rem;">
            <img src="https://placehold.co/300x150" class="card-img-top" alt="...">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <h5 class="card-title">Card title</h5>
                <h5 class="card-title">0</h5>
              </div>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col py-5">
          <div class="card" style="width: 18rem;">
            <img src="https://placehold.co/300x150" class="card-img-top" alt="...">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <h5 class="card-title">Card title</h5>
                <h5 class="card-title">0</h5>
              </div>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col py-5">
          <div class="card" style="width: 18rem;">
            <img src="https://placehold.co/300x150" class="card-img-top" alt="...">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <h5 class="card-title">Card title</h5>
                <h5 class="card-title">0</h5>
              </div>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- segunda fila-->

    <?php
    include(FRONT . DS . "footer.php");
    ?>