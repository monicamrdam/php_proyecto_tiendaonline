<?php
require_once("../config.php");
?>



<div class="col-lg-12 ">


    <h1 class="page-header">
        Usuarios

    </h1>
    <h3 class="bg-success">
    <?php display_message() ?>
  </h3>
    </p>

    
    <div class="col-md-12">
    <br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre usuario</th>
                    <th>Email</th>
                    <th>Contraseña</th>
                </tr>
            </thead>
            <tbody>
                <?php display_users(); ?>
            </tbody>
        </table> 

        <a href="admin.php?add_user" class="btn btn-primary">Añadir usuarios</a>


    </div>











</div>