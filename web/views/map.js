
// function to initiallize map.(
function initMap() {
    //location for the map to open. fair for center.
    var fairLoc = {lat: 32.395958,lng: -81.753546};
    //creates a google map with fair location.
    var map = new google.maps.Map(document.getElementById("map"), {zoom: 17, center: fairLoc,  mapTypeId: 'satellite'});
    //gives the map a listener to when someone clicks to add a marker.
    map.addListener('click', function(e) {
    //prompts the user to enter a name for the location.
    var name = prompt('Location name:');
    //this calls the function that add Marker to the map.
    addMarker(e.latLng, map, name);
    });

    //will need code to get position and name from database.
    //addMarker(latLng, map, name); --this is the function you will need ones information is pulled.
}

//function to add markers to map.(latLng needs to be saved to the database with name)
function addMarker(latLng, map, name) {

    //places a marker with location fom click.
    var marker = new google.maps.Marker({
    position: latLng,
    map: map,
    draggable: true
});
    //moves center of map to the new marker.
    map.panTo(latLng);
    //adds an info window to the marker. gives the location a name.
    marker.info = new google.maps.InfoWindow({
    content: '<h2>' + name + '</h2>'
    });

    //this is an event listener for double clicking a marker.
    google.maps.event.addListener(marker, 'dblclick', function() {
    //prompts user to change name of marker. (this will need to be saved when changed.)
    name = prompt('Location Name:')
    marker.info.setContent('<h2>' + name + '</h2>');
    });

    //event listener to right click to delete marker.
    google.maps.event.addListener(marker, 'rightclick', function() {
    //if user says okay to prompt, marker will be deleted.
    if(confirm("Do you want to delete marker?"))
        marker.setMap(null);
        //code to remove marker form database.
    });

    //mouseover marker info window pops up.
    google.maps.event.addListener(marker, 'mouseover', function() {
    marker.info.open(map, marker);
    });

    //moveout marker to close info window.
    google.maps.event.addListener(marker, 'mouseout', function() {
    marker.info.close(map, marker);
    });
}