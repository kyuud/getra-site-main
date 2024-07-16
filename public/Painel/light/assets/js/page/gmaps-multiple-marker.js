"use strict";

// initialize map
var map = new GMaps({
  div: '#map',
  lat: 23.078960,
  lng: 72.623013,
  zoom: 8
});
// Added markers to the map
map.addMarker({
  lat: 23.078960,
  lng: 72.623013,
  title: 'Airport',
  infoWindow: {
    content: '<h6>Airport</h6><p>Sardar Vallabhbhai Patel International Airport, <br>Ahmedabad</p><p><a target="_blank" href="javascript:if(confirm('http://example.com\n\nThis file was not retrieved because it was filtered out by your project settings.\n\nWould you like to open it from the server?'))window.location='http://example.com'">Website</a></p>'
  }
});
map.addMarker({
  lat: 22.291343,
  lng: 70.801418,
  title: 'Bus Stop',
  infoWindow: {
    content: '<h6>Bus Stop</h6><p>Rajkot GSRTC Bus Stop</p><p><a target="_blank" href="javascript:if(confirm('https://example.com/\n\nThis file was not retrieved because it was filtered out by your project settings.\n\nWould you like to open it from the server?'))window.location='https://example.com/'">Website</a></p>'
  }
});

map.addMarker({
  lat: 22.322411,
  lng: 73.180935,
  title: 'University',
  infoWindow: {
    content: '<h6>University</h6><p>M S Uni Head Office, Officers Railway Colony, Pratapgunj, Vadodara, Gujarat 390002, India</p><p><a target="_blank" href="javascript:if(confirm('http://example.com/\n\nThis file was not retrieved because it was filtered out by your project settings.\n\nWould you like to open it from the server?'))window.location='http://example.com/'">Website</a></p>'
  }
});
