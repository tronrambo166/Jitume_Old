function myMap() {

//APP.JS
x = navigator.geolocation;
x.getCurrentPosition(success, failure);
}

function success(position){
var myLat = position.coords.latitude;
var myLong = position.coords.longitude;

var coords = new google.maps.LatLng(myLat,myLong);
var mapOptions = {
zoom:10,
center:coords,
//center:new google.maps.LatLng(51.508742,-0.120850),
mapTypeId: google.maps.MapTypeId.ROADMAP
}

var div = $("#googleMap").length;
if(div)
var map = new google.maps.Map(document.getElementById("googleMap"),mapOptions);

addMarkerHome(coords,map);
addMarker({lat:23.7461, lng:90.3742},map);
addMarker({lat:23.8479, lng:90.2577},map);
addMarker({lat:24.2515, lng:89.9198},map);
}

function addMarker(coords,map){
const icon = {
    url: "other_business.png", // url
    scaledSize: new google.maps.Size(60, 30), // scaled size
};

var marker = new google.maps.Marker({
map:map,
position:coords,
title:'$25',
label:'$25',
icon:icon
});
}

function addMarkerHome(coords,map){
const icon = {
    url: "myloc.png", // url
    scaledSize: new google.maps.Size(40, 40), // scaled size
};

var marker = new google.maps.Marker({
map:map,
position:coords,
icon:icon
});
}

function failure(){}

//export{myMap,success,failure,addMarker,addMarkerHome}