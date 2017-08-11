<?php 
	include_once($_SERVER["DOCUMENT_ROOT"].'/MapsPhp/public/pages/templates/header_template.php');
	include_once($_SERVER["DOCUMENT_ROOT"].'/MapsPhp/app/Controller/posicionesController.php');
 ?>
 <link rel="stylesheet" href="../styles/addPosition.css">
<body>

<div class="container" id="formContainer">
		<div class="row">
			<div class="col-md-6 col-sm-12">

				<form method="post" action="../../app/Controller/posicionesController.php" >

					<div class="form-group row">
						<div class="col-sm-10">
							<input type="number" step=any  class="form-control" name="lat" placeholder="Lat">
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-10">
							<input type="number"  step=any class="form-control" name="lng" id="inputPassword3" placeholder="Lng">
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-secondary" value = "consultar" name="consultar">Send</button>
						</div>
					</div>

				</form>
			</div><!-- End form col -->


			<div class="col-md-6 col-sm-12">
				<h2>Here is the result</h2>
			</div><!-- End result form -->

		</div><!-- </Form row> -->
 </div> <!-- </Form Container>	 -->
</body>
</html>