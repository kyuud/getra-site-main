"use strict";

// initialize map
var map = new GMaps({
  div: '#map',
  lat: 23.078960,
  lng: 72.623013
});
// Added a marker to the map
map.addMarker({
  lat: 23.078960,
  lng: 72.623013,
  title: 'Airport',
  infoWindow: {
    content: '<h6>Airport</h6><p>Sardar Vallabhbhai Patel International Airport, <br>Ahmedabad</p><p><a target="_blank" href="javascript:if(confirm('http://example.com\n\nThis file was not retrieved because it was filtered out by your project settings.\n\nWould you like to open it from the server?'))window.location='http://example.com'">Website</a></p>'
  }
});
