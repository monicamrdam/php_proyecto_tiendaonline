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
    unset( $_SESSION['item_total']);
    unset( $_SESSION['item_quantity']);
    redirect("checkout.php");

  }else{
    redirect("checkout.php");

  }
    
}

if(isset($_GET['delete'])){
  $_SESSION['product_'.$_GET['delete']]='0';
  unset( $_SESSION['item_total']);
  unset( $_SESSION['item_quantity']);
  redirect("checkout.php");

}


function cart(){
  $total =0;
  $item_quantity=0;


  foreach ($_SESSION as $name => $value) {

  if($value >0) {

    if(substr($name, 0, 8)== "product_"){

      $length= strlen($name)-8;
      $id =substr($name, 8,$length);


      $query = query ("SELECT * FROM products WHERE id= ".escape_string($id)." ");
       confirm ($query);

       while ($row = fetch_array($query)){
        $sub=$row['product_price'] * $value;
       $item_quantity += $value;


         $product =<<<DELIMETER
         <tr>
         <td class="align-middle">{$row['product_title']}</td>
         <td class="align-middle" >{$row['product_price']} €</td>
         <td class="align-middle" >{$value}</td>
         <td class="align-middle" >{$sub} €</td>              
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
         
     $_SESSION['item_total']= $total += $sub;
     $_SESSION['item_quantity'] = $item_quantity;


         }
  }
    

  }

}
?>