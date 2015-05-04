<?php 
	require_once ("funciones/conexiones.php");

 ?>

<!DOCTYPE html>

<html> 
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title></title>
		<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>


		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">

		
		<script>
			var procedure = "new";
			$(document).ready(function(){
				
				

				var num = 1;
				$('#loader').hide();
				$('#Registerform').hide();
				$('#example').dataTable();

				$('#btnnew').click(function(){
					var procedure = "new";
					num = num + 1;
					if (num % 2 == 0){
						$('#Registerform').show();
						$('#btnnew').val("Cancel");
					}
					else
					{
						$('#Registerform').hide();
						$('#btnnew').val("Add new Student");
					}
				});

				$('#btnProcesar').click(function(){
					$('#loader').show();
					var datos = $('#frmRegistrar').serialize();


					if (procedure == "new"){
						$.ajax({
							url: "insert.php",
							type: "POST",
							data: datos,
							success:
								function(r){
									alert(r);
									$('#loader').hide();
									location.reload(true);
								}
						})
					}
					else if (procedure == "editar")
					{
						$.ajax({
							url: "editar.php",
							type: "POST",
							data: datos,
							success:
								function(r){
									alert(r);
									$('#loader').hide();
									location.reload(true);
								}
						})
					}

				});


			});

			function eliminar(Attribute){
				if (confirm("Really remove ...")) {
					//Attribute es igual
					var ced ="Attribute="+Attribute;
					$.ajax({ 
						type: "POST",
						url:"eliminar.php",
						data: ced,
						success:function(respuesta)
								{
									alert(respuesta);
									location.reload(true);
								}
					});
				    
				}	
			}

			function editar(Attribute){
				procedure = "editar";
				var ced ="Attribute="+Attribute;

					$.ajax({ 
						url:"buscarestudiante.php",
						data: ced,
						type: "POST",
						dataType: "json",
						success:
							function(respuesta)
							{
								$('#Registerform').show();
								$('#btnnew').val("Cancelar");

								$('#specification').val(respuesta.ced);
								$('#txtNombres').val(respuesta.nom);
								$('#txtApellidos').val(respuesta.apel);
								$('#txtFechaNac').val(respuesta.fn);
								$('#txtTel').val(respuesta.tel);
								$('#txtDir').val(respuesta.dir);
							
							
							}
					});				
			}
			
		</script>

	</head>
	<body>



<?php 
			$sql = "SELECT Attribute FROM datospersonales";
			$q = mysqli_query( $con, $sql) or die("Problems running the query");

			
			if (!$q){
		        printf("Errormessage: %s\n", mysqli_error($con));
		        trigger_error('Failed to execute the SQL query: ' . mysqli_error($link),E_USER_ERROR);
		    }

 ?>



			<table id="example" class="display dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
				<thead>
					<tr role="row">
						<th rowspan="1" colspan="1">Attribute</th>
						<th rowspan="1" colspan="1"></th>
					</tr>
				</thead>
				<tbody>

					
		<?php 

			while($datos = mysqli_fetch_array($q)){

			?>

					<tr role="row" class="odd">
						<td class="sorting_1"> <?php echo $datos['Attribute']; ?> </td>
						<td>
							<img src="images/reload.png" alt="" style="cursor: pointer;" onclick="editar('<?php echo $datos['Attribute']?>')">
							<img src="images/delete-item.png" alt="" style="cursor: pointer;"  onclick="eliminar('<?php echo $datos['Attribute']?>')">

						</td>
					</tr>
			<?php 

			};

		?>

				</tbody>
				<tfoot>
					<tr>
						<th rowspan="1" colspan="1">Attribute</th>
						<th rowspan="1" colspan="1"></th>
					</tr>
				</tfoot>


			</table>
			<div id="botonnew" align="center">
				<input type="button" id="btnnew" name="btnnew" value="Add new Student">
				
			</div>
			<br>

			<div id="Registerform" align="center">
				<div id="procedure">
				</div>
				<fieldset style="display: inline;">
					<legend>Register new Student</legend>
				
					<form name="frmRegistrar" id="frmRegistrar" action="">
						<table>
							<tr>
								<td>Attribute : </td>
								<td>
									<input type="text" id="specification" name="specification">
								</td>
							</tr>
								<td>
									<input type="button" id="btnProcesar" name="btnProcesar" value="Student process">
								</td>
								<td>
									<input type="reset" name="btnBorrar" id="btnBorrar" value="Clear Form">
								</td>
							</tr>
							
							<tr colspan ="2" align="center">
								<td id="loader">
									<img src="images/loader.gif">
								</td>
							</tr>
							



						</table>
					</form>
				</fieldset>
			</div>
		
	</body>
</html>


