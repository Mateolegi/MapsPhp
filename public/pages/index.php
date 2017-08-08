<?php 
	include_once('templates/header_template.php');
?>
<link rel="stylesheet" href="../styles/styles.css">
 <title>Lorem ipsum.</title> 
</head>
<body>

	<div class="jumbotron ">
		<div class="container text-center">
			<h1 class="display-3">Heat Map by Google</h1>
			<p class="lead">this is a simple test with google maps api and php</p>
		</div>
	</div>
	<div class="canvas"  id="canvas"></div>


<script type="text/javascript" src="../js/style.js"></script>
<!-- Google maps heatmap  -->
<script>
	function initMap(){
		var centerMap = new google.maps.LatLng(6.2003848,-75.5717294,16.54);
		var map = new google.maps.Map(document.getElementById("canvas"), {
			center:centerMap,
			zoom:16,
			styles: style.blue_color,
			scrollwheel: false
		});

		var marker = new google.maps.Marker({
			position: centerMap,
			map:map,
			title:"this is it"
		})

		marker.setAnimation(google.maps.Animation.BOUNCE);
	}
</script>

<script type="text/javascript"		
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwvm52-76cpT2a13ykhReOO4WdwgHM_TA&libraries=visualization&callback=initMap">
</script>	
</body>
</html>