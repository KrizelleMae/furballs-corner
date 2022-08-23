<?php

include "admin/actions/db_connect.php";
session_start();


function is_in_array($array, $key, $key_value){
    $within_array = 'no';
    foreach( $array as $k=>$v ){
      if( is_array($v) ){
          $within_array = is_in_array($v, $key, $key_value);
          if( $within_array == 'yes' ){
              break;
          }
      } else {
              if( $v == $key_value && $k == $key ){
                      $within_array = 'yes';
                      break;
              }
      }
    }
    return $within_array;
}
    
if ($_GET['action'] === "add_cart") {
    $product_id = $_POST['product_id'];
   

    $res = is_in_array($_SESSION['cart'], 'product_id', $product_id);

    if($res === 'yes'){
        echo "<script>alert('Already in cart')</script>";
        // header("location: bagview.php");
    } else {
    
        $stmt = $connect->prepare("SELECT * from product WHERE product_id = ?");
        $stmt->bind_param('i', $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $item = $result->fetch_array(MYSQLI_ASSOC);
        // $cart = array();
        $_SESSION['cart'][] = $item;     
        //array_push($_SESSION['cart'], $item);
        // echo json_encode($_SESSION['cart']);             
        echo "<script>alert('Item added to cart')</script>";
        header("location: bagview.php");
    }
    

    // $_SESSION['cart'][] = $item;


    // $sql = "INSERT INTO cart (product_id, quantity, price, user_id) VALUES ($product_id, $quantity,$price, $user_id)";
    
    //     if($connect->query($sql)) {
    //         echo "<script>alert('success')</script>";
    //         header("location: index.php");
    //     } else {
    //         echo "<script>alert('Failed')</script>";
    //     }
}


if ($_GET['action'] === "update_qty") {

    $data = json_decode(file_get_contents("php://input"));

    $product_id = $data->product_id;
    $cart_id =  $data->cart_id;
    $qty =  $data->qty;
                
}




?>