<?php
	 include 'headers/session.php';
	include 'headers/connect_to_mysql.php';	
	$query = "SELECT  *,rooms.room_id as roomId FROM (`rooms` left join room_specification on room_specification.room_id = rooms.room_id)
left join specification on room_specification.m_id = specification.m_id"
	or die('error while fetching rooms detail');
	$result_rooms = mysqli_query($con,$query);
?>


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<!-- Mirrored from thevectorlab.net/adminlab/editable_table.html by HTTrack Website Copier/3.x [XR&CO'2013], Tue, 04 Nov 2014 07:58:54 GMT -->
<head>
   <meta charset="utf-8" />
   <title>View Rooms</title>
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
                     View Rooms
                     <small>view All </small>
                  </h3>
                   <ul class="breadcrumb">
                        <li>
                           <a href="index.php"><i class="icon-home"></i></a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">View Rooms</a><span class="divider-last">&nbsp;</span>
                       </li>
                       
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
					<strong>Success!</strong> The Room has been added.
				</div>";
			}
	 	else if(isset($_GET['update']) == 'true'){
      echo"
	    <div class='alert alert-success'>
                <button class='close' data-dismiss='alert'>×</button>
                <strong>Success!</strong> The Room has been updated.
            </div>";
		}
		else if(isset($_GET['delete']) == 'true'){
      echo"
	    <div class='alert alert-success'>
                <button class='close' data-dismiss='alert'>×</button>
                <strong>Success!</strong> The Room has been Deleted.
            </div>";
		}
?>

			
            <!-- BEGIN ADVANCED TABLE widget-->
 
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">

                            <h4><i class="icon-tags"></i>View Rooms</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
                        </div>
<div class="widget-body">
			<div class="btn-group">
               <a href="add_rooms.php"><button type="button" class="btn btn-primary"> Add New <i class="icon-plus"></i> </button></a>
                              </div>

                            <div class="portlet-body">
                                
                                <div id="width" class="space15"></div>
                                <table class="table table-striped table-hover table-bordered" id="sample_1">
                                    <thead>
                                    <tr>
								 <th style="6% !important;">Id</th>
                                    <th>Room #</th>
                                    <th>Bed #</th> 
                                    <th>Room Type</th>
									<th>Specification</th> 
									 <th>Action</th>
                                        <div class="widths">
                                        <th style="display:none">Edit</th>
                                        <th style="display:none">Delete</th>
                                    </div>
                                    </tr>
                                           </thead>
                                    <tbody>
							<?php
							$count = 0;
							while($row = mysqli_fetch_array($result_rooms))
								{
								$count++;
								$room_id = $row['roomId'];	
								$room_no = $row['room_no'];
								$bed_no = $row['bed_no'];
								$room_type = $row['room_type'];
								$feature = $row['feature'];
					echo"
					<tr class=''> 
								<td style='width:1% !important'><a href='#'>{$count}</a></td>
								<td style='width:3% !important'><a href='#'>{$room_no}</a></td>
								<td style='width:3% !important'><a href='#'>{$bed_no}</a></td>
								<td style='width:3% !important'><a href='#'>{$room_type}</a></td>
								<td style='width:3% !important'><a href='#'>{$feature}</a></td>
								  <td style='width:1%;text-align:center;'>
								<a href='add_rooms.php?room_id=$room_id'><button style='width:79% !important; margin-bottom: 2px;' type='button' class='btn btn-success'> Update <i class='icon-edit'></i></button> </a>																					 							 	 
								 <a href='delete.php?room_id=$room_id'><button style='width:79% !important;' type='button'  class='btn btn-danger'>
								  Delete <i class='icon-trash'></i></button> </a>
									  <td style='display:none'><a class='' href='javascript:;'>Edit</a></td>
								 <td style='display:none'><a class='' href='javascript:;'>Delete</a></td>
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
   <script src="js/scripts.js"></script>

   <script src="js/table-editable.js"></script>

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
