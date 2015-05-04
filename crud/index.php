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
						$('#btnnew').val("Cancelar");
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

			function eliminar(cedula){
				if (confirm("Really remove ...")) {
					//Cedula es igual
					var ced ="cedula="+cedula;
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

			function editar(cedula){
				procedure = "editar";
				var ced ="cedula="+cedula;

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

								$('#txtCedula').val(respuesta.ced);
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
			$sql = "SELECT CEDULA, NOMBRES, APELLIDOS, FECHA_NAC, TEL, DIR FROM datospersonales";
			$q = mysqli_query( $con, $sql) or die("Problems running the query");

			
			if (!$q){
		        printf("Errormessage: %s\n", mysqli_error($con));
		        trigger_error('Failed to execute the SQL query: ' . mysqli_error($link),E_USER_ERROR);
		    }

 ?>



			<table id="example" class="display dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
				<thead>
					<tr role="row">
						<th rowspan="1" colspan="1">Cedula</th>
						<th rowspan="1" colspan="1">Nombres</th>
						<th rowspan="1" colspan="1">Apellidos</th>
						<th rowspan="1" colspan="1">Fecha De Nacimiento</th>
						<th rowspan="1" colspan="1">Telefono</th>
						<th rowspan="1" colspan="1">Direccion</th>
						<th rowspan="1" colspan="1"></th>
					</tr>
				</thead>
				<tbody>

					
		<?php 

			while($datos = mysqli_fetch_array($q)){

			?>

					<tr role="row" class="odd">
						<td class="sorting_1"> <?php echo $datos['CEDULA']; ?> </td>
						<td><?php echo $datos['NOMBRES']; ?></td>
						<td><?php echo $datos['APELLIDOS']; ?></td>
						<td><?php echo $datos['FECHA_NAC']; ?></td>
						<td><?php echo $datos['TEL']; ?></td>
						<td><?php echo $datos['DIR']; ?></td>
						<td>
							<img src="images/reload.png" alt="" style="cursor: pointer;" onclick="editar('<?php echo $datos['CEDULA']?>')">
							<img src="images/delete-item.png" alt="" style="cursor: pointer;"  onclick="eliminar('<?php echo $datos['CEDULA']?>')">

						</td>
					</tr>
			<?php 

			};

		?>

				</tbody>
				<tfoot>
					<tr>
						<th rowspan="1" colspan="1">Cedula</th>
						<th rowspan="1" colspan="1">Nombres</th>
						<th rowspan="1" colspan="1">Apellidos</th>
						<th rowspan="1" colspan="1">Fecha De Nacimiento</th>
						<th rowspan="1" colspan="1">Telefono</th>
						<th rowspan="1" colspan="1">Direccion</th>
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
					<legend>Registrar new Estudiante</legend>
				
					<form name="frmRegistrar" id="frmRegistrar" action="">
						<table>
							<tr>
								<td>Cedula : </td>
								<td>
									<input type="text" id="txtCedula" name="txtCedula">
								</td>
							</tr>
							<tr>
								<td>Nombres : </td>
								<td>
									<input type="text" id="txtNombres" name="txtNombres">
								</td>
							</tr>
							<tr>
								<td>Apellidos : </td>
								<td>
									<input type="text" id="txtApellidos" name="txtApellidos">
								</td>
							</tr>
							<tr>
								<td>Fecha de Nacimiento : </td>
								<td>
									<input type="text" id="txtFechaNac" name="txtFechaNac">
								</td>
							</tr>
							<tr>
								<td>Telefono : </td>
								<td>
									<input type="text" id="txtTel" name="txtTel">
								</td>
							</tr>
							<tr>
								<td>Direccion : </td>
								<td>
									<input type="text" id="txtDir" name="txtDir">
								</td>
							</tr>
							<tr>
								<td>
									<input type="button" id="btnProcesar" name="btnProcesar" value="Procesar Estudiante">
								</td>
								<td>
									<input type="reset" name="btnBorrar" id="btnBorrar" value="Borrar Formulario">
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


