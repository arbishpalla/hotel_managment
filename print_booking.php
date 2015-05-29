
	<?php
	session_start();
	
	include 'headers/session.php';
	include 'headers/connect_to_mysql.php';	
		
	$room_no = "";
	$bed_no = "";
	$start_date = "";
	$end_date = "";
	$customer_name = "";
	$phone_no = "";
	$email = "";
	$comment = "";
	$total_discount = "";
	$total_price = "";
	$formAction = "";
	$startDate = "";
	$endDate = "";
	$form_name = "";
	$room_id = "";
	$booking_id = "";
	$bookin_no = "";
	$roomNO = "";
	
	$query_emp = "SELECT name FROM login where emp_id = '$emp_id'"
	or die ('error while fetching emp name');
	$result = mysqli_query($con,$query_emp);
	$row = mysqli_fetch_array($result);
	$name = $row['name'];
	
	
			
				$booking_no = $_GET['booking_no'];
				// query for get boking value before post start here
				$query_detail = "SELECT * FROM booking where booking_no = '$booking_no'"
				or die ('error while fetching data from booking');
				$result_detail = mysqli_query($con,$query_detail);
				$row = mysqli_fetch_assoc($result_detail);
				 	
					$room_id = $row['room_id'];
					$emp_id= $row['emp_id'];
					$room_no = $row['room_no'];
					$bed_no = $row['bed_no'];
					$customer_name = $row['customer_name'];
					$phone_no = $row['phone_no'];
					$startDate = $row['start_date'];
					$endDate = $row['end_date'];
					$email = $row['email'];
					$comment = $row['comment'];
					$total_discount = $row['total_discount'];
					$total_price = $row['total_price'];
					$booking_id  = $row['booking_id'];		
				

	?>
	
	
	<!DOCTYPE html>
	<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
	<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
	<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
	<!-- BEGIN HEAD -->
	
	<!-- Mirrored from thevectorlab.net/adminlab/editable_table.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:58:54 GMT -->
	<head>
	   <meta charset="utf-8" />
	   <title>Add Booking</title>
	   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	   <meta content="" name="description" />
	   <meta content="" name="author" />
	   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	   <link href="css/style.css" rel="stylesheet" />
	   <link href="css/custom.css" rel="stylesheet" />
	   <link href="css/style_responsive.css" rel="stylesheet" />
	   <link href="css/style_default.css" rel="stylesheet" id="style_color" />
	   <link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
	   <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
	   <link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
	   <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
	   <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />
	   <link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
	   <link rel="stylesheet" href="assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
	   <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
	   <link rel="stylesheet" type="text/css" href="assets/clockface/css/clockface.css" />
       <link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
       <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
       <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />
	   <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />
	   <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	</head>
	<!-- END HEAD -->
	<!-- BEGIN BODY -->
	<body onload="javascript:window.print();" class="fixed-top">
	   <!-- BEGIN HEADER -->
	<?php
	//include 'headers/menu-top-navigation.php'; 
	?>      <!-- BEGIN PAGE -->

		  <div style="margin-left:0px !important;" id="main-content">
			 <!-- BEGIN PAGE CONTAINER-->
				<!-- END PAGE HEADER-->
	
				<!-- BEGIN ADVANCED TABLE widget-->
	 
				<div class="row-fluid">
					<div class="apan5">
						<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="header">
					<center>
						<img style="padding-top;10px" src="img/logo2.png" width="250" height="40" style="text-align:center;" />
						<h4>Booking Reciept</h4>		
						</center>
					</div>	

			<div style="width: 90%;margin-left: auto;margin-right: auto;" class="widget">
							<div class="widget-title">
								<span class="tools">
								</span>
							</div>
							<div class="widget-body">
							<form class="form-horizontal" action="add_booking.php" id="dateRange" method="post">														   
						<div style="margin-bottom:25px;" class="booked">
						<h3>Booked Rooms:</h3>
						<div class="content">
						<?php 
							$booking_no = $_GET['booking_no'];
		
							$query_table = "SELECT  rooms.room_no as roomNO,booking.bed_no from rooms LEFT JOIN booking ON (booking.room_id  = rooms.room_id)
							where booking_no = '$booking_no'";
							$result_table = mysqli_query($con,$query_table);
							while($row_booking = mysqli_fetch_array($result_table))
							{
								$roomNO = $row_booking['roomNO'];
								$bed_no = $row_booking['bed_no'];
								echo"
						- <span style='padding-left:5px;padding-right: 180px;'>$roomNO</span>---- ---- --- ----<span style='padding-left: 180px;'> $bed_no Beds</span><br>								
								";
							}
						
						?>
						</div>
						<div class="control-group">									
							<label style="padding-top:0px !important;width:104px;" class="control-label">Total Rooms</label>					
								<span style="padding-left: 60px;">=</span><span style="margin-left: 70px;"><?php echo $room_no ?></span>
 								<span style="margin-left: 80px;">Total Bed</span><span style="margin-left: 60px;">=</span>
								<span id="bed-no" style="margin-left: 70px;"><?php echo $bed_no ?></span>
								 </div>
							<div class="control-group">	
							<input type="hidden" name="bookin_id[]">						
						<label class="control-label">Customer Name</label>
								  <div class="controls">
									 <input name="customer_name" placeholder="Add Customer Name " value="<?php echo $customer_name; ?>" type="text" class="span ">
								  </div>
							   </div>
							   <div class="control-group">
								  <label class="control-label">Contact</label>
								  <div class="controls">
									 <input name="phone_no" placeholder="Add Phone #" value="<?php echo $phone_no; ?>" type="text" class="span ">
								  </div>
								  </div>
							   <div class="control-group">
								  <label class="control-label">Booking #</label>
								  <div class="controls">
									 <input placeholder="Employee Id" value="<?php echo $booking_no; ?>" type="text" class="span ">
								  </div>
							   </div>
						   <div class="control-group">
							<label class="control-label">Comment</label>
							<div class="controls">
								<textarea name="comment" placeholder="Add Your Coment" class="span" rows="3"><?php echo $comment; ?></textarea>
							</div>
						</div>
				<div class="control-group">									
							<label style="padding-top:6px !important;width: 59px;" class="control-label">Bed</label>					
								<span style="padding-top:6px;padding-left:2px;">X</span><span style="margin-left:20px"><input id="txt6" style="width: 60px !important;height: 12px !important;" type="text" class="span1" /></span>
 								<span style="margin-left:40px">=</span><span style="margin-left: 13px;"><input style="width:410px !important" id="price" type="text" class="span6" value="<?php echo $total_price ?>">
				</span></div>	
				<div class="control-group">									
							<label style="padding-top:6px !important;width:71px;" class="control-label">Sub total</label>					
								<span style="padding-top:6px;padding-left:2px;">-</span><span style="margin-left:20px"><input style="width: 60px !important;height: 12px !important;" type="text" class="span1" id="txt5" /></span>
 								<span style="margin-left: 28px;">=</span><span style="margin-left: 15px;"><input style="width:400px !important;" id="discount" type="text" class="" value="<?php echo $total_discount ?>">
				</span></div>	
				<div style="margin-top:30px;" class="footer_print">
				<span>Employee Name:</span> -<?php echo $name; ?><span style="padding-left: 160px;">Time:</span> -  <span style="padding-left: 160px;">Signature</span>
				</div>
			
			
							</form></div>
							</div>
			
							</div>
							</div>
							</div>
							</div>
							</div>
							</div>
				<!-- END ADVANCED TABLE widget-->
	
				<!-- END PAGE CONTENT-->
			 </div>
			 <!-- END PAGE CONTAINER-->
		  </div>
		  <!-- END PAGE -->
	   </div>
	   <!-- END CONTAINER -->
	   <!-- BEGIN FOOTER -->
	<?php  
		// include 'headers/footer.php';
		?>
	   <!-- END FOOTER -->
	   <!-- BEGIN JAVASCRIPTS -->
	   <!-- Load javascripts at bottom, this will reduce page load time -->
	
	   <script src="js/jquery-1.8.3.min.js"></script>
	   <script src="assets/bootstrap/js/bootstrap.min.js"></script>   
	   <script src="js/jquery.blockui.js"></script>
	   <!-- ie8 fixes -->
	   <!--[if lt IE 9]>
	   <script src="js/excanvas.js"></script>
	   <script src="js/respond.js"></script>
	   <![endif]-->
	   <script type="text/javascript" src="assets/bootstrap-daterangepicker/date.js"></script>
	   <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script> 
	   <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>  
	   <script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
	   <script type="text/javascript" src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	   <script src="assets/fancybox/source/jquery.fancybox.pack.js"></script>
	   <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
	   <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
	   <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>   
	   <script type="text/javascript" src="assets/bootstrap-daterangepicker/date.js"></script>
	   <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script> 
       <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>  
       <script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
       <script type="text/javascript" src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
       <script src="assets/fancybox/source/jquery.fancybox.pack.js"></script>
	   <script src="js/scripts.js"></script>
	
	
	   <script src="js/table-editable.js"></script>
<script>
$(document).ready(function(){
	var price = document.getElementById('price').value;
	var discount = document.getElementById('discount').value;	
		var divide = price - discount;
		document.getElementById('txt5').value = divide;
	var bed = document.getElementById('bed-no').innerHTML;
	var multiply = price / bed ;
	document.getElementById('txt6').value = multiply;

	   });
</script>

	</body>
	<!-- END BODY -->
	
	<!-- Mirrored from thevectorlab.net/adminlab/editable_table.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:58:55 GMT -->
	</html>
