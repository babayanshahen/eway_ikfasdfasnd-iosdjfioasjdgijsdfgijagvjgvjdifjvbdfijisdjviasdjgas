function initMap(){
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			if($(".lat").val().length > 1){
				var lat = parseFloat($(".lat").val());
				var lng = parseFloat($(".lng").val());
			}else{
				var lat = position.coords.latitude;
				var lng = position.coords.longitude;
			}
            var pos = {

              lat: lat,
              lng: lng
            };
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
	}
	var options = {
		zoom:14
	}
	var map = new google.maps.Map(document.getElementById('map'),options)
	var myloc = new google.maps.Marker({
        clickable: true,
    	shadow: null,
        zIndex: 999,
        map: map
	});

	if($(".lat").val().length > 1){
	myLatlng = new google.maps.LatLng(parseFloat($(".lat").val()),parseFloat($(".lng").val()));
    var marker = new google.maps.Marker({
			map: map,
			draggable: true,
			animation: google.maps.Animation.DROP,
            icon: base_url+'/images/googlenearest.png',
			// title: place.name,
			position: myLatlng
		});
		marker.addListener('dragend', ChangeLatLng);
		function ChangeLatLng(event) {
		    $(".lat").val(event.latLng.lat());
		    $(".lng").val(event.latLng.lng());
		}
	}

	var input = (document.getElementById('pac-input'));
	// var input = (document.getElementById('pac-input').value);
	var searchBox = new google.maps.places.SearchBox((input));
    google.maps.event.addListener(searchBox, 'places_changed', function() {
	var places = searchBox.getPlaces();
		// for (var i = 0, marker; marker = markers[i]; i++) {
		// 	marker.setMap(null);
		// }

    	markers = [];	
	    var bounds = new google.maps.LatLngBounds();
	    var place = null;
	    var viewport = null;
	    // var myLatLng = {lat: -25.363, lng: 131.044};

		// var map = new google.maps.Map(document.getElementById('map'), {
		// 	zoom: 4,
		// 	center: myLatLng
		// });

		// var marker = new google.maps.Marker({
		// 	position: myLatLng,
		// 	map: map,
		// 	title: 'Hello World!'
		// });

	    for (var i = 0; place = places[i]; i++) {
				var image = {
					url: place.icon,
					size: new google.maps.Size(71, 71),
					origin: new google.maps.Point(0, 0),
					anchor: new google.maps.Point(17, 34),
					scaledSize: new google.maps.Size(25, 25)
				};
				var marker = new google.maps.Marker({
					map: map,
					draggable: true,
    				animation: google.maps.Animation.DROP,
                    icon: base_url+'/images/googlenearest.png',
					title: place.name,
					position: place.geometry.location
				});
				$(".lat").val((place.geometry.location.lat()));
				$(".lng").val((place.geometry.location.lng()));
				// console.log(place.geometry.location.lng());
				marker.addListener('click', toggleBounce);
				marker.addListener('dragend', ChangeLatLng);

            function ChangeLatLng(event) {
            		$( ".lat" ).val(event.latLng.lat());
            		$( ".lng" ).val(event.latLng.lng());
					}
			function toggleBounce(event) {
				if (marker.getAnimation() !== null) {
					marker.setAnimation(null);
				}else{
					marker.setAnimation(google.maps.Animation.BOUNCE);
				}
			}
			viewport = place.geometry.viewport;
			markers.push(marker);
			bounds.extend(place.geometry.location);
	    }
      	map.setCenter(bounds.getCenter());

  	});


    google.maps.event.addListener(map, 'bounds_changed', function() {
    var bounds = map.getBounds();
    // $(".lat").val(bounds.f.b);
    // $(".lng").val(bounds.f.f);
    searchBox.setBounds(bounds);
  });
}