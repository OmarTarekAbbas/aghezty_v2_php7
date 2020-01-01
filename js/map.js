//map.js

//Set up some of our variables.
var map; //Will contain map object.
var marker = false; ////Has the user plotted their location marker?

//Function called to initialize / create the map.
//This is called when the page has loaded.
function initMap(latitude,longitude) {

    //The center location of our map.
    if(latitude){
        var centerOfMap = new google.maps.LatLng(latitude, longitude);
        var zoom = 13 ;
    }
    else{
        var centerOfMap = new google.maps.LatLng(30.0444, 31.2357);
        var zoom = 9;
    }

    //Map options.
    var options = {
      center: centerOfMap, //Set center.
      zoom: zoom //The zoom value.
    };

    //Create the map object.
    map = new google.maps.Map(document.getElementById('map'), options);

    if(latitude){
      // Create a marker and set its position.
         marker = new google.maps.Marker({
          map: map,
          position: centerOfMap

        });
    }
    //Listen for any clicks on the map.
    google.maps.event.addListener(map, 'click', function(event) {
        //Get the location that the user clicked.
        var clickedLocation = event.latLng;
        //If the marker hasn't been added.
        if(marker === false){
            //Create the marker.
            marker = new google.maps.Marker({
                position: clickedLocation,
                map: map,
                draggable: true //make it draggable
            });
            //Listen for drag events!
            google.maps.event.addListener(marker, 'dragend', function(event){
                markerLocation();
            });
        } else{
            //Marker has already been added, so just change its location.
            marker.setPosition(clickedLocation);
        }
        //Get the marker's location.
        markerLocation();
    });
}

//This function will get the marker's current location and then add the lat/long
//values to our textfields so that we can save the location.
function markerLocation(){
    //Get location.
    var currentLocation = marker.getPosition();
    //Add lat and lng values to a field that we can save.
    document.getElementById('map_value').value = [currentLocation.lat(),currentLocation.lng()]; //latitude
}


//Load the map when the page has finished loading.
//google.maps.event.addDomListener(window, 'load', initMap);
