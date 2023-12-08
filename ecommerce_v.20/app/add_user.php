<?php add_user(); ?>
<h1 class="page-header">
    Añadir usuario
</h1>



<form action="" method="post" enctype="multipart/form-data">

    <div class="col-md-6">


        <div class="form-group">
            <label for="username">Nombre usuario</label>
            <input type="text" name="username" class="form-control">

        </div>


        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control">

        </div>




        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" class="form-control">

        </div>

        <div class="form-group">

            <input type="submit" name="add_user" class="btn btn-primary pull-right" value="Añadir usuario">

        </div>




    </div>



</form>