<?php

//Funciones auxiliares

/*mysqli::$insert_id -- mysqli_insert_id — 
Returns the value generated for an AUTO_INCREMENT column by the last query */
function last_id()
{
    global $connection;
    return mysqli_insert_id($connection);
}


function set_message($msg)
{
    if (!empty($msg)) {
        $_SESSION['message'] = $msg;
    } else {
        $msg = "";
    }
}

//unset — Destruye una o más variables especificadas
function display_message()
{
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

//header — Enviar encabezado sin formato HTTP
function redirect($location)
{
    return header("Location: $location ");
}

//mysqli::query -- mysqli_query — Realiza una consulta a la base de datos
function query($sql)
{
    global $connection;
    return mysqli_query($connection, $sql);
}

//mysqli::query -- mysqli_query — Realiza una consulta a la base de datos
function confirm($result)
{
    global $connection;
    if (!$result) {
        die("QUERY FALLO " . mysqli_error($connection));
    }
}

/*mysqli::real_escape_string -- mysqli_real_escape_string — 
Escapes special characters in a string for use in an SQL statement, 
taking into account the current charset of the connection */
function escape_string($string)
{
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

/*mysqli_result::fetch_array -- mysqli_fetch_array — 
Obtiene una fila de resultados como un array asociativo, numérico, o ambos */
function fetch_array($result)
{
    return mysqli_fetch_array($result);
}





/****************************Admin menú Ordenes************************/

function display_orders()
{
    $query = query("SELECT * FROM orders");
    confirm($query);
    while ($row = fetch_array($query)) {
        $orders = <<<DELIMETER

            <tr>
                <td>{$row['order_id']}</td>
                <td>{$row['order_amount']}</td>
                <td>{$row['order_transaction']}</td>
                <td>{$row['order_currency']}</td>
                <td>{$row['order_status']}</td>
                <td><a class="btn btn-primary" href="admin.php?delete_order_id={$row['order_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
            </tr>

DELIMETER;
        echo $orders;

    }
}





/************************ Admin Ver productos ********************/


function get_products_in_admin()
{
    $query = query(" SELECT * FROM products");
    confirm($query);

    while ($row = fetch_array($query)) {

        $category = show_product_category_title($row['product_category_id']);

        $product_image = display_image($row['product_image']);

        $product = <<<DELIMETER

        <tr>
            <td>{$row['product_id']}</td>
            <td><a href="admin.php?edit_product&id={$row['product_id']}">{$row['product_title']}</a><br>
                 <img width='100' src="{$product_image}" alt="">
            </td>
            <td>{$row['product_description']}</td>
            <td>{$row['short_desc']}</td>
            <td>{$category}</td>
            <td>{$row['product_price']}</td>
            <td>{$row['product_quantity']}</td>
             <td><a class="btn btn-primary" href="admin.php?delete_product_id={$row['product_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>

DELIMETER;

        echo $product;

    }

}



/************************ Admin Editar productos ********************/


//Para direccionar las imágenes a la carpeta uploads al actualizarlas
$upload_directory = "uploads";

function display_image($picture)
{
    global $upload_directory;
    return $upload_directory . DS . $picture;

}



function show_product_category_title($product_category_id)
{
    $category_query = query("SELECT * FROM categories WHERE cat_id = '{$product_category_id}' ");
    confirm($category_query);
    while ($category_row = fetch_array($category_query)) {
        return $category_row['cat_title'];

    }



}

function update_product()
{
    if (isset($_POST['update'])) {

        $product_title = escape_string($_POST['product_title']);
        $product_category_id = escape_string($_POST['product_category_id']);
        $product_price = escape_string($_POST['product_price']);
        $product_description = escape_string($_POST['product_description']);
        $short_desc = escape_string($_POST['short_desc']);
        $product_quantity = escape_string($_POST['product_quantity']);
        $product_image = escape_string($_FILES['file']['name']);
        $image_temp_location = escape_string($_FILES['file']['tmp_name']);


        if (empty($product_image)) {

            $get_pic = query("SELECT product_image FROM products WHERE product_id =" . escape_string($_GET['id']) . " ");
            confirm($get_pic);

            while ($pic = fetch_array($get_pic)) {

                $product_image = $pic['product_image'];

            }

        }

        move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $product_image);


        $query = "UPDATE products SET ";
        $query .= "product_title            = '{$product_title}'        , ";
        $query .= "product_category_id      = '{$product_category_id}'  , ";
        $query .= "product_price            = '{$product_price}'        , ";
        $query .= "product_description      = '{$product_description}'  , ";
        $query .= "short_desc               = '{$short_desc}'           , ";
        $query .= "product_quantity         = '{$product_quantity}'     , ";
        $query .= "product_image            = '{$product_image}'          ";
        $query .= "WHERE product_id=" . escape_string($_GET['id']);



        $send_update_query = query($query);
        confirm($send_update_query);
        set_message("Producto actualizado");
        redirect("admin.php?products");


    }


}



/***************************Admin añadir productos********************/


function add_product()
{
    if (isset($_POST['publish'])) {


        $product_title = escape_string($_POST['product_title']);
        $product_category_id = escape_string($_POST['product_category_id']);
        $product_price = escape_string($_POST['product_price']);
        $product_description = escape_string($_POST['product_description']);
        $short_desc = escape_string($_POST['short_desc']);
        $product_quantity = escape_string($_POST['product_quantity']);
        $product_image = escape_string($_FILES['file']['name']);
        $image_temp_location = escape_string($_FILES['file']['tmp_name']);

        move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $product_image);


        $query = query("INSERT INTO products(product_title, product_category_id, product_price, product_description, short_desc, product_quantity, product_image) VALUES('{$product_title}', '{$product_category_id}', '{$product_price}', '{$product_description}', '{$short_desc}', '{$product_quantity}', '{$product_image}')");
        $last_id = last_id();
        confirm($query);
        set_message("New Product with id {$last_id} was Added");
        redirect("admin.php?products");

    }

}

function show_categories_add_product_page()
{
    $query = query("SELECT * FROM categories");
    confirm($query);
    while ($row = fetch_array($query)) {


        $categories_options = <<<DELIMETER

         <option value="{$row['cat_id']}">{$row['cat_title']}</option>

    DELIMETER;

        echo $categories_options;

    }
}





/*************************Admin añadir categorias ********************/

function show_categories_in_admin()
{
    $category_query = query("SELECT * FROM categories");
    confirm($category_query);


    while ($row = fetch_array($category_query)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        $category = <<<DELIMETER
            <tr>
                <td>{$cat_id}</td>
                <td>{$cat_title}</td>
                <td><a class="btn btn-primary" href="./admin.php?delete_category_id={$row['cat_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
            </tr>
DELIMETER;

        echo $category;
    }
}


function add_category()
{

    if (isset($_POST['add_category'])) {

        $cat_id = escape_string($_POST['cat_id']);
        $cat_title = escape_string($_POST['cat_title']);

        if (empty($cat_title) || empty($cat_id) || $cat_title == " " || $cat_id == " ") {
            echo "<p class='bg-danger'>Esto no puede estar vacio</p>";
        } else {

            $insert_cat = query("INSERT INTO categories(cat_id, cat_title) VALUES('{$cat_id}','{$cat_title}') ");
            confirm($insert_cat);
            set_message("Categoria creada");
        }
    }
}



/************************Admin usuarios ***********************/

function display_users()
{
    $category_query = query("SELECT * FROM users");
    confirm($category_query);


    while ($row = fetch_array($category_query)) {

        $user_id = $row['user_id'];
        $username = $row['username'];
        $email = $row['email'];
        $password = $row['password'];

        $user = <<<DELIMETER

        <tr>
            <td>{$user_id}</td>
            <td><a href="admin.php?edit_user&id={$row['user_id']}">{$row['username']}</a><br>
            <td>{$email}</td>
            <td>{$password}</td>
            <td><a class="btn btn-primary" href="admin.php?delete_user_id={$row['user_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>

DELIMETER;

        echo $user;

    }

}


function add_user()
{
    if (isset($_POST['add_user'])) {


        $username = escape_string($_POST['username']);
        $email = escape_string($_POST['email']);
        $password = escape_string($_POST['password']);


        $query = query("INSERT INTO users(username,email,password) VALUES('{$username}','{$email}','{$password}')");
        confirm($query);

        set_message("Usuario creado");

        redirect("admin.php?users");

    }

}











/****************************Front Catálogo ************************/

/*Permite que solo se muestren los carácteres que yo quiero siendo todas las carts iguales
        Y además que no se corte en mitad de una palabra
        Esto es sino importa donde se acabe $string= substr($row['product_description'],0,150);
        */
function cortar_string($string, $largo)
{
    $marca = "<!--corte-->";

    if (strlen($string) > $largo) {

        $string = wordwrap($string, $largo, $marca);
        $string = explode($marca, $string);
        $string = $string[0];
    }
    return $string;

}


function get_products()
{
    $query = query(" SELECT * FROM products");
    confirm($query);
    while ($row = fetch_array($query)) {


        $textocortado = cortar_string($row['product_description'], 150);
        $product_image = display_image($row['product_image']);

        $product = <<<DELIMETER

        <div class="col py-5 mx-5">
        <div class="card" style="width: 20rem;">
        <div class="card-body">
        <h5 class="text-center bg-dark text-white">{$row['short_desc']}</a></h5>
        <a href="item.php?id={$row['product_id']}"><img style="width: 18rem";" src="{$product_image}" alt=""></a>
        </div>
        <div class="card-body">
                  <div class="d-flex justify-content-between ">
                  <h6 class="card-title"><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a></h6>
                  <h6 class="card-title pull-right">{$row['product_price']} €</h6>
                </div>
                   <p class="card-text texto">
                   $textocortado...</p>
                   </p>
                          <a class="btn btn-primary" target="_blank" href="../app/cart.php?add={$row['product_id']}">Añadir a carrito</a>
                          </div>
        </div>
    </div>
   
DELIMETER;
        echo $product;
    }
}





/****************************Front login como Admin ************************/


function login_user()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = escape_string($_POST['username']);
        //$email=escape_string($_POST['email']);
        $password = escape_string($_POST['password']);
        $query = query("SELECT * FROM users WHERE username='{$username}' AND password='{$password}'");
        confirm($query);


        if (mysqli_num_rows($query) == 0) {
            set_message("Tu usuario o password es erronea.");
            redirect("login.php");
        } else {
            $_SESSION['username'] = $username;
            redirect("admin.php");
        }
    }
}





/****************************Front contacto************************/



function send_message()
{

    if (isset($_POST['submit'])) {

        $to = "someEmailaddress@gmail.com";
        $from_name = $_POST['name'];
        $subject = $_POST['subject'];
        $email = $_POST['email'];
        $message = $_POST['message'];


        $headers = "From: {$from_name} {$email}";


        $result = mail($to, $subject, $message, $headers);

        if (!$result) {

            set_message("Sorry we could not send your message");
            redirect("contact.php");

        } else {

            set_message("Your Message has been sent");
            redirect("contact.php");
        }




    }




}















function count_all_records($table)
{
    return mysqli_num_rows(query('SELECT * FROM' . $table));
}

function count_all_products_in_stock()
{

    return mysqli_num_rows(query('SELECT * FROM products WHERE product_quantity >= 1'));
}




function get_products_with_pagination($perPage = "6")
{
    $rows = count_all_products_in_stock();

    if (!empty($rows)) {


        if (isset($_GET['page'])) { //get page from URL if its there
            $page = preg_replace('#[^0-9]#', '', $_GET['page']); //filter everything but numbers


        } else {
            $page = 1;
        }


        $lastPage = ceil($rows / $perPage);

        if ($page < 1) {
            $page = 1;
        } elseif ($page > $lastPage) {
            $page = $lastPage;
        }

        $middleNumbers = '';
        $sub1 = $page - 1;
        $sub2 = $page - 2;
        $add1 = $page + 1;
        $add2 = $page + 2;
        if ($page == 1) {
            $middleNumbers .= '<li class="page-item active"><a>' . $page . '</a></li>';
            $middleNumbers .= '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $add1 . '">' . $add1 . '</a></li>';
        } elseif ($page == $lastPage) {
            $middleNumbers .= '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $sub1 . '">' . $sub1 . '</a></li>';
            $middleNumbers .= '<li class="page-item active"><a>' . $page . '</a></li>';
        } elseif ($page > 2 && $page < ($lastPage - 1)) {
            $middleNumbers .= '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $sub2 . '">' . $sub2 . '</a></li>';
            $middleNumbers .= '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $sub1 . '">' . $sub1 . '</a></li>';
            $middleNumbers .= '<li class="page-item active"><a>' . $page . '</a></li>';
            $middleNumbers .= '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $add1 . '">' . $add1 . '</a></li>';
            $middleNumbers .= '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $add2 . '">' . $add2 . '</a></li>';
        } elseif ($page > 1 && $page < $lastPage) {
            $middleNumbers .= '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page= ' . $sub1 . '">' . $sub1 . '</a></li>';
            $middleNumbers .= '<li class="page-item active"><a>' . $page . '</a></li>';
            $middleNumbers .= '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $add1 . '">' . $add1 . '</a></li>';
        }

        $limit = 'LIMIT ' . ($page - 1) * $perPage . ',' . $perPage;
        $query2 = query(" SELECT * FROM products WHERE product_quantity >= 1 " . $limit);
        confirm($query2);
        $outputPagination = ""; // Initialize the pagination output variable

        if ($page != 1) {
            $prev = $page - 1;
            $outputPagination .= '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $prev . '">Back</a></li>';
        }

        $outputPagination .= $middleNumbers;

        if ($page != $lastPage) {
            $next = $page + 1;
            $outputPagination .= '<li class="page-item"><a class="page-link" href="' . $_SERVER['PHP_SELF'] . '?page=' . $next . '">Next</a></li>';
        }

        while ($row = fetch_array($query2)) {
            $product_image = display_image($row['product_image']);
            $product = <<<DELIMETER

<div class="col-sm-4 col-lg-4 col-md-4">
    <div class="thumbnail">
        <a href="item.php?id={$row['product_id']}"><img class="img-responsive" style="max-height: 250px; min-height: 250px"  src="../resources/{$product_image}" alt=""></a>
        <div class="caption">
            <h4 class="pull-right">&#36;{$row['product_price']}</h4>
            <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
            </h4>
            <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
             <p class="text-center"><a class="btn btn-primary" target="_blank" href="../resources/cart.php?add={$row['product_id']}">Add to cart</a>
             </a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a></p>
        </div>
    </div>
</div>

DELIMETER;
            echo $product;
        }

        echo "<div class='text-center' style='clear: both;' ><ul class='pagination' >{$outputPagination}</ul></div>";

    } else {



        echo "<h1 class='text-center'>No Products</h1>";
        echo "<br>";
        echo "<p class='text-center'>Create some products <a href='http://localhost:8888/ecom-paypal/public/admin/admin.php?add_product'>HERE</a></p>";

    }

}


















/************************No se utilizan ***********************/

function get_categories()
{


    $query = query("SELECT * FROM categories");
    confirm($query);

    while ($row = fetch_array($query)) {


        $categories_links = <<<DELIMETER

<a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>


DELIMETER;

        echo $categories_links;
    }

}





function get_products_in_cat_page()
{
    $query = query(" SELECT * FROM products WHERE product_category_id = " . escape_string($_GET['id']) . " AND product_quantity >= 1 ");
    confirm($query);

    while ($row = fetch_array($query)) {

        $product_image = display_image($row['product_image']);

        $product = <<<DELIMETER


            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="../resources/{$product_image}" alt="">
                    <div class="caption">
                        <h3>{$row['product_title']}</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

DELIMETER;

        echo $product;
    }

}



function get_products_in_shop_page()
{


    $query = query(" SELECT * FROM products WHERE product_quantity >= 1 ");
    confirm($query);

    while ($row = fetch_array($query)) {

        $product_image = display_image($row['product_image']);

        $product = <<<DELIMETER


            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="../resources/{$product_image}" alt="">
                    <div class="caption">
                        <h3>{$row['product_title']}</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

DELIMETER;

        echo $product;


    }


}





/************************No se si se utilizaran ***********************/






function get_reports()
{


    $query = query(" SELECT * FROM reports");
    confirm($query);

    while ($row = fetch_array($query)) {


        $report = <<<DELIMETER

        <tr>
             <td>{$row['report_id']}</td>
            <td>{$row['product_id']}</td>
            <td>{$row['order_id']}</td>
            <td>{$row['product_price']}</td>
            <td>{$row['product_title']}
            <td>{$row['product_quantity']}</td>
            <td><a class="btn btn-danger" href="./admin.php?delete_report_id={$row['report_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>

DELIMETER;

        echo $report;


    }





}


//////// SLIDES ////////

function add_slides()
{

    if (isset($_POST['add_slide'])) {


        $slide_title = escape_string($_POST['slide_title']);
        $slide_image = escape_string($_FILES['file']['name']);
        $slide_image_loc = escape_string($_FILES['file']['tmp_name']);


        if (empty($slide_title) || empty($slide_image)) {

            echo "<p class='bg-danger'>This field cannot be empty</p>";


        } else {



            move_uploaded_file($slide_image_loc, UPLOAD_DIRECTORY . DS . $slide_image);

            $query = query("INSERT INTO slides(slide_title, slide_image) VALUES('{$slide_title}', '{$slide_image}')");
            confirm($query);
            set_message("Slide Added");
            redirect("admin.php?slides");





        }


    }

}
function get_current_slide()
{


}

function get_current_slide_in_admin()
{

    $query = query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
    confirm($query);

    while ($row = fetch_array($query)) {

        $slide_image = display_image($row['slide_image']);

        $slide_active_admin = <<<DELIMETER



    <img class="img-responsive" src="../../resources/{$slide_image}" alt="$slide_image">



DELIMETER;

        echo $slide_active_admin;


    }



}


function get_active_slide()
{

    $query = query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");


    confirm($query);

    while ($row = fetch_array($query)) {

        $slide_image = display_image($row['slide_image']);

        $slide_active = <<<DELIMETER


 <div class="item active">
    <img style="height: 450px"  class="slide-image" src="../resources/{$slide_image}" alt="$slide_image">
</div>


DELIMETER;

        echo $slide_active;


    }
}

function get_slides()
{

    $query = query("SELECT * FROM slides");
    confirm($query);

    while ($row = fetch_array($query)) {

        $slide_image = display_image($row['slide_image']);

        $slides = <<<DELIMETER
 <div class="item">
    <img style="height: 450px"  class="slide-image" src="../resources/{$slide_image}" alt="$slide_image">
</div>
DELIMETER;

        echo $slides;


    }


}
function get_slide_thumbnails()
{

    $query = query("SELECT * FROM slides ORDER BY slide_id ASC ");
    confirm($query);

    while ($row = fetch_array($query)) {

        $slide_image = display_image($row['slide_image']);

        $slide_thumb_admin = <<<DELIMETER


<div class="col-xs-6 col-md-3 image_container">
    
    <a href="admin.php?delete_slide_id={$row['slide_id']}">
        
         <img  class="img-responsive slide_image" src="../../resources/{$slide_image}" alt="$slide_image">

    </a>

    <div class="caption">
       <p>{$row['slide_title']}</p>
    </div>


</div>


    



DELIMETER;

        echo $slide_thumb_admin;


    }



}
