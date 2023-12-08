<?php
require_once("../config.php");
?>

<?php
include(BACK . DS . "header.php");
?>

<?php
if (!isset($_SESSION['username'])) {

    redirect("../app/landingpage.php");
}
?>

<div id="page-wrapper">

    <div class="container-fluid">



        <?php
        //if($_SERVER['REQUEST_URI'] == "/ecommerce/ecommerce_v.12/app/admin/" || $_SERVER['REQUEST_URI'] == "/ecommerce/ecommerce_v.11/app/admin.php")  {
        if ($_SERVER['REQUEST_URI'] == "/ecommerce/ecommerce_v.21/app/admin.php") {
            include(ADMIN . "/admin_content.php");

        }

        //Tabla: orders 
        if (isset($_GET['orders'])) {
            include(ADMIN . "../orders.php");
        }
        if (isset($_GET['delete_order_id'])) {
            include(ADMIN . "/delete_order.php");
        }




        //Tabla: products 
        if (isset($_GET['products'])) {
            include(ADMIN . "/products.php");
        }
        if (isset($_GET['edit_product'])) {
            include(ADMIN . "/edit_product.php");
        }
        if (isset($_GET['delete_product_id'])) {
            include(ADMIN . "/delete_product.php");
        }
        if (isset($_GET['add_product'])) {
            include(ADMIN . "/add_product.php");
        }




        //Tabla: categories 
        if (isset($_GET['categories'])) {
            include(ADMIN . "/categories.php");
        }
        if (isset($_GET['delete_category_id'])) {
            include(ADMIN . "/delete_category.php");
        }


        //Tabla: users
        if (isset($_GET['users'])) {
            include(ADMIN . "../users.php");
        }
        if (isset($_GET['add_user'])) {
            include(ADMIN . "/add_user.php");
        }
        if (isset($_GET['edit_user'])) {
            include(ADMIN . "/edit_user.php");
        }
        if (isset($_GET['delete_user_id'])) {
            include(ADMIN . "/delete_user.php");
        }


        // Tabla: reports 
        if (isset($_GET['reports'])) {
            include(ADMIN . "/reports.php");
        }
        if (isset($_GET['delete_report_id'])) {
            include(ADMIN . "/delete_report.php");
        }
        ?>




    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->




<?php
include(BACK . DS . "footer.php");
?>