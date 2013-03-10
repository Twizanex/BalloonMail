function initialize() {
	  var myLatlng = new google.maps.LatLng(0, 0);
	  var minZoomLevel = 1;
	  var myOptions = {
	    zoom: minZoomLevel,
	    center: myLatlng,
	    disableDefaultUI: true,
	    disableDoubleClickZoom: false,
	    scaleControl: true,
	    navigationControl: true,
	    draggable: true,
	    scrollwheel: true,
	    streetViewControl: false,
	    mapTypeId: google.maps.MapTypeId.ROADMAP
	      
	  };
	  var map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
	  
	 for (var i = 0; i < mensajes_enviados.length; i++) {
	  setMarkers(map, mensajes_enviados[i], 'A');
	 }
	 for (var i = 0; i < mensajes_recibidos.length; i++) {
	  setMarkers(map, mensajes_recibidos[i], 'B');
	 }
	 
	//Limit the zoom level
	 google.maps.event.addListener(map, 'zoom_changed', function() {
	   if (map.getZoom() < minZoomLevel) map.setZoom(minZoomLevel);
	 });
	 
}

	function setMarkers(map, locations, letter) {
	  // Add markers to the map
		
	  // Marker sizes are expressed as a Size of X,Y
	  // where the origin of the image (0,0) is located
	  // in the top left of the image.

	  // Origins, anchor positions and coordinates of the marker
	  // increase in the X direction to the right and in
	  // the Y direction down.
	  var image = new google.maps.MarkerImage('imagenes/papiro/1/flag' + letter + '.png',
	      // This marker is 20 pixels wide by 32 pixels tall.
	      new google.maps.Size(20, 32),
	      // The origin for this image is 0,0.
	      new google.maps.Point(0,0),
	      // The anchor for this image is the base of the flagpole at 0,32.
	      new google.maps.Point(0, 32));

	 var shadow = new google.maps.MarkerImage('imagenes/papiro/1/shadow.png',
	      // The shadow image is larger in the horizontal dimension
	      // while the position and offset are the same as for the main image.
	      new google.maps.Size(37, 32),
	      new google.maps.Point(0,0),
	      new google.maps.Point(0, 32));
	      // Shapes define the clickable region of the icon.
	      // The type defines an HTML <area> element 'poly' which
	      // traces out a polygon as a series of X,Y points. The final
	      // coordinate closes the poly by connecting to the first
	      // coordinate.
	  var shape = {
	      coord: [1, 1, 1, 20, 18, 20, 18 , 1],
	      type: 'poly'
	  };
	  
	  if (letter == 'A') {
		 var lat = 0;
		 var lon = 0;
	  }else {
		 var lat = 0.05;
		 var lon = 0.05;
	  }
	  
	  var msg = locations;
	    var myLatLng = new google.maps.LatLng((msg[1] + lat ), (msg[2] + lon) );
	    infowindow = null;
	    var infowindow = new google.maps.InfoWindow({
	        content: '<div style="color: black;text-align:center;margin-top: 20px;"> ' + msg[0] + '</div>'
	    });
	    
	    markers = new google.maps.Marker({
	        position: myLatLng,
	        map: map,
	        shadow: shadow,
	        icon: image,
	        shape: shape,
	        title: msg[0],
	        zIndex: msg[3]
	    });
	    
	    google.maps.event.addListener(markers, 'click', function(e) {
	    	infowindow.open(map, this);
	      });
	}