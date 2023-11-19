<?php 
require_once("../config.php");
?>

<?php

if(isset($_GET['add'])){
  $query = query ("SELECT * FROM products Where id=".escape_string($_GET['add']). "");
  confirm($query);
  
  while($row=fetch_array($query)){
    if($row['product_quantity'] != $_SESSION['product_'.$_GET['add']]){
      $_SESSION['product_'.$_GET['add']] +=1;
      redirect("checkout.php");
    }else{
      set_message("We only have  ". $row['product_quantity']. " " .$row['product_title']. " available");
      redirect("checkout.php");
    }
  }


}

if(isset($_GET['remove'])){
  $_SESSION['product_'.$_GET['remove']]--;

  if($_SESSION['product_'.$_GET['remove']] <1){
    redirect("checkout.php");

  }else{
    redirect("checkout.php");

  }
    
}

if(isset($_GET['delete'])){
  $_SESSION['product_'.$_GET['delete']]='0';
  redirect("checkout.php");

}


function cart(){

  foreach ($_SESSION as $name => $value) {

  if($value >0) {
    if(substr($name, 0, 8)== "product_"){

      $length= strlen($name)-8;
      $id =substr($name, 8,$length);


      $query = query ("SELECT * FROM products WHERE id= ".escape_string($id)." ");
       confirm ($query);
       while ($row = fetch_array($query)){
         $product =<<<DELIMETER
         <tr>
         <td class="align-middle">{$row['product_title']}</td>
         <td class="align-middle" >$23</td>
         <td class="align-middle" >3</td>
         <td class="align-middle" >2</td>              
         <td class="align-middle">
         <div class="bt-group">
         <button class="btn" type="button"><a class="btn btn-black" href="cart.php?add={$row['id']}"><i class="bi bi-cart-plus-fill" style="font-size: 20px;"></i>
         </a></button>
         <button class="btn" type="button" > <a class="btn btn-black" href="cart.php?remove={$row['id']}"><i class="bi bi-cart-dash-fill" style="font-size: 20px;"></i></a>
         </button>
         <button class="btn" type="button"><a class="btn btn-black" href="cart.php?delete={$row['id']}"><i class="bi bi-trash-fill" style="font-size: 20px;"></i></a>
         </button>
         </div>
         
         </td>
         </tr>
         DELIMETER;
         echo $product;
     
     }
         }
  }
    

  }

}
?>