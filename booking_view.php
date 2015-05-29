<?php
	session_start();

	include 'headers/session.php';
	include 'headers/connect_to_mysql.php';
	$room_id = "";
	$start_date = "";
	$end_date = "";
	$customer_name = "";
	$emp_name= "";
	$room_id ="";
	$booking_id = "";
	$time_stamp = "";
	$booking_no = "";
	
	$query = "SELECT `booking_no`,`time_stamp`,`booking_id`,`customer_name`,`start_date`,`end_date`,`name` as emp_name,
				group_concat(room_id) as room_id
			  FROM `booking` left join login on (login.emp_id = booking.emp_id)
			  group by booking_no"
	or die('error while fetching rooms Features');
	$result_rooms = mysqli_query($con,$query);
?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Booking View</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
   <link href="css/style_responsive.css" rel="stylesheet" />
   <link href="css/style_default.css" rel="stylesheet" id="style_color" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />
   <link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />
   <link rel="stylesheet" href="assets/jslider/css/jslider.css" type="text/css">
   <link rel="stylesheet" href="assets/jslider/css/jslider.blue.css" type="text/css">
   <link rel="stylesheet" href="assets/jslider/css/jslider.plastic.css" type="text/css">
   <link rel="stylesheet" href="assets/jslider/css/jslider.round.css" type="text/css">
   <link rel="stylesheet" href="assets/jslider/css/jslider.round.plastic.css" type="text/css">
   <link rel="stylesheet" type="text/css" href="assets/gritter/css/jquery.gritter.css" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN HEADER -->
<?php
include 'headers/menu-top-navigation.php'; 
?>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
                  <h3 class="page-title">
                     Booking View
                     <small>Full Booking Integration</small>
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Booking View</a><span class="divider-last">&nbsp;</span></li>
                   </ul>
                  <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
               <?php
			if(isset($_GET['insert']) == 'true')
			{
				echo"
			<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>×</button>
					<strong>Success!</strong> The Booking has been added.
				</div>";
			}
	 	else if(isset($_GET['update']) == 'true'){
      echo"
	    <div class='alert alert-success'>
                <button class='close' data-dismiss='alert'>×</button>
                <strong>Success!</strong> The Booking has been updated.
            </div>";
		}
		else if(isset($_GET['delete']) == 'true'){
      echo"
	    <div class='alert alert-success'>
                <button class='close' data-dismiss='alert'>×</button>
                <strong>Success!</strong> The Booking has been Deleted.
            </div>";
		}
?>
         
		 <!-- BEGIN ADVANCED TABLE widget-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i>Booking View</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
							</div>
<div class="widget-body">
			<div class="btn-group">
               <a href="add_booking.php"><button type="button" style="margin-bottom:10px;" class="btn btn-primary"> Add New <i class="icon-plus"></i> </button></a>
                              </div>
                            <div class="portlet-body">
                                
						<table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th>Booking Number</th>
                                    <th class="hidden-phone">Employee Name</th>
                                    <th class="hidden-phone">Customer Name</th>
                                    <th class="hidden-phone">Room Id</th>
									<th class="hidden-phone">Start Date</th>
								    <th class="hidden-phone">End Date</th>
									<th class="hidden-phone">Time</th>
									<th class="hidden-phone">Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
							$count = 0;
							while($row = mysqli_fetch_array($result_rooms))
								{
								$count++;
								$room_id = $row['room_id'];
								$booking_id = $row['booking_id'];
								$start_date = $row['start_date'];
								$end_date = $row['end_date'];
								$customer_name = $row['customer_name'];
								$emp_name = $row['emp_name'];
								$time_stamp = $row['time_stamp'];
								$booking_no = $row['booking_no'];
								$count++;
								echo"
                                <tr class='odd gradeX'>
                                    <td>{$booking_no}</td>
                                    <td class='hidden-phone'>{$emp_name}</td>
                                    <td class='hidden-phone'>{$customer_name}</td>
                                    <td class='hidden-phone'>{$room_id}</td>
                                    <td class='hidden-phone'>{$start_date}</td>
									<td class='hidden-phone'>{$end_date}</td>
									<td class='hidden-phone'>{$time_stamp}</td>
									<td class='hidden-phone' style='text-align:center;'>
				                     <a href='add_booking.php?booking_no=$booking_no'><button style='width:62% !important;' type='button'  class='btn btn-success'> 
								   Update <i class='icon-edit'></i></button> </a></td>								
	
 									</tr>
									";
								}
								?>
                                </tbody>
                        </table>
                        </div>
						</div>
                    </div>
                    <!-- END EXAMPLE TABLE widget-->
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
   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
   <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
   <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>   
   <script type="text/javascript" src="assets/bootstrap-daterangepicker/date.js"></script>
   <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script> 
   <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>  
   <script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
   <script type="text/javascript" src="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
   	<script type="text/javascript" src="assets/gritter/js/jquery.gritter.js"></script>
	<script type="text/javascript" src="js/jquery.pulsate.min.js"></script>
	<script src="assets/fancybox/source/jquery.fancybox.pack.js"></script>

    <!-- jquery slider -->
    <script type="text/javascript" src="assets/jslider/js/jshashtable-2.1_src.js"></script>
    <script type="text/javascript" src="assets/jslider/js/jquery.numberformatter-1.2.3.js"></script>
    <script type="text/javascript" src="assets/jslider/js/tmpl.js"></script>
    <script type="text/javascript" src="assets/jslider/js/jquery.dependClass-0.1.js"></script>
    <script type="text/javascript" src="assets/jslider/js/draggable-0.1.js"></script>
    <script type="text/javascript" src="assets/jslider/js/jquery.slider.js"></script>

   <script src="js/scripts.js"></script>
   <script>
      jQuery(document).ready(function() {       
         // initiate layout and plugins
         App.init();
      });
   </script>
</body>
<!-- END BODY -->
</html>
