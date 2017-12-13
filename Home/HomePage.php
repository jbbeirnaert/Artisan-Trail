<div id="googleMap" style="width:50%;height:400px;"></div>
<script>
	function myMap() {
		var mapProp= {
			center:new google.maps.LatLng(40.500377, -78.014875),
			zoom:15,
		};
		var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
	}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxzh5So7f1MobbJBeEnohTYAWdjEq8cYs&callback=myMap"></script>
<!-- We haven't put a lot of data here ! We could imagine to see all the location on the map (we don't have the database access, therefore we haven't done it !) -->