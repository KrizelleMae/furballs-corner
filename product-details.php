<?php 
include('components/header.php'); 
?>
<?php 
include('connect.php'); 
include('components/conn.php'); 
include('admin/actions/db_connect.php');
$productdetails=intval($_GET['productdetails']);
?>  
<div class="loader">
    <img src="assets/dualball.gif" alt="Loading..." />
</div>
<section>
<div class="prod-detail">
<?php
             
             $conn = $pdo->open();
             try{
               $stmt = $conn->prepare("SELECT * FROM product WHERE product_id ='$productdetails' AND active = 1 AND status = 1"); 
               $stmt->execute();
               foreach($stmt as $row){
                ?>
            <div class="details container">
              <div class="left">
                <div class="main">
                  <img src="admin/assets/images/stock/<?php echo ($row['product_image']);?>" alt=""/>
                </div>
              </div>
              <div class="right">
                <h1><?php echo ($row['product_name']);?></h1>
                <div> P<?php echo ($row['rate']);?>.00</div>
        
               
                  <?php if($row['quantity']>='1'){?>
                    <button  style="align-items:center;" type="submit" class="btn addcart"> Add to Bag</button>
                            <?php } else {?>
                                <button  style="align-items:center;" type="none" class="btns "> Out of Stock</button>
                                <?php } ?>
              
               
                <h2>Product Detail</h2><br>
                <p> <?php echo ($row['product_desc']);?></p>

                <div class=reviewarea>
                <h4>Add Reviews/Comment</h4>
                <textarea placeholder="type your reviews or comment here......."></textarea>
                <br><br>
                <a href="#" class="reviewbut">Post a Review</a>
                </div>
                
              </div>
            </div>
        </div>

        <?php }
                }
                catch(PDOException $e){
                  echo "There is some problem in connection: " . $e->getMessage();
                }

                $pdo->close();

              ?>


<section class="section-product">
    <div class="products" id="product">
    <?php


    $category=$row['category']; 

            $conn = $pdo->open();
            try{
            $stmt = $conn->prepare("SELECT categories_name FROM categories WHERE categories_id = '$category' ");
            $stmt->execute();
            foreach($stmt as $row){
            ?>
                <h2>RELATED PRODUCTS</h2>       
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
             
             $conn = $pdo->open();
             try{
               $stmt = $conn->prepare("SELECT * FROM product WHERE categories_id = '$subcategory'  AND active = 1 AND status = 1");
               $stmt->execute();
               foreach($stmt as $row){
                ?>
                   <li class="items">
                   <div class="product-box">
                   <a href="product-details.php?productdetails=<?php echo ($row['product_id']);?>"> <img src="admin/assets/images/stock/<?php echo ($row['product_image']);?>"></a>
                   </div>
                   <div class="product-details">
                   <h2> <?php echo ($row['product_name']);?></h2>
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
                                  
             <?php }
             }
             catch(PDOException $e){
               echo "There is some problem in connection: " . $e->getMessage();
             }

             $pdo->close();

           ?>
 

         </ul>
    </section>
</section>

<?php 
include('components/footer.php'); 
?>