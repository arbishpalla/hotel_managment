<?php 
	session_start();
	include 'headers/session.php';
	include 'headers/connect_to_mysql.php';
	$room_id = "";
	$m_id=  "";
	$feature = "";
	$room_no = "";
	$formAction = "";
	$id = "";
	$roomNo = "";

		
	if(isset($_GET['room_id']))
	{
			$room_id = $_GET['room_id'];
			$query_room = "SELECT room_no FROM rooms where room_id = '$room_id' ";
			$result_room = mysqli_query($con,$query_room);
			$row= mysqli_fetch_array($result_room);
			$roomNo = $row['room_no'];
		
		
		

			$formAction = "?room_id=$room_id"; 
			$query_main = "SELECT * FROM (room_specification left join rooms on room_specification.room_id = rooms.room_id) 
     				  left join specification on room_specification.m_id = specification.m_id
					  where rooms.room_id = '$room_id'";
     		$Result = mysqli_query($con,$query_main)
			or die ('error');	
	}	
else 
{
	if($_POST)
	{
		$room_id = $_POST['room_id'];
		$m_id = $_POST['m_id']; 
		$query_inserting = "INSERT INTO `room_specification` (`room_id`,`m_id`) 
							VALUES ('$room_id','$m_id')";
		mysqli_query($con,$query_inserting)
		or die('error while inserting Rooms specification');
		header ("Location: room_spec.php?insert=true");	
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
   <title>Add Specification</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
	<link href="glyphicon/bootstrap.icon-large.css" />
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
   <script>
<?php

if(isset($_GET['room_id']))
{
if($_POST)
{   
	$url = "room_spec.php?update=true";
	echo 'window.location.href = "'. $url.'"';
  }
}
elseif($_POST)
{
	$url = "room_spec.php?insert=true";
	echo 'window.location.href = "'. $url.'"';	
}
?>
	</script>
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
                     Rooms Specification
                     <small>Add your rooms Specification </small>
                  </h3>
                   <ul class="breadcrumb">
                        <li>
                           <a href="index.php"><i class="icon-home"></i></a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="specification.php">Rooms Specification</a><span class="divider-last">&nbsp;</span>
					   </li>
					   <li><a href="#">Add Specification</a><span class="divider-last">&nbsp;</span>
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
                        <h4><i class="icon-reorder"></i>Add Specification</h4>
                        <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                        </span>
                     </div>
                     <div class="widget-body form">
                        <!-- BEGIN FORM-->
                        <form action="add_room_spec.php<?php echo $formAction; ?>" method="post" class="form-horizontal">

						<div class="control-group">
						<div class="control-group">
                              <label class="control-label">Rooms</label>
                              <div class="controls">
                                 <select name="room_id" class="span6 chosen" data-placeholder="Select Room " tabindex="1">
									<option value='<?php echo"$room_id";?>'><?php echo"$roomNo";?></option>                                 
								 <?php
									$query_feature = "SELECT * FROM rooms";
									$result_feature = mysqli_query($con,$query_feature)
									or die('error while fetching Rooms');
										
									while($row_rooms = mysqli_fetch_array($result_feature))
									{
									$room_id = $row_rooms['room_id'];
									$room_no = $row_rooms['room_no'];
										
									echo"
										<option value='$room_id'>$room_no</option>
										";
									}		
										
									?>
  
                                 </select>
                              </div>
                           </div>                             
<?php
if(isset($_GET['room_id'])){
	if($_POST)
	{		
			foreach ($_POST['id'] as $iD_array) {
				$m_id = $_POST['m_id'][$iD_array];				
				$query_update = "UPDATE room_specification set m_id = '$m_id' where id = '$iD_array'"
				or die('error while updating rooms specification');
                 mysql_query($query_update);			
			}


	} 
			

			while($row = mysqli_fetch_array($Result))
			{
			$id = $row['id'];
			$room_id = $row['room_id'];
			$m_id = $row['m_id'];
			$room_no = $row['room_no'];
			$feature = $row['feature'];
			

			
 echo"							
			<label class='control-label'>Features</label>
			  <div class='controls'>
				 <select name='m_id[$id]' class='span6 chosen' data-placeholder='Select Room Specification' tabindex='1'>
					<option value='$m_id'>$feature</option>                                 							
				 ";
				 
					$query_feature = "SELECT * FROM specification";
					$result_feature = mysqli_query($con,$query_feature)
					or die('error while fetching fetures');
					while($row = mysqli_fetch_array($result_feature))
					{
					$m_id = $row['m_id'];  
					$feature = $row['feature'];
					echo"
						<option value='$m_id'>$feature</option>
						";
						}		
				echo"									
				 </select>
			  </div>
						<input type='hidden' name='id[]' value='$id'/>						
								";	
		
			}
		}
		else
		{
			echo"							
			<label class='control-label'>Features</label>
			  <div class='controls'>
				 <select name='m_id' class='span6 chosen' data-placeholder='Select Room Specification' tabindex='1'>
					<option value='$m_id'>$feature</option>                                 							
				 ";
				 
					$query_feature = "SELECT * FROM specification";
					$result_feature = mysqli_query($con,$query_feature)
					or die('error while fetching fetures');
					while($row = mysqli_fetch_array($result_feature))
					{
					$m_id = $row['m_id'];  
					$feature = $row['feature'];
					echo"
						<option value='$m_id'>$feature</option>
						";
						}		
				echo"									
				 </select>
			  </div>";

		}
	?>
	</div>
                           </div>
						   <div class="form-actions clearfix">
						<button style="margin-left: 13.5%;" type="submit" class="btn btn-primary blue button-next">Submit</button>
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