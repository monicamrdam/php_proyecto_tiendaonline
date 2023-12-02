
<?php

//helper functions

function last_id(){

    global $connection;
    
    return mysqli_insert_id($connection);
    
    
    }
    
function set_message($message){
    if(!empty($message)){
        $_SESSION['message']=$message ;
    }else{
        $message ="";
    }

}


function display_message(){
    if(isset($_SESSION['message'])){
        echo  $_SESSION['message'];
        //unset — Destruye una o más variables especificadas
        unset( $_SESSION['message']);
    }
}



//redirige a la página indicada
function redirect($location){
    header("Location: $location");

}



function query($sql){
    global $connection;
    return mysqli_query($connection, $sql);
}




function confirm($result){
    global $connection;
    if(!$result){
        die ("Query failed".mysqli_error($connection));
    }
}


//Se utiliza para evitar la inyección SQL en lugares como los formularios
function escape_string($string){
    global $connection;
    return  mysqli_real_escape_string($connection, $string);
}


function fetch_array($result){
    return mysqli_fetch_array($result);
}



//get products

function get_products(){
   
    $query = query("SELECT * FROM products");
    //confirmamos que la query es correcta
    confirm($query); 

    while($row= fetch_array($query )){
        $product =<<<DELIMETER
        <div class="col py-5">
            <div class="card" style="width: 18rem;">
                <a href="product.php?id={$row['id']}"><img src="{$row['products_image']}" class="card-img-top" alt="..."></a>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title"><a href='product.php?id={$row['id']}'>{$row['product_title']}</a></h5>
                        <h5 class="card-title">{$row['product_price']}€</h5>
                    </div>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a class="btn btn-primary target="_blank" href="cart.php?add={$row['id']}">Añadir a carrito</a>
                </div>
            </div>
        </div>
        DELIMETER;

        echo $product;
    }


}

//get categories no se ha utilizado aún 

function get_categories(){

    $query= query( "SELECT * FROM categories");
    confirm($query);

    while ($row = fetch_array($query)){
        $category_link =<<<DELIMETER
        <a href='category.php?id={$row['id']}'>{$row['cat_title']}</a>

        
        DELIMETER;

        echo $category_link;
    }

}





function get_products_in_shop_page(){
    $query= query( "SELECT * FROM products" );
    confirm($query);
  
    while ($row = fetch_array($query)){
        $product =<<<DELIMETER
        <div class="col py-5">
            <div class="card" style="width: 18rem;">
                <a href="product.php?id={$row['id']}"><img src="{$row['products_image']}" class="card-img-top" alt="..."></a>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title"><a href='product.php?id={$row['id']}'>{$row['product_title']}</a></h5>
                        <h5 class="card-title">{$row['product_price']}€</h5>
                    </div>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a class="btn btn-primary target="_blank" href="product.php?id={$row['id']}">Añadir a carrito</a>
                </div>
            </div>
        </div>
        DELIMETER;

        echo $product;
    }
}


function login_user() {

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username=escape_string($_POST['username']);
        //$email=escape_string($_POST['email']);
        $password=escape_string($_POST['password']);
        $query = query("SELECT * FROM users WHERE username='{$username}' AND password='{$password}'")  ;
        confirm( $query );
   
       
   
       if (mysqli_num_rows($query)==0){
            set_message("Tu email o password es erronea.");
            redirect("login.php");
       }else{
        $_SESSION['username'] = $username;
           redirect("admin.php");
       }
        
      }
    }


    function send_message(){

        if($_SERVER["REQUEST_METHOD"]=="POST"){

            $to="someEmailaddreess@gmail.com";
            $name=escape_string($_POST['name']);
            $email=escape_string($_POST['email']);
            $subject=escape_string($_POST['subject']);
            $message=escape_string($_POST['message']);


            $headers = "From: {$name} {$email}";
            $result= mail($to, $subject, $message, $headers);

            if(!$result){
                //set_message ("El mensaje no ha podido ser enviado");

                //Esto esta aquí solo porque es local y alli no funciona la funcion mail
                set_message ("Tu mensaje ha sido enviado");
                redirect("contact.php");

            }else{
                //Online tiene que estar aquí para que la función mail funcione
                set_message ("Tu mensaje ha sido enviado");
                redirect("contact.php");


            }
            
        
            
          }
        }




//Back end functions
function display_orders(){



    $query = query("SELECT * FROM orders");
    confirm($query);
    
    
    while($row = fetch_array($query)) {
    
    
    $orders = <<<DELIMETER
    
    <tr>
        <td>{$row['order_id']}</td>
        <td>{$row['order_amount']}</td>
        <td>{$row['order_transaction']}</td>
        <td>{$row['order_currency']}</td>
        <td>{$row['order_status']}</td>
        <td><a class="btn btn-danger" href="admin.php?delete_order_id={$row['order_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>
    
    
    
    
    DELIMETER;
    
    echo $orders;
    
    
    
        }
    
    
    
    }
    
?>