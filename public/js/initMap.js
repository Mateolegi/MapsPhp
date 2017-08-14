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