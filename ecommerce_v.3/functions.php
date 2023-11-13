
<?php

//helper functions

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
    return mysli_real_scape_string($connection, $string);
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
                <img src="https://placehold.co/300x150" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title">Card title</h5>
                        <h5 class="card-title">{$row['product_price']}</h5>
                    </div>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        DELIMETER;

        echo $product;
    }


}



?>