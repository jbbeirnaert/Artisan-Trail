function myMap() {
var mapProp= {
    center:new google.maps.LatLng(40.500377, -78.014875),
    zoom:15,
};
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}