<?php
	include_once($_SERVER["DOCUMENT_ROOT"].'/public/templates/header_template.php');
	// include_once($_SERVER["DOCUMENT_ROOT"].'/MapsPhp/app/Controller/posicionesController.php');
?>
<link rel="stylesheet" href="http://localhost/public/styles/styles.css">
<title>Google Maps</title>
</head>
<body>
	<div class="jumbotron ">
		<div class="container text-center">
			<h1 class="display-3">Heat Map By Alex</h1>
			<p class="lead">this is a simple test with google maps api and php</p>
		</div>
	</div>
	<div class="canvas"  id="canvas"></div>

<script type="text/javascript" src="http://localhost/public/js/style.js"></script>
	<!-- Google maps heatmap  -->
<script src ="http://localhost/public/js/initMap.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwvm52-76cpT2a13ykhReOO4WdwgHM_TA&libraries=visualization&callback=initMap"></script>
</body>
</html>