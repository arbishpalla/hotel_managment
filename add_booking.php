<?php
//include 'headers/connect_to_mysql.php';

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
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />
   
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
                        <div class="widget-body">
						          <a href="#myModal3" role="button" class="btn btn-success" data-toggle="modal">Select Date Range</a>
					               <div id="myModal3" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h3 id="myModalLabel3">Date Range</h3>
                                        </div>
                                        <div class="modal-body">
                           <form action="#" class="form-horizontal">
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
                                            <button type="submit" class="btn btn-primary">Confirm</button>
                                        </div>
							</form>
										</div><br><br>
                            <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th class="hidden-phone">Select</th>
                                    <th class="hidden-phone">Room #</th>
                                    <th class="hidden-phone">Bed #</th>
                                    <th class="hidden-phone">Specification</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeX">
                                    <td style="width:1% !important"><input type="checkbox" class="checkboxes" value="1" /></td>
                                    <td class="hidden-phone">Romm 101</a></td>
                                    <td class="sum">2</td>
                                    <td class="center hidden-phone">Ac,tv</td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                 <td class="hidden-phone">Romm 105</a></td>
                                    <td class="sum">1</td>
                                    <td class="center hidden-phone">tv,oven</td>
                                </tr>
                                </tbody>
                        </table>
						
				 <form style="margin-top:10px;" action="#" class="form-horizontal">
                           <div class="control-group">
                              <label class="control-label">Total Rooms</label>
                              <div class="controls">
                                 <input disabled placeholder="Total Rooms " type="text" class="span2 "  />
                              </div>
                           </div>
						   <div class="control-group">
                              <label class="control-label">Total Bed</label>
                              <div class="controls">
                                 <input disabled placeholder="Total Bed" type="text" class="span2 " />
                              </div>
                           </div>
						   </form>
					
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
				 <form action="#" class="form-horizontal">
						<div class="control-group">
                              <label class="control-label">Customer Name</label>
                              <div class="controls">
                                 <input placeholder="Add Customer Name " type="text" class="span6 "  />
                              </div>
                           </div>
						   <div class="control-group">
                              <label class="control-label">Contact</label>
                              <div class="controls">
                                 <input placeholder="Add Phone #" type="text" class="span6 " />
                              </div>
                           </div><div class="control-group">
                              <label class="control-label">Email</label>
                              <div class="controls">
                                 <input placeholder="Add Email" type="text" class="span6 "  />
                              </div>
                           </div>
						   <div class="control-group">
                              <label class="control-label">Employee Name</label>
                              <div class="controls">
                                 <input placeholder="Employee Name" type="text" class="span6 " />
                              </div>
                           </div>
					   <div class="control-group">
						<label class="control-label">Coment</label>
						<div class="controls">
							<textarea class="input-xxlarge" placeholder="Add Your Coment" rows="3"></textarea>
						</div>
					</div>
			</form>
			<div class="form-actions clearfix">
				<div style="margin-left:162px;">
				<a onclick="javascript:window.print();" class="btn btn-success btn-large hidden-print">Print <i class="icon-print icon-big"></i></a>
                      <a href="#myModal4" role="button" class="btn btn-success" data-toggle="modal">Voucher</a>
					  </div>
						<div id="myModal4" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h3 id="myModalLabel4">List Of Rooms</h3>
						</div>
						<div class="modal-body">
						   <form action="#" class="form-horizontal">
						 <div class="control-group">
                              <label class="control-label">No Of Bed</label>
                              <div class="controls">
                                <input type="text" value="10 x" class="span2" style="opacity:0.3;border:none;" disabled> </span> <input placeholder="" type="text" class="span3 " /><br><br>
                              <input placeholder="Sub total" type="text" class="span4 " />
							  </div>
                           </div>
						   <div class="control-group">
                              <label class="control-label">Discount</label>
                              <div class="controls">
                                 = <input placeholder="" type="text" class="span3 " /><br><br>
								 <input placeholder="Grand total" type="text" class="span4 " />
                              </div>
                           </div>
						   </form>
							</div>
							<div class="modal-footer">
								<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
								<button data-dismiss="modal" class="btn btn-success">Success</button>
							</div>
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
   				<script>
				var inputs = document.getElementsByClassName('tr sum'),
				total  = document.getElementById('payment-total');

				for (var i=0; i < inputs.length; i++) {
					inputs[i].onchange = function() {
					var add = this.value * (this.checked ? 1 : -1);
				total.innerHTML = parseFloat(total.innerHTML) + add
				total1.innerHTML = parseFloat(total1.innerHTML) + add
        }
    }
				</script>
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
