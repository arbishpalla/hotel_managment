<?php
	include 'headers/session.php';
	include 'headers/connect_to_mysql.php';
	
	$start_date = "";
	$end_date = "";
	$start_date_post = "";
	$end_date_post = "";
	$dateRangeArray = array();
	
	if($_POST)
	{
		$start_date_post = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['starting'])));
		$end_date_post = date('Y-m-d ', strtotime(str_replace('-', '/', $_POST['ending'])));
	
		//print_r($_POST);
	}
			
	
?>

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
       <style>
.search-table {
	overflow-x: scroll;
	overflow-y: hidden;
}
</style>
       <script>
	   	
		function myFunction()
		{
			
				var dateFrom = document.getElementById('from').value;
				var dateto = document.getElementById('to').value;
				document.getElementById('start').value = dateFrom;
				document.getElementById('end').value = dateto;
				$('#dateRange').submit();
		}
		
	   </script>
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
        <h3 class="page-title"> Hotel Status View <small>Full Hotel  View</small> </h3>
        <ul class="breadcrumb">
                 <li> <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span> </li>
                 <li><a href="#">Hotel Status View</a><span class="divider-last">&nbsp;</span></li>
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
            <h4><i class="icon-reorder"></i>Hotel Status View</h4>
            <span class="tools"> <a href="javascript:;" class="icon-chevron-down"></a> </span> </div>
                 <div class="widget-body">
            <form action="index.php" name="dateRange" id="dateRange" method="post" >
                     <div class="control-group">
                     <label class="control-label">Date Ranges</label>
                     <div class="controls">
                <div class="input-prepend"> <span class="add-on"><i class="icon-calendar"></i></span>
                         <input type="text" class=" m-ctrl-medium date-range" />
						 <input type="hidden" name="starting" id="start" value="" />
						 <input type="hidden" name="ending" id="end" value="" />
						 </div>

					   </div>

                   </form>
            <div class="search-table">
                     <table class="table table-striped table-bordered" id="sample_1">
                <thead>
                         <tr>
                    <th class="hidden-phone">Room #</th>
                    <th class="hidden-phone"># Of Beds</th>
                    <!-- <th class="hidden-phone">5/5/2015</th>
										<th class="hidden-phone">5/6/2015</th>
										<th class="hidden-phone">5/7/2015</th>
										<th class="hidden-phone">5/8/2015</th>
										<th class="hidden-phone">5/11/2015</th>
										<th class="hidden-phone">5/12/2015</th>
										<th class="hidden-phone">5/13/2015</th>
										<th class="hidden-phone">5/14/2015</th>
										<th class="hidden-phone">5/15/2015</th>-->
                    
                    <?php
											
											$datetime1 = date_create($start_date_post);
											$datetime2 = date_create($end_date_post);
											
											$interval = date_diff($datetime1, $datetime2);
											$interval_count = $interval->format('%R%a');
											
											$next_date = $start_date_post;
											
											for($i=0; $i<=$interval_count; $i++)
											{
												$dateRangeArray[] = $next_date;
												echo "<th class='hidden-phone'>{$next_date}</th>";
												$next_date = date('Y-m-d',strtotime("+1 day", strtotime($next_date)));
												
											}
											
										?>
                  </tr>
                       </thead>
                <tbody>
                
                
					<?php
						if($_POST){
								
							$query_totalRooms = "SELECT * from `rooms`";
							$result_totalRooms = mysqli_query($con,$query_totalRooms);
							while($row = mysqli_fetch_assoc($result_totalRooms))
							{
								
								//print_r($row);
								
								$room_id = $row['room_id'];
								$room_no = $row['room_no'];
								$bed_number = $row['bed_no'];
								$room_type = $row['room_type'];

								
								
								echo "<tr class='odd gradeX'>
                                		<td style =' width: 16%;;' class='hidden-phone'>{$room_no}</td>
                                		<td style =' width: 16%;;' class='sum'>{$bed_number}</td>";
									  
								
								/* Checking Rooms at all dates */
									  
								$bookingsArray = array();
								$freeDates = array();
								
								 //$start_date_post = "2015-05-01";
								 //$end_date_post = "2015-05-28";
								
								$start_date_post = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['starting'])));
								$end_date_post = date('Y-m-d ', strtotime(str_replace('-', '/', $_POST['ending'])));
						
								//echo $start_date_post;
								//echo $end_date_post;
								
								$query = "select * from booking where (('{$start_date_post}' between start_date and end_date OR '{$end_date_post}' between start_date and end_date) or (`start_date` > '{$start_date_post}' AND `end_date` < '{$end_date_post}'))  and room_id = '{$room_id}'";
								$result = mysqli_query($con,$query);
								$counter = 0;
								$date = "";
								$totalCount = mysqli_num_rows($result);
								$customerName = "";
								
								/* if  booking available that is count is greateer than 0 */
								
								if($totalCount>0)
								{
								
									while($row = mysqli_fetch_assoc($result))
									{
										$bookingsArray[] = $row;
										$customerName = $row['customer_name'];
										$comment = $row['comment'];
									}
									
									//echo json_encode($bookingsArray) . "<br/>";
									
									/* Handling 0 Index Individually */	
									
									$start_date_zeroIndex = $bookingsArray[0]['start_date'];
									$end_date_zeroIndex = $bookingsArray[0]['end_date'];
									
									/* CALCULATING INTERVAL BETWEEN POSTED START DATE AND FIRST START DATE BOOKING */
									
									$datetime1 = date_create($start_date_post);
									$datetime2 = date_create($start_date_zeroIndex);
									
									$interval = date_diff($datetime1, $datetime2);
									//echo "INTERVAL : " . $interval->format('%R%a days');
									$interval_count = $interval->format('%R%a');
									
									for($k=0; $k<$interval_count; $k++)
									{
										$freeDates[] = $start_date_post;
										$start_date_post = date('Y-m-d',strtotime("+1 day", strtotime($start_date_post)));
									}
									
									
									/* Handling Use Case End dates to make it available if total row = 1 */
									
									if($totalCount==1)
									{
										
										$datetime2 = date_create($end_date_post);
										$datetime1 = date_create($end_date_zeroIndex);
										
										$interval = date_diff($datetime1, $datetime2);
										//echo "INTERVAL : " . $interval->format('%R%a days');
										$interval_count = $interval->format('%R%a');
										
										$end_date_available = $end_date_zeroIndex;
										//$freeDates[] = $end_date_available;
										
										for($k=0; $k<$interval_count; $k++)
										{
											$end_date_available = date('Y-m-d',strtotime("+1 day", strtotime($end_date_available)));
											$freeDates[] = $end_date_available;
										}
									
										
									}
									
									
									
									
									/* All other indexes except 0 index */
									
									for($i=1; $i<count($bookingsArray); $i++)
									{
											$start_date = $bookingsArray[$i]['start_date'];
											$end_date = $bookingsArray[$i]['end_date'];
											$dateIncremented = "";
											
											do
											{
												$end_date_zeroIndex = date('Y-m-d',strtotime("+1 day", strtotime($end_date_zeroIndex)));
												//echo "" . $end_date_zeroIndex . " Index: " . $i . "<br/>";
												$freeDates[] = $end_date_zeroIndex;
											}
											
											while(strtotime(date('Y-m-d',strtotime("+1 day", strtotime($end_date_zeroIndex)))) != strtotime($start_date));
											
											$end_date_zeroIndex = $end_date;
											
											
											/* LAST ROW OF INDEX TILL POSTED END DATE */
											
											if($i==($totalCount-1))
											{
												
												$datetime2 = date_create($end_date_post);
												$datetime1 = date_create($end_date_zeroIndex);
												
												$interval = date_diff($datetime1, $datetime2);
												//echo "INTERVAL end date: " . $interval->format('%R%a days');
												$interval_count = $interval->format('%R%a');
												
												for($k=0; $k<$interval_count; $k++)
												{	
													$end_date_zeroIndex = date('Y-m-d',strtotime("+1 day", strtotime($end_date_zeroIndex)));
													$freeDates[] = $end_date_zeroIndex;
													
												}
												
											}
											
									}
									
									//echo "FreeDates: ";
									json_encode($freeDates);
									//echo "<br/> DatesRangeArray: ";
									json_encode($dateRangeArray);
							}
							
							else   // if total count is 0, populate all freeDates array as available
							{
								
								$datetime1 = date_create($start_date_post);
								$datetime2 = date_create($end_date_post);
								
								$interval = date_diff($datetime1, $datetime2);
								//echo "INTERVAL end date: " . $interval->format('%R%a days');
								$interval_count = $interval->format('%R%a');
								
								
								$freeDate = $start_date_post;
								
								for($k=0; $k<=$interval_count; $k++)
								{	
									$freeDates[] = $freeDate;
									$freeDate = date('Y-m-d',strtotime("+1 day", strtotime($freeDate)));
								}
								
								//echo "FreeDates Array When Index 0: ";
								//print_r($freeDates);
								
							}
								
								
								
								for($i=0; $i<count($dateRangeArray); $i++)
								{
									
									$availableBoolean = false;
									
									for($j=0; $j<count($freeDates); $j++)
									{
										if(strtotime($dateRangeArray[$i]) == strtotime($freeDates[$j]))
										{
											//echo "Date match found: {$freeDates[$j]} <br/>";
											//echo "<td style ='width: 1%;'><button type='button' class='btn btn-primary' value='' />&#10004;</button></td>";
											$availableBoolean = true;
											break;
										}
										else
										{
											//echo "Date not match found: {$freeDates[$j]} <br/>";
											//echo "<td style ='width: 1%;' class='hidden-phone'><a href='#' class='btn popovers btn-danger' data-trigger='hover' data-placement='bottom' data-content='Booked By {$customerName}' data-original-title='Booked'>X</a></td>";
											$availableBoolean = false;
										}
									}
									
									if($availableBoolean == true)
									{
										echo "<td style ='width: 1%;'><button type='button' class='btn btn-primary' value='' />&#10004;</button></td>";
									}
									else
									{
										echo "<td style ='width: 1%;' class='hidden-phone'><a href='#' class='btn popovers btn-danger' data-trigger='hover' data-placement='bottom' data-content='{$comment}' data-original-title='Booked By {$customerName}'>X</a></td>";
									}
								}
								
								echo "</tr>";
								
								
							} // ending while
						}
					?>
                		
                        
                       </tbody>
              </table>
                   </div>
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
<div id="footer"> 2013 &copy; Admin Lab Dashboard.
         <div class="span pull-right"> <span class="go-top"><i class="icon-arrow-up"></i></span> </div>
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
   
	<script>

</script>
</body>
       <!-- END BODY -->
</html>