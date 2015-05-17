<?php 
	include 'headers/connect_to_mysql.php';
	$room_no = "";
	$room_type = "";
	$formAction = "";
	
	if(isset($_GET['room_id']))
{
		$room_id = $_GET['room_id'];
		$formAction = "?room_id=$room_id";
		$query = "SELECT * FROM rooms where room_id = '$room_id' ";
		$result = mysqli_query($con,$query);	
		$row = mysqli_fetch_array($result)
		or die ('error1');
		$room_no = $row['room_no'];
		$bed_no = $row['bed_no'];
		$room_type = $row['room_type'];
		
		
	if($_POST)
	{
		$room_id=  $_GET['room_id'];
		$room_no = $_POST['room_no'];
		$bed_no = $_POST['bed_no'];
		$room_type = $_POST['room_type'];
		$query = "UPDATE `rooms` SET `room_no`='$room_no',`bed_no`='$bed_no',`room_type`='$room_type' WHERE `room_id` = '$room_id'";
		$result = mysqli_query($con,$query);
		header("Location: view_rooms.php?update=true");
	}
}	
else 
{
	if($_POST)
	{
		$room_no = $_POST['room_no'];
		$bed_no = $_POST['bed_no'];
		$room_type = $_POST['room_type'];
		$query_inserting = "INSERT INTO `rooms`(`room_no`, `bed_no`, `room_type`) 
							VALUES ('$room_no','$bed_no','$room_type')";
		mysqli_query($con,$query_inserting)
		or die('error while inserting Rooms');
		header("Location: view_rooms.php?insert=true");	
	}	
}

?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Add Room</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
   <link href="css/style_responsive.css" rel="stylesheet" />
   <link href="css/style_default.css" rel="stylesheet" id="style_color" />

   <link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="assets/gritter/css/jquery.gritter.css" />
   <link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />
   <link rel="stylesheet" type="text/css" href="assets/chosen-bootstrap/chosen/chosen.css" />
   <link rel="stylesheet" type="text/css" href="assets/jquery-tags-input/jquery.tagsinput.css" />    
   <link rel="stylesheet" type="text/css" href="assets/clockface/css/clockface.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
   <link rel="stylesheet" href="assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
   <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
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
                     Add Rooms
                     <small>Add your rooms specification </small>
                  </h3>
                   <ul class="breadcrumb">
                        <li>
                           <a href="index.php"><i class="icon-home"></i></a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="view_rooms.php">View Rooms</a><span class="divider-last">&nbsp;</span>
					   </li>
					   <li><a href="#">Add Rooms</a><span class="divider-last">&nbsp;</span>
                       </li>
                       
                       </ul>
                  <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->

            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN SAMPLE FORM widget-->   
                  <div class="widget">
                     <div class="widget-title">
                        <h4><i class="icon-reorder"></i>Add Rooms</h4>
                        <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                        </span>
                     </div>
                     <div class="widget-body form">
                        <!-- BEGIN FORM-->
                        <form action="add_rooms.php<?php echo $formAction; ?>" method="post" class="form-horizontal">
                           <div class="control-group">
                              <label class="control-label">Room #</label>
                              <div class="controls">
                                 <input placeholder="Enter Room No" name="room_no" value="<?php echo $room_no; ?>" type="text" class="span6 " />
                              </div>
                           </div>
						   <div class="control-group">
                              <label class="control-label">Room Type</label>
                              <div class="controls">
                                 <input placeholder="Enter Room Type" name="room_type" value="<?php echo $room_type; ?>" type="text" class="span6 " />
                              </div>
                           </div>
						   <div class="control-group">
                              <label class="control-label">Bed #</label>
                              <div class="controls">
                                 <input placeholder="Enter Bed No" name="bed_no" value="<?php echo $bed_no; ?>" type="number" class="span6 " />
                              </div>
                           </div>
<!--						     <div class="control-group">
                              <label class="control-label">Features</label>
                              <div class="controls">
                                 <?php
								 include 'headers/features_detail.php';
								?>
								 <br /><br />
                                 <input placeholder="Select Specification" name="specification" id="attribute" readonly="readonly" value="<?php echo $specification ?>" type="text" class="span6 " />
								 </div>
								 
                           </div>-->
						   <div class="form-actions clearfix">
						<button type="submit" class="btn btn-primary blue button-next">Submit</button>
						</div>
					  </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END EXTRAS widget-->
                </div>
            </div>
            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  
   </div>
   <!-- END CONTAINER -->
   <!-- BEGIN FOOTER -->
   <div id="footer">
       2013 &copy; Admin Lab Dashboard.
      <div class="span pull-right">
         <span class="go-top"><i class="icon-arrow-up"></i></span>
      </div>
   </div>
   <!-- END FOOTER -->
   <!-- BEGIN JAVASCRIPTS -->    
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="js/jquery-1.8.2.min.js"></script>    
   <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap/js/bootstrap-fileupload.js"></script>
   <script src="js/jquery.blockui.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
   <script type="text/javascript" src="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
   <script type="text/javascript" src="assets/clockface/js/clockface.js"></script>
   <script type="text/javascript" src="assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
   <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>   
   <script type="text/javascript" src="assets/bootstrap-daterangepicker/date.js"></script>
   <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script> 
   <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>  
   <script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
   <script src="assets/fancybox/source/jquery.fancybox.pack.js"></script>
   <script src="js/scripts.js"></script>
   <script>
$("input[type=checkbox]").change(function () {
    var newArr = $("input:checked").map(function () { return this.value; });
    $("#attribute").val(newArr.get().join(" , "));
});

   </script>
   <script>
      jQuery(document).ready(function() {       
         // initiate layout and plugins
         App.init();
      });
   </script>
   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>