<?php
require_once("config.php");
?>

<?php



if (isset($_GET['add'])) {
    $query = query("SELECT * FROM products Where product_id=" . escape_string($_GET['add']) . "");
    confirm($query);

    while ($row = fetch_array($query)) {
        if ($row['product_quantity'] != $_SESSION['product_' . $_GET['add']]) {
            $_SESSION['product_' . $_GET['add']] += 1;
            redirect("../ecommerce_v.22/app/catalog.php");
        } else {
            set_message("Solo tenemos  " . $row['product_quantity'] . " " . $row['product_title'] . " disponible");
            redirect("../ecommerce_v.22/app/catalog.php");
        }
    }


}



if (isset($_GET['add_icon'])) {
    $query = query("SELECT * FROM products Where product_id=" . escape_string($_GET['add_icon']) . "");
    confirm($query);

    while ($row = fetch_array($query)) {
        if ($row['product_quantity'] != $_SESSION['product_' . $_GET['add_icon']]) {
            $_SESSION['product_' . $_GET['add_icon']] += 1;
            redirect("../ecommerce_v.22/app/checkout.php");
        } else {
            set_message("Solo tenemos  " . $row['product_quantity'] . " " . $row['product_title'] . " disponible");
            redirect("../ecommerce_v.22/app/checkout.php");
        }
    }


}





if (isset($_GET['remove'])) {
    $_SESSION['product_' . $_GET['remove']]--;

    if ($_SESSION['product_' . $_GET['remove']] < 1) {
        unset($_SESSION['item_total']);
        unset($_SESSION['item_quantity']);
        redirect("../ecommerce_v.22/app/checkout.php");

    } else {
        redirect("../ecommerce_v.22/app/checkout.php");

    }

}

if (isset($_GET['delete'])) {
    $_SESSION['product_' . $_GET['delete']] = '0';
    unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);
    redirect("../ecommerce_v.22/app/checkout.php");

}


function cart()
{
    $total = 0;
    $item_quantity = 0;


    foreach ($_SESSION as $name => $value) {

        if ($value > 0) {

            if (substr($name, 0, 8) == "product_") {

                $length = strlen($name) - 8;
                $id = substr($name, 8, $length);


                $query = query("SELECT * FROM products WHERE product_id= " . escape_string($id) . " ");
                confirm($query);

                while ($row = fetch_array($query)) {
                    $sub = $row['product_price'] * $value;
                    $item_quantity += $value;
                    $product_image = display_image($row['product_image']);


                    $product = <<<DELIMETER
         <tr>
            <td class="align-middle">{$row['product_title']}<br>
            <img src="{$product_image}" style="width: 2rem;">
            </td>
            <td class="align-middle" >{$row['product_price']} €</td>
            <td class="align-middle" >{$value}</td>
            <td class="align-middle" >{$sub} €</td>              
            <td class="align-middle">
            <div class="bt-group">
            <button class="btn" type="button"><a class="btn btn-black" href="../cart.php?add_icon={$row['product_id']}"><i class="bi bi-cart-plus-fill" style="font-size: 20px;"></i>
            </a></button>
            <button class="btn" type="button" > <a class="btn btn-black" href="../cart.php?remove={$row['product_id']}"><i class="bi bi-cart-dash-fill" style="font-size: 20px;"></i></a>
            </button>
            <button class="btn" type="button"><a class="btn btn-black" href="../cart.php?delete={$row['product_id']}"><i class="bi bi-trash-fill" style="font-size: 20px;"></i></a>
            </button>
            </div>
            
            </td>
         </tr>
         DELIMETER;
                    echo $product;

                }

                $_SESSION['item_total'] = $total += $sub;
                $_SESSION['item_quantity'] = $item_quantity;

            }
        }
    }
}





function process_transaction()
{


    if (isset($_GET['tx'])) {

        $amount = $_GET['amt'];
        echo $amount;
        $currency = $_GET['cc'];
        echo $currency;
        $transaction = $_GET['tx'];
        echo $transaction;
        $status = $_GET['st'];
        echo $status;
        $total = 0;
        $item_quantity = 0;

        foreach ($_SESSION as $name => $value) {

            if ($value > 0) {

                if (substr($name, 0, 8) == "product_") {

                    $length = strlen($name - 8);
                    $id = substr($name, 8, $length);


                    $send_order = query("INSERT INTO orders (order_amount, order_transaction, order_currency, order_status ) VALUES('{$amount}', '{$transaction}','{$currency}','{$status}')");
                    $last_id = last_id();
                    confirm($send_order);



                    $query = query("SELECT * FROM products WHERE product_id = " . escape_string($id) . " ");
                    confirm($query);

                    while ($row = fetch_array($query)) {
                        $product_price = $row['product_price'];
                        $product_title = $row['product_title'];
                        $sub = $row['product_price'] * $value;
                        $item_quantity += $value;


                        $insert_report = query("INSERT INTO reports (product_id, order_id, product_title, product_price, product_quantity) VALUES('{$id}','{$last_id}','{$product_title}','{$product_price}','{$value}')");
                        confirm($insert_report);


                    }


                    $total += $sub;

                }

            }

        }

        session_destroy();
    } else {


        redirect("../ecommerce_v.22/app/landingpage.php");


    }



}



?>