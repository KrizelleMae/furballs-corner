<?php require_once 'includes/header.php';
      require_once 'includes/navbar.php';
?>

<?php 

$sql = "SELECT * FROM product WHERE status = 1";
$query = $connect->query($sql);
$countProduct = $query->num_rows;

$orderSql = "SELECT * FROM orders WHERE order_status = 1";
$orderQuery = $connect->query($orderSql);
$countOrder = $orderQuery->num_rows;



$lowStockSql = "SELECT * FROM product WHERE quantity <= 3 AND status = 1";
$lowStockQuery = $connect->query($lowStockSql);
$countLowStock = $lowStockQuery->num_rows;

$connect->close();

?>


<style type="text/css">
	.ui-datepicker-calendar {
		display: none;
	}
</style>

<!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">


<div class="row">
	
<div class="col-md-4">
		<div class="panel panel-card-low">
			<div class="panel-heading">
				<a href="product.php" style="text-decoration:none;color:#fff;">
					<span style="font-size:2rem;" class="badge pull pull-right badge-low"><?php echo $countLowStock; ?></span>	
					<i class="fa fa-cube"></i>
				</a>
				<h4>Low Stock</h4>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
	</div> <!--/col-md-4-->

	<div class="col-md-4">
			<div class="panel panel-card-over">
			<div class="panel-heading">
				<a href="orders.php?o=manord" style="text-decoration:none;color:#fff;">
					
					<span style="font-size:2rem;" class="badge pull pull-right badge-over"><?php echo $countOrder; ?></span>
					<i class="fa fa-clipboard"></i>
				</a>
					<h4>Orders</h4>
			</div> <!--/panel-hdeaing-->
	  </div> <!--/panel-->
	</div> <!--/col-md-4-->

	<div class="col-md-4">
		<div class="panel panel-card-total">
			<div class="panel-heading">
				
				<a href="product.php" style="text-decoration:none;color:#fff;">
					
					<span style="font-size:2rem;" class="badge pull pull-right badge-total"><?php echo $countProduct; ?></span>	
					<i class="fa fa-cubes"></i>
				</a>
				<h4>Products</h4>
				
			</div> <!--/panel-hdeaing-->
		</div> <!--/panel-->
	</div> <!--/col-md-4-->

	<div class="col-md-4">
			<div class="panel panel-card-incoming">
			<div class="panel-heading">
				<a href="orders.php?o=manord" style="text-decoration:none;color:#fff;">
					
					<span style="font-size:2rem;" class="badge pull pull-right badge-incoming"><?php echo 0; ?></span>
					<i class="fa fa-inbox"></i>
				</a>
					<h4>Incoming Orders</h4>
			</div> <!--/panel-hdeaing-->
	  </div> <!--/panel-->
	</div> <!--/col-md-4-->

	<div class="col-md-4">
		
	</div> <!--/col-md-4-->


	<div class="col-md-4">
			<div class="panel panel-card-report">
			<div class="panel-heading">
				<a href="" style="text-decoration:none;color:#fff;">
					
					<span  class=" pull-right badge-report"> <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> Generate Report</button>
				    </div>
				  </div></span>
					<i class="fa fa-arrow-circle-o-down"></i>
				</a>
					<h4>Monthly Report</h4>
			</div> <!--/panel-hdeaing-->
	  </div> <!--/panel-->
	</div> <!--/col-md-4-->



	

	




<script type="text/javascript">
	$(function () {
			// top bar active
	$('#navDashboard').addClass('active');

      //Date for the calendar events (dummy data)
      var date = new Date();
      var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear();

      $('#calendar').fullCalendar({
        header: {
          left: '',
          center: 'title'
        },
        buttonText: {
          today: 'today',
          month: 'month'          
        }        
      });


    });
</script>

<?php require_once 'includes/footer.php'; ?>