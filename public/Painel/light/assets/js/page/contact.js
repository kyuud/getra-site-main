"use strict";

// initialize map
var map = new GMaps({
  div: '#map',
  lat: 23.014280,
  lng: 72.532057,
  zoomControl: false,
  fullscreenControl: false,
  mapTypeControl: true,
  mapTypeControlOptions: {
    mapTypeIds: []
  }
});
// Added a overlay to the map
map.drawOverlay({
  lat: 23.014280,
  lng: 72.532057,
  content: '<div class="popover" style="width:250px;"><div class="manual-arrow"><i class="fas fa-caret-down"></i></div><div class="popover-body"><b>Redstar</b><p><small>501, Saman Complex, Mansi Circle., <br>Gandho Road, Satellite 356987</p><p><a target="_blank" href="javascript:if(confirm('http://test.com\n\nThis file was not retrieved because it was filtered out by your project settings.\n\nWould you like to open it from the server?'))window.location='http://test.com'">Website</a></small></p></div></div>'
});
