<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Data Tables</title>
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

            <!-- BEGIN ADVANCED TABLE widget-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i>Booking View</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
						<form action="#" class="">
						<div class="control-group">
                                    <label class="control-label">Date Ranges</label>
                                    <div class="controls">
                                        <div class="input-prepend">
                                            <span class="add-on"><i class="icon-calendar"></i></span><input type="text" class=" m-ctrl-medium date-range" />
                                        </div>
                                    </div>
							</form>
						<table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th>Booking Number</th>
                                    <th class="hidden-phone">Employee Name</th>
                                    <th class="hidden-phone">Customer Name</th>
                                    <th class="hidden-phone">Room #</th>
									<th class="hidden-phone">Start Date</th>
								    <th class="hidden-phone">End Date</th>
									<th class="hidden-phone">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <td>1</td>
                                    <td class="hidden-phone">admin</td>
                                    <td class="hidden-phone">example</td>
                                    <td class="hidden-phone">2</td>
                                    <td class="hidden-phone">12/5/2015</td>
									<td class="hidden-phone">15/5\/2015</td>
                                    <td class="hidden-phone" ><a href="add_booking.php"><button type="button" class="btn-success">Update</button></a></td>
									</tr>
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
   <div id="footer">
       2013 &copy; Admin Lab Dashboard.
      <div class="span pull-right">
         <span class="go-top"><i class="icon-arrow-up"></i></span>
      </div>
   </div>
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
