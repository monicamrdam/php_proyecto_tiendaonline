<?php
require_once("../config.php");
?>

<?php
include(FRONT . DS . "header.php");
?>

<div class="container-fluid py-5">
    <div class="row">


        <?php
        $query = query(" SELECT * FROM merchandising  WHERE merchand_id = " . escape_string($_GET['id']) . " ");
        confirm($query);
        while ($row = fetch_array($query)):
            $category = show_product_category_title($row['merchand_category_id']);
            ?>


            <div class="col-md-12 ">
                <div class="row">

                    <div class="col-md-2">
                    </div>

                    <div class="col-md-5 ">
                        <img class="img-responsive" style="width: 21rem;"
                            src="<?php echo display_image($row['merchand_image']); ?>" alt="">
                    </div>


                    <div class="col-md-2">
                        <div class="card text-center" style="width: 18rem; ">
                            <div class="card-body ">
                                <h4 class="bg-black text-white">Título:
                                    <?php echo $row['merchand_title']; ?>
                                </h4>
                                <br>
                                <h6 class="text-info">
                                    <?php echo $row['merchand_price']; ?> €
                                </h6>
                                <br>
                                <br>
                                <h6>Interprete:
                                    <?php echo $row['merchand_short_desc']; ?>
                                </h6>
                                <h6>Categoría:
                                    <?php echo $category ?>
                                </h6>
                                <br>
                                <br>
                                <form action="">
                                    <div class="form-group">
                                        <a href="../cart.php?add_merchandising=<?php echo $row['merchand_id']; ?>"
                                            class="btn btn-primary">Añadir a carrito</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 py-5">
                    <div class="row">

                        <div class="card">

                            <div class="card-body ">
                                <h4 class="bg-black text-white">Descripcion: </h4>
                                <br>
                                <h6>
                                    <?php echo $row['merchand_description']; ?>
                                </h6>
                                <br>

                            </div>

                        </div><!-- col-md-9 ends here -->


                    <?php endwhile; ?>

                </div>
                <!-- /.container -->
                <?php
                include(FRONT . DS . "footer.php");
                ?>