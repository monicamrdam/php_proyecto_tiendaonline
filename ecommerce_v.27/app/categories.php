<?php
add_category(); ?>
<h1 class="page-header">
    Categorias de productos

</h1>


<div class="col-md-4">

    <h3 class="bg-success">
        <?php display_message(); ?>
    </h3>

    <form action="" method="post">

        <div class="form-group">
            <label for="category-title">Id categoría</label>
            <input name="cat_id" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="category-title">Título categoría</label>
            <input name="cat_title" type="text" class="form-control">
        </div>

        <div class="form-group">

            <input name="add_category" type="submit" class="btn btn-primary" value="Añadir categoría">
        </div>


    </form>


</div>


<div class="col-md-8">

    <table class="table">
        <thead>

            <tr>
                <th>id</th>
                <th>Categoría</th>
            </tr>
        </thead>


        <tbody>
            <?php show_categories_in_admin(); ?>
        </tbody>

    </table>

</div>