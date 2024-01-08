<?php

//Auxiliary functions

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

//unset — Destroys one or more specified variables
function display_message()
{
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

//header — Send raw HTTP header
function redirect($location)
{
    return header("Location: $location ");
}

//mysqli::query -- mysqli_query — Perform a database query
function query($sql)
{
    global $connection;
    return mysqli_query($connection, $sql);
}

function confirm($result)
{
    global $connection;
    if (!$result) {
        die("Fallo en la query " . mysqli_error($connection));
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
Gets a row of results as an associative array, numeric, or both */

function fetch_array($result)
{
    return mysqli_fetch_array($result);
}





/****************************Admin menu Orders************************/

function display_orders()
{
    $query = query("SELECT * FROM orders");
    confirm($query);
    while ($row = fetch_array($query)) {
        $orders = <<<DELIMETER

            <tr>
                <td>{$row['order_transaction_id']}</td>
                <td>{$row['order_quantity']}</td>
                <td>{$row['order_amount']}</td>
                <td>{$row['order_status']}</td>
                <td><a class="btn btn-primary" href="admin.php?delete_order_id={$row['order_transaction_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
            </tr>

DELIMETER;
        echo $orders;

    }
}





/************************ Admin See products********************/


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



/************************ Admin Edit products ********************/


//To direct images to the uploads folder when updating them
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



/***************************Admin Add products********************/


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
        set_message("Nuevo producto con id {$last_id} ha sido añadido");
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





/*************************Admin Add categories ********************/

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
            set_message("Categoria creada.");
        }
    }
}



/************************Admin Users ***********************/

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

        set_message("Usuario creado.");

        redirect("admin.php?users");

    }

}











/****************************Front Catalog ************************/

/*Allows only the characters that I want to be displayed, with all cards being the same
And also don't cut off in the middle of a word
This is if it doesn't matter where it ends $string= substr($row['product_description'],0,150);
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


        $sort_text = cortar_string($row['product_description'], 150);
        $sort_text_tittle = cortar_string($row['product_title'], 30);
        $product_image = display_image($row['product_image']);

        $product = <<<DELIMETER

        <div class="col py-5 mx-5">
        <div class="card" style="width: 20rem;">
        <div class="card-body">
        <h5 class="text-center bg-dark text-white">{$row['short_desc']}</a></h5>
        <a href="item_catalog.php?id={$row['product_id']}"><img style="width: 18rem";" src="{$product_image}" alt=""></a>
        </div>
        <div class="card-body">
                  <div class="d-flex justify-content-between">
                  <h6 class="card-title "><a href="item_catalog.php?id={$row['product_id']}">$sort_text_tittle </a></h6>
                  <h6 class="card-title pull-right">{$row['product_price']} €</h6>
                </div>
                   <p class="card-text texto">
                   $sort_text...</p>
                   </p>
                <a class="btn btn-primary" href="../cart.php?add_catalog={$row['product_id']}">Añadir a carrito</a>
                          </div>
        </div>
    </div>
   
DELIMETER;
        echo $product;
    }
}


/****************************Front Merchandising ************************/

function get_merchandising()
{

    $query = query("SELECT * FROM merchandising");
    confirm($query);
    while ($row = fetch_array($query)) {

        $sort_text = cortar_string($row['merchand_description'], 150);
        $merchand_image = display_image($row['merchand_image']);

        $merchand = <<<DELIMETER

        <div class="col py-5 mx-5">
        <div class="card" style="width: 20rem;">
        <div class="card-body">
        <h5 class="text-center bg-dark text-white">{$row['merchand_short_desc']}</a></h5>
        <a  href="item_merchandising.php?id={$row['merchand_id']}"><img class="text-center" style="width: 18rem";" src="{$merchand_image}" alt=""></a>
        </div>
        <div class="card-body">
                  <div class="d-flex justify-content-between ">
                  <h6 class="card-title"><a href="item_merchandising.php?id={$row['merchand_id']}">{$row['merchand_title']}</a></h6>
                  <h6 class="card-title pull-right">{$row['merchand_price']} €</h6>
                </div>
                   <p class="card-text texto">
                   $sort_text...</p>
                   </p>
                <a class="btn btn-primary" href="../cart.php?add_merchandising={$row['merchand_id']}">Añadir a carrito</a>
                          </div>
        </div>
    </div>
   
DELIMETER;
        echo $merchand;
    }
}



/****************************Front login as Admin ************************/


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






/****************************Front contact************************/



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
            set_message("Lo sentimos, no pudimos enviar tu mensaje.");
            redirect("contact.php");
        } else {
            set_message("Tu mensaje ha sido enviado.");
            redirect("contact.php");
        }




    }




}







/************************I don't know if I will use it***********************/



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


