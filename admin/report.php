<?php require_once 'includes/header.php';
      require_once 'includes/navbar.php';
?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-table">
			<div class="panel-heading">
				<i class="fa fa-arrow-circle-o-down panelhead"></i>	Order Report
			</div>
			<!--end of panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="actions/getOrderReport.php" method="post" id="getOrderReportForm">
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Start Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date"end of >
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-2 control-label">End Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date"end of >
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Generate Report</button>
				    </div>
				  </div>
				</form>

			</div>
			<!--end of panel-body -->
		</div>
	</div>
	<!--end of col-dm-12 -->
</div>
<!--end of row -->

<script src="custom/js/report.js"></script>

<?php require_once 'includes/footer.php'; ?>