	<?php
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
	
	if(isset($_GET['booking_id']))
{
		$booking_id = $_GET['booking_id'];
		$formAction = "?booking_id=$booking_id";
		$query = "SELECT * FROM `booking` WHERE `booking_id` = `$booking_id`";
		$result = mysqli_query($con,$query);	
		$row = mysqli_fetch_array($result)
		or die ('error1');
		$emp_id = $row['emp_id'];
		$room_no = $row['room_no'];
		$bed_no = $row['bed_no'];
		$start_date = $row['start_date'];
		$end_date = $row['end_date'];
		$customer_name = $row['customer_name'];
		$phone_no = $row['phone_no'];
		$email = $row['email'];
		$comment = $row['comment'];
		$total_discount = $row['total_discount'];
		$total_price = $row['total_price'];
		$feature = $row['feature'];
	if($_POST)
	{

		$booking_id=  $_GET['booking_id'];
		$room_no = $_POST['room_no'];
		$end_date = $_POST['end_date'];
		$customer_name = $_POST['customer_name'];
		$phone_no = $_POST['phone_no'];
		$email = $_POST['email'];
		$comment = $_POST['comment'];
		$total_discount = $_POST['total_discount'];
		$total_price = $_POST['total_price'];
		$query = "UPDATE `booking` SET `emp_id`=[`$emp_id`],`room_no`=[`$room_no`],`bed_no`=[`$bed_no`],
				`start_date`=[`$start_date`],`end_date`=[`$end_date`],`customer_name`=[`$customer_name`],
				`phone_no`=[`$phone_no`],`email`=[`$email`],`comment`=[`$comment`],`total_discount`=[`$total_discount`]
				,`total_price`=[`$total_price`] WHERE `booking_id`= `$booking_id`";
		$result = mysqli_query($con,$query);
		header("Location: view_booking.php?update=true");
	}
}	
else 
{
	if($_POST)
	{
		$room_no = $_POST['room_no'];
		$bed_no = $_POST['bed_no'];
		$customer_name = $_POST['customer_name'];
		$phone_no = $_POST['phone_no'];
		$email = $_POST['email'];
		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];
		$comment = $_POST['comment'];
		$total_discount = $_POST['total_discount'];
		$total_price = $_POST['total_price'];		
		$query_inserting = "INSERT INTO `booking`(`emp_id`, `room_no`, `bed_no`, `start_date`, `end_date`, `customer_name`, `phone_no`, `email`, `comment`, `total_discount`, `total_price`) VALUES 	('$emp_id','$room_no','$bed_no','$start_date','$end_date','$customer_name','$phone_no','$email','$comment','$total_discount','$total_price')";
		mysqli_query($con,$query_inserting)
		or die('error while inserting booking');
		//header("Location: booking_view.php?insert=true");	
		
		/*
		
		SELECT id,room_id, 
        group_concat( room_specification.m_id ) AS m_id,
        group_concat( specification.feature ) AS feature
		FROM room_specification LEFT JOIN specification ON (room_specification.m_id = specification.m_id)
		GROUP BY room_id;


		
		*/
		
		}	
}

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
	   <link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />
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
	   <style>
	   .search-table { overflow-x: scroll;   overflow-y: hidden; }
	   </style>
	<script type="text/javascript">
		function deleteConfirm(id)
		{
			var result = confirm("Want to delete?");
			if(result == true){
				return true;
				}
			else{
				return false;
			}
		}
		</script>
			<script src="https://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script>
	$( document ).ready(function() {
		var x = document.getElementById("sample_1").rows[0].cells.length;
	   if(x > 4){
		   document.getElementById("search-table-outter").style.overflowX = "scroll";
	}
	});
	</script>
	</head>
	<!-- END HEAD -->
	<!-- BEGIN BODY -->
	<body class="fixed-top">
	   <!-- BEGIN HEADER -->
	<?php
	include 'headers/menu-top-navigation.php'; 
	?>      <!-- BEGIN PAGE -->
		  <div id="main-content">
			 <!-- BEGIN PAGE CONTAINER-->
			 <div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
				   <div class="span12">
					   <!-- BEGIN THEME CUSTOMIZER-->
	
					   <!-- END THEME CUSTOMIZER-->
					  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
					  <h3 class="page-title">
						 Add Booking
						 <small>view All </small>
					  </h3>
					   <ul class="breadcrumb">
							<li>
							   <a href="index.php"><i class="icon-home"></i></a> <span class="divider">&nbsp;</span>
						   </li>
						   <li><a href="#">Add Booking</a><span class="divider-last">&nbsp;</span>
						   </li>
						   
						   </ul>
					  <!-- END PAGE TITLE & BREADCRUMB-->
				   </div>
				</div>
				<!-- END PAGE HEADER-->
	
				<!-- BEGIN ADVANCED TABLE widget-->
	 
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE widget-->
						<div class="widget">
							<div class="widget-title">
								<h4><i class="icon-reorder"></i>Add Booking (Step 1)</h4>
								<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
								</span>
							</div>
							<form action="add_booking.php" method="post">
							<div class="widget-body">
									  <a href="#myModal3" role="button" class="btn btn-success" data-toggle="modal">Select Date Range</a>
									   <div id="myModal3" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
												<h3 id="myModalLabel3">Date Range</h3>
											</div>
											<div class="modal-body">
							   <div class="form-horizontal">
							<div class="control-group">
										<label class="control-label">Date Ranges</label>
										<div class="controls">
											<div class="input-prepend">
												<span class="add-on"><i class="icon-calendar"></i></span><input type="text" class=" m-ctrl-medium date-range" />
											</div>
										</div>
										</div>
	
											</div>
											<div class="modal-footer">
												<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
												<button data-dismiss="modal" type="button" class="btn btn-primary">Confirm</button>
											</div>
								</div>
											</div><br><br>
								<div class="search-table">
								<table class="table table-striped table-bordered"  id="sample_1">
								<thead>
									<tr>
										<th class="hidden-phone">Select</th>
										<th class="hidden-phone">Room #</th>
										<th class="hidden-phone">Bed #</th>
										<th style="max-width:4%" class="hidden-phone">Specification</th>										
										<th class="hidden-phone">5/5/2015</th>
										<th class="hidden-phone">5/6/2015</th>
										<th class="hidden-phone">5/7/2015</th>
										<th class="hidden-phone">5/8/2015</th>
										<th class="hidden-phone">5/9/2015</th>
										<th class="hidden-phone">5/10/2015</th>
										<th class="hidden-phone">5/11/2015</th>
										<th class="hidden-phone">5/12/2015</th>
										<th class="hidden-phone">5/13/2015</th>
									</tr>
								</thead>
								<tbody>
									<tr class="odd gradeX">
								<td style =" min-width: 120px;" style="width:1% !importa"><input type="checkbox" class="checkboxes" name="cb" value="1"></td>
								<td style =" min-width: 120px;"  class="hidden-phone">Room 101</a></td>
								<td style =" min-width: 120px;" class="sum">2</td>
								<td class="center hidden-phone"><span class="myicon-shower"></span>  <span class="myicon-tv"></span></td>
                                <td style =" width: 1%;" class="hidden-phone"><a href="#" class="btn popovers btn-danger" data-trigger="hover" data-placement="bottom" data-content="Your booking person name will go here" data-original-title="Booked">X</a></td>
								<td style =" width: 1%;" class="hidden-phone"><a href="#" class="btn popovers btn-danger" data-trigger="hover" data-placement="bottom" data-content="Your booking person name will go here" data-original-title="X">X</a></td>
								<td style =" width: 1%;"><button type="button" class="btn btn-primary" value="" />&#10004;</button></td>
								<td style =" width: 1%;"><button type="button" class="btn btn-primary" value="&#10004;" />&#10004;</button></td>
								<td style =" width: 1%;" class="hidden-phone"><a href="#" class="btn popovers btn-danger" data-trigger="hover" data-placement="bottom" data-content="Your booking person name will go here" data-original-title="X">X</a></td>
								<td style =" width: 1%;" class="hidden-phone"><a href="#" class="btn popovers btn-danger" data-trigger="hover" data-placement="bottom" data-content="Your booking person name will go here" data-original-title="X">X</a></td>
								<td style =" width: 1%;"><button type="button" class="btn btn-primary" value="&#10004;" />&#10004;</button></td>
								<td style =" width: 1%;" class="hidden-phone"><a href="#" class="btn popovers btn-danger" data-trigger="hover" data-placement="bottom" data-content="Your booking person name will go here" data-original-title="X">X</a></td>
								<td style =" width: 1%;" class="hidden-phone"><a href="#" class="btn popovers btn-danger" data-trigger="hover" data-placement="bottom" data-content="Your booking person name will go here" data-original-title="X">X</a></td>																																		  
								</tr>								
								<tr class="odd gradeX">
								<td style =" min-width: 120px;" style="width:1% !importa"><input type="checkbox" class="checkboxes" name="cb" value="1"></td><td class="hidden-phone">Room 105</a></td>
								<td class="sum">1</td>
								<td class="center hidden-phone"><span class="myicon-snoflaek"></span><span class="myicon-heat"></span>  </td>
							    <td class="hidden-phone"><a href="#" class="btn popovers btn-danger" data-trigger="hover" data-placement="bottom" data-content="Your booking person name will go here" data-original-title="X">X</a></td>	
							    <td class="hidden-phone"><a href="#" class="btn popovers btn-danger" data-trigger="hover" data-placement="bottom" data-content="Your booking person name will go here" data-original-title="X">X</a></td>
							    <td class="hidden-phone"><a href="#" class="btn popovers btn-danger" data-trigger="hover" data-placement="bottom" data-content="Your booking person name will go here" data-original-title="X">X</a></td>
 							    <td class="hidden-phone"><a href="#" class="btn popovers btn-danger" data-trigger="hover" data-placement="bottom" data-content="Your booking person name will go here" data-original-title="X">X</a></td>
							    <td> <button type="button" class="btn btn-primary" value="&#10004;" />&#10004;</button></td>
								<td><button type="button" class="btn btn-primary" value="&#10004;" />&#10004;</button></td>
								<td><button type="button" class="btn btn-primary" value="&#10004;" />&#10004;</button></td>
								<td><button type="button" class="btn btn-primary" value="&#10004;" />&#10004;</button></td>
								<td class="hidden-phone"><a href="#" class="btn popovers btn-danger" data-trigger="hover" data-placement="bottom" data-content="Your booking person name will go here" data-original-title="X">X</a></td>
								</tr>
								<tr class="odd gradeX">
								<td style =" min-width: 120px;" style="width:1% !importa"><input type="checkbox" class="checkboxes" name="cb" value="1"></td><td class="hidden-phone">Room 105</a></td>
								<td class="sum">1</td>
								<td class="center hidden-phone"><span class="myicon-kettle"></span><span class="myicon-wifi"></span>  </td>
							    <td class="hidden-phone"><a href="#" class="btn popovers btn-danger" data-trigger="hover" data-placement="bottom" data-content="Your booking person name will go here" data-original-title="X">X</a></td>
 							    <td class="hidden-phone"><a href="#" class="btn popovers btn-danger" data-trigger="hover" data-placement="bottom" data-content="Your booking person name will go here" data-original-title="X">X</a></td>
							    <td> <button type="button" class="btn btn-primary" value="&#10004;" />&#10004;</button></td>
							    <td class="hidden-phone"><a href="#" class="btn popovers btn-danger" data-trigger="hover" data-placement="bottom" data-content="Your booking person name will go here" data-original-title="X">X</a></td>	
							    <td class="hidden-phone"><a href="#" class="btn popovers btn-danger" data-trigger="hover" data-placement="bottom" data-content="Your booking person name will go here" data-original-title="X">X</a></td>
								<td><button type="button" class="btn btn-primary" value="&#10004;" />&#10004;</button></td>
								<td><button type="button" class="btn btn-primary" value="&#10004;" />&#10004;</button></td>
								<td><button type="button" class="btn btn-primary" value="&#10004;" />&#10004;</button></td>
								<td class="hidden-phone"><a href="#" class="btn popovers btn-danger" data-trigger="hover" data-placement="bottom" data-content="Your booking person name will go here" data-original-title="X">X</a></td>
								</tr>
									</tbody>
								<tfoot>
									<tr style="display:none" class="totalColumn">
										<td class="totalCol">0</td>
										<td class="totalCol">0</td>
										<td class="totalCol">0</td>
										<td class="totalCol">Total</td>
									</tr>
								</tfoot>
							</table>
						</div>
					 <div style="margin-top:10px;" action="#" class="form-horizontal">
							   
							    <div class="control-group">
                                    <label class="control-label">Select Date</label>
                                    <div class="controls">
                                        <div class="input-append date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                            <input class=" m-ctrl-medium date-picker" size="16" type="text" value="Select your Date" /><span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
							   <div class="control-group">
								  <label class="control-label">Total Rooms</label>
								  <div class="controls">
									 <input name="room_no" readonly="readonly" placeholder="Total Rooms" id="room" type="text" class="span2 "  />
								  </div>
							   </div>
							   <div class="control-group">
								  <label class="control-label">Total Bed</label>
								  <div class="controls">
									 <input name="bed_no" readonly="readonly" name="bed_no" placeholder="Total Bed" type="text" id="txt1" class="span2 " />
									 <input type="hidden" name="start_date" id="start" value="" />
									 <input type="hidden" name="end_date" id="end" value="" />
								  </div>
							   </div>
							   </div>
						
							</div>
						</div>
						<!-- END EXAMPLE TABLE widget-->
					</div>
				</div>
				<!-- Begin price table-->
					   <div class="row-fluid">
					<div class="span12">
						<!-- BEGIN EXAMPLE TABLE widget-->
						<div class="widget">
							<div class="widget-title">
								<h4><i class="icon-reorder"></i>Add Booking (Step 2)</h4>
								<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
								</span>
							</div>
							<div class="widget-body">
					 <div action="#" class="form-horizontal">
							<div class="control-group">
								  <label class="control-label">Customer Name</label>
								  <div class="controls">
									 <input name="customer_name" placeholder="Add Customer Name " type="text" class="span6 "  />
								  </div>
							   </div>
							   <div class="control-group">
								  <label class="control-label">Contact</label>
								  <div class="controls">
									 <input name="phone_no" placeholder="Add Phone #" type="text" class="span6 " />
								  </div>
							   </div><div class="control-group">
								  <label class="control-label">Email</label>
								  <div class="controls">
									 <input name="email" placeholder="Add Email" type="text" class="span6 "  />
								  </div>
							   </div>
							   <div class="control-group">
								  <label class="control-label">Employee Id</label>
								  <div class="controls">
									 <input placeholder="Employee Id"  value="<?php echo $emp_id; ?>" readonly="readonly" type="text" class="span6 " />
								  </div>
							   </div>
						   <div class="control-group">
							<label class="control-label">Coment</label>
							<div class="controls">
								<textarea name="comment" placeholder="Add Your Coment" class="span6" rows="3"></textarea>
							</div>
						</div>
				</div>
				<div class="form-actions clearfix">
					<div style="margin-left:162px;">
						  <a href="#myModal4" role="button" class="btn btn-success" data-toggle="modal">Voucher</a>
						  <button type="submit" class="btn-primary" >Submit</button>
						  </div>
							<div id="myModal4" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h3 id="myModalLabel4">List Of Rooms</h3>
							</div>
							<div class="modal-body">
							   <div  class="form-horizontal">
							 <div class="control-group">
								  <label class="control-label">No Of Bed</label>
								  <div class="controls">
									<span id="first_number"></span> *
									 <input placeholder="" type="text" id="txt3" onkeyup="sum();" class="span3 " /><br><br>
							  <input  name="total_price" placeholder="Sub total" id="txt4" type="text" class="span3 " />
								  </div>
							   </div>
							   <div class="control-group">
								  <label class="control-label">Discount</label>
								  <div class="controls">
									 = <input placeholder="" type="text" id="txt5" onkeyup="minus();" class="span3 " /><br><br>
									 <input name="total_discount" placeholder="Grand total" id="txt6" type="text" class="span3 " />
								  </div>
							   </div>
                                   </div>
                                    </div>
								<div class="modal-footer">
									<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
									<button data-dismiss="modal" class="btn btn-success">Success</button>
			<button onclick="javascript:window.print();" class="btn btn-success btn-large hidden-print">Print <i class="icon-print icon-big"></i></button>
								</div>
								</form>
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
		include 'headers/footer.php';
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
	   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
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
function myFunction() {
	var dateFrom = document.getElementById('from').value;
	var dateto = document.getElementById('to').value;
	document.getElementById('start').value = dateFrom;
	document.getElementById('end').value = dateto;
	
 }
</script>
		<script>
	// $( document ).ready(function() {				
					// var dateFrom = document.getElementById('from').value;
				// var endDate = document.getElementById('to').value;
				// //assigning valur to hidden textbox
				// if(dateFrom != null)
				// {
					// alert('working');
				// }
				// else
				// {
					// alert('not working');
				// }
				// document.getElementById('start').value = dateFrom;
				// document.getElementById('end').value; = endDate
	// });
				
		</script>
		<script>
	  function sum() {
				var txtFirstNumberValue = document.getElementById('first_number').innerHTML;
				var txtSecondNumberValue = document.getElementById('txt3').value;
				var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
				if (!isNaN(result)) {
					document.getElementById('txt4').value = result;
				}
				else
				{
					document.getElementById('txt4').value = "0";
				}
			}
		function minus() {
				var txtFirstNumberValue = document.getElementById('txt4').value;
				var txtSecondNumberValue = document.getElementById('txt5').value;
				var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
				if (!isNaN(result)) {
					document.getElementById('txt6').value = result;
				}
							else
				{
					document.getElementById('txt6').value = "0";
				}
			}		
		</script>
		<script>
		$(document).ready(function(){
	
		var $checkboxes = $('#sample_1 td input[type="checkbox"]');
			
		$checkboxes.change(function(){
			var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
			
			$('#room').val(countCheckedCheckboxes);
		});
	
	});
	
		</script>
	<script type="text/javascript">
	$('[name="cb"]').change(function () {
		$('.totalColumn td:nth-child(3)').html("0");
		 $('#txt1').val("0");
		 $('#first_number').html("0");
		$('[name="cb"]:checked').closest('tr').find('td:nth-child(3)').each(function () {
			var $td = $(this);
			var $sumColumn = $('#sample_1 tr.totalColumn td:eq(' + $td.index() + ')');
			var currVal = $sumColumn.html() || 0;
			currVal = +currVal + +$td.html();
			$sumColumn.html(currVal);
			$('#txt1').val(currVal);
			$('#first_number').html(currVal);
			   
		});
	});
	</script>
	</script>
	   <script>
		   jQuery(document).ready(function() {
			   App.init();
			   TableEditable.init();
		   });
	   </script>
	</body>
	<!-- END BODY -->
	
	<!-- Mirrored from thevectorlab.net/adminlab/editable_table.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:58:55 GMT -->
	</html>
