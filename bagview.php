<?php 

include 'components/header.php'; 
include 'admin/actions/db_connect.php';
session_start();
?>

<div class="loader">
    <img src="assets/dualball.gif" alt="Loading..." />
  </div>

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
        <?php 
        

        if(!empty($_SESSION['cart'])) {
         
          foreach($_SESSION['cart'] as $key => $val) {
       
          
        ?>
       
        <tr>
            <td style="text-transform: capitalize"><?php echo $key = $val['product_name']; ?></td>
            <td style="text-transform: capitalize"><?php echo $val['product_desc']; ?></td>
            <td style="text-transform: capitalize"><?php echo $val['rate']; ?></td>
            <td style="text-transform: capitalize">
              <input type="number" value="1" id="<?php echo $val['product_id']; ?>" style="height: 40px; padding: 10px; width: 80px" onchange="qty_change(<?php echo $val['product_id']; ?>, <?php echo $val['product_id']; ?>, <?php echo $val['rate']; ?>)">
          </td> 
            <td style="text-transform: capitalize" ><b id="<?php echo $val['product_id']; ?>"> </b></td>

            <td><b ><?php echo $val['product_id']; ?></b></td>
        </tr>
        

        <?php } }?>
       
      </tbody>
    </table>
    </div>
    </div>
  </div>
</div>
      </tbody>
    </table>
    </div>
    </div>
  </div>
</div>

<script>
  function qty_change(input, key, rate) { 

    let inputValue = document.getElementById(key).value;
    let total = inputValue * rate;

    document.getElementById("12").innerHTML = "total";
    // console.log(total);
    
   
    
      // $.ajax({
      //   url: 'cart.php?action=update_qty',
      //   type: 'post',
      //   headers: {
      //   'Accept': 'application/json',
      //   'Content-Type': 'application/json'
      //   },
      //   data: { qty: inputValue, cart_id: cart_id, product_id: product_id },
      //   success: function(response){
      //       console.log(response);
      //   }
      // });

      
      
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