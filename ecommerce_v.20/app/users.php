<?php
require_once("../config.php");
?>



<div class="col-lg-12 ">


    <h1 class="page-header">
        Usuarios

    </h1>
    <p class="bg-success">

    </p>

    <a href="admin.php?add_user" class="btn btn-primary">Añadir usuarios</a>
    
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


    </div>











</div>