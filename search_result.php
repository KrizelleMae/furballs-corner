<?php 

include_once 'components/header.php'; 
$find="%{$_POST['product']}%";
?>

<?php 
include('connect.php'); 
include('components/conn.php'); 
include('admin/actions/db_connect.php');
$category=intval($_GET['category']);
?> 

<div class="loader">
    <img src="assets/dualball.gif" alt="Loading..." />
</div>
<section class="section-main">
            <h2>...</h2>

</section>
<section class="section-category">
<div class="categories" id="category">
         <h2>Categories</h2>
     </div>
    <ul id="cat" class="catbox">
    <li class="item">
            <div class="category-box">
                <a href="index.php">
                    <img src="assets/all.png"/>
                </a> 
                
            </div>
            <span>All</span>
    </li>
   
    <?php

                $conn = $pdo->open();
                try{
                  $stmt = $conn->prepare("SELECT * FROM categories WHERE categories_active = 1 AND categories_status = 1");
                  $stmt->execute();
                  foreach($stmt as $row){
                   ?>
                      <li class="item">
                      <div class="category-box">
                      <a href="category.php?category=<?php echo ($row['categories_id']);?>"> <img src="admin/assets/images/cat/<?php echo ($row['categories_image']);?>"></a>
                      </div>
                      <span><?php echo ($row['categories_name']);?></span>
                      </li>
                                     
                <?php }
                }
                catch(PDOException $e){
                  echo "There is some problem in connection: " . $e->getMessage();
                }

                $pdo->close();

              ?>
    
</ul>
</section>
    <section class="section-product">
    <div class="products" id="product">
    <?php

            $conn = $pdo->open();
            try{
            $stmt = $conn->prepare("SELECT categories_name FROM categories WHERE categories_id = '$category' ");
            $stmt->execute();
            foreach($stmt as $row){
            ?>
                
                <h2><?php echo htmlentities($row['categories_name']);?></h2>       
            <?php }
            }
            catch(PDOException $e){
            echo "There is some problem in connection: " . $e->getMessage();
            }

            $pdo->close();

            ?>
       
     </div>
    <ul id="prod" class="probox">
    <?php
$ret=mysqli_query($connect,"select * from product where product_name like '$find' and active = 1 and status = 1");
$num=mysqli_num_rows($ret);
if($num>0)
{
while ($row=mysqli_fetch_array($ret)) 
{?>	
                   <li class="items">
                   <div class="product-box">
                   <a href="product-details.php?productdetails=<?php echo ($row['product_id']);?>"> <img src="admin/assets/images/stock/<?php echo ($row['product_image']);?>"></a>
                   </div>
                   <div class="product-details">
                   <h2 > <?php echo ($row['product_name']);?></h2>
                   <div class="product-price">	
                         <span class="price">
                             P<?php echo ($row['rate']);?>.00</span>                   
                     </div><!-- /.product-price -->
                   </div><!-- /.product-info -->
               </div><!-----END OF DETAILS---->

                 <?php if($row['quantity']>='1'){?>
                     <button  style="align-items:center;" type="submit" class="btn addcart"> Add to Bag</button>
                         <?php } else {?>
                             <button  style="align-items:center;" type="submit" class="btns "> Out of Stock</button>
                             <?php } ?>

                   </li>
                                  
             <?php } } 

else {?>
	
    <div style="padding:5.5rem" class="col-sm-6 col-md-4 wow"> <h1>No Product Found</h1>
    </div>
    
<?php } ?>	
    
           
 

         </ul>
    </section>

 
<?php 
include('components/foot.php'); 
?>
<script src="admin/custom/js/product.js"></script>
<script src="js/echo.min.js"></script>
<?php 
include('components/scripts.php'); 
?>

<?php
include('components/footer.php');
?>