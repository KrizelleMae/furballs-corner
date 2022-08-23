<?php 

include 'components/header.php'; 
include 'admin/actions/db_connect.php';
session_start();
?>

<div class="loader">
    <img src="assets/dualball.gif" alt="Loading..." />
  </div>

  <?php
  if(!empty($_SESSION['user_id'])){
    $user_id = 0;
    $user_id = $_SESSION['user_id'];
 
      $stmt = $connect->prepare("SELECT * FROM product p INNER JOIN cart c ON p.product_id = c.product_id WHERE c.user_id = $user_id");
      $stmt->execute();
      $res = $stmt->get_result();
      // $data = $res->fetch_all();
     
        ?> 
  <div class="bag-view">
  <div class="bag-title">
    <h1>YOUR BAG</h1>
    <div class="bag-table">
    <div class="table-responsive">
    <table class="table table-bordered" >
      <thead>
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Subtotal</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_assoc($res)){ ?>
        <tr>
          <td><img src="admin/assets/images/stock/<?php echo $row['product_image'];?>" height="50px"> </td>
          <td><?php echo $row['product_name'];?></td>
          <td><?php echo $row['price'];?></td>
          <td><input type="number" id="qty" value="<?php echo $row['quantity'];?>" name="qty" style="height: 40px; padding: 10px; width: 80px" onchange="qty_change(<?php echo $row['cart_id'];?>, <?php echo $row['product_id'];?>)"> </td>
          <td><?php echo $row['price'] * $row['quantity'];?></td>
          <td></td>
        </tr>
        <tr>
          <td class="totalp" colspan="7"> </td>
        </tr>
        <?php 
        }
          } else {

            ?>

<div class="bag-view">
  <div class="bag-title">
    <h1>YOUR BAG</h1>
    <div class="bag-table">
    <div class="table-responsive">
    <table class="table table-bordered" >
      <thead>
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Subtotal</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
       
        <tr>
          <td>Nothing to show</td>
        </tr>
        <tr>
          <td class="totalp" colspan="7"> </td>
        </tr>
       
      </tbody>
    </table>
    </div>
    </div>
  </div>
</div>


        <?php
          }
        ?> 
      </tbody>
    </table>
    </div>
    </div>
  </div>
</div>

<script>
  function qty_change(cart_id, product_id) {
    let inputValue = document.getElementById("qty").value; 
    
      $.ajax({
        url: 'cart.php?action=update_qty',
        type: 'post',
        headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
        },
        data: { qty: inputValue, cart_id: cart_id, product_id: product_id },
        success: function(response){
            console.log(response);
        }
      });
      
  }


</script>

<script src=
"https://code.jquery.com/jquery-3.6.0.min.js">
    </script>
 <?php 
include('components/foot.php'); 
?>
<?php 
include('components/scripts.php'); 
?>
<?php
include('components/footer.php');
?> 