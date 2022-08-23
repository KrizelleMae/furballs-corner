<?php 

include_once 'components/header.php'; 
?>

<?php 
include('connect.php'); 
include('components/conn.php'); 
include('admin/actions/db_connect.php');
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
                      <a href="category.php?category=<?php echo ($row['categories_name']);?>"> <img src="admin/assets/images/cat/<?php echo ($row['categories_image']);?>"></a>
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
         <h2>Clothes</h2>
     </div>
    <ul id="prod" class="probox">
    <?php
       
             $conn = $pdo->open();
             try{
               $stmt = $conn->prepare("SELECT * FROM product WHERE categories_id = 10 AND active = 1 AND status = 1");
               $stmt->execute();
               foreach($stmt as $row){
                ?>
                   <li class="items">
                   <div class="product-box">
                   <a href="product-details.php?product=<?php echo ($row['product_name']);?>"> <img src="admin/assets/images/stock/<?php echo ($row['product_image']);?>"></a>
                   </div>
                   <div class="product-details">
                   <h2> <?php echo ($row['product_name']);?></h2>
                   <div class="product-price">	
                         <span class="price">
                             P<?php echo ($row['rate']);?></span>                   
                     </div><!-- /.product-price -->
                   </div><!-- /.product-info -->
               </div><!-----END OF DETAILS---->

                 <?php if($row['quantity']>='1'){?>
                     <button  style="align-items:center;" type="submit" class="btn addcart"> Add to Bag</button>
                         <?php } else {?>
                             <button  style="align-items:center;" type="submit" class="btns "> Out of Stock</button>
                             <?php } ?>

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