$(document).ready(function() {
    var input = (document.getElementById('pac-input'));
    var searchBox = new google.maps.places.SearchBox((input));
    google.maps.event.addListener(searchBox, 'places_changed', function() {
        var places = searchBox.getPlaces();
        // for (var i = 0, marker; marker = markers[i]; i++) {
        //   marker.setMap(null);
        // }
        // markers = [];
        var bounds = new google.maps.LatLngBounds();
        var place = null;
        var viewport = null;
        // var myLatLng = {lat: -25.363, lng: 131.044};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16
        });

        // var marker = new google.maps.Marker({
        //   position: myLatLng,
        //   map: map,
        //   title: 'Hello World!'
        // });

        for (var i = 0; place = places[i]; i++) {
            // var image = {
            //     url: place.icon,
            //     size: new google.maps.Size(71, 71),
            //     origin: new google.maps.Point(0, 0),
            //     anchor: new google.maps.Point(17, 34),
            //     scaledSize: new google.maps.Size(25, 25)
            // };
            var marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                icon: 'http://localhost/newproject/images/googleyou.png',
                title: place.name,
                position: place.geometry.location
            });
            // console.log(places.formatted_address);
            // console.log(places.geometry.lat());
            // console.log(place.geometry.location.lat());
            $(".my_lat").val((place.geometry.location.lat()));
            $(".my_lng").val((place.geometry.location.lng()));
            // console.log(place.geometry.location.lng());
            marker.addListener('click', toggleBounce);
            marker.addListener('dragend', ChangeLatLng);

            function ChangeLatLng(event) {
                $(".my_lat").val(event.latLng.lat());
                $( ".my_lng" ).val(event.latLng.lng());
            }

            function toggleBounce(event) {
                if (marker.getAnimation() !== null) {
                    marker.setAnimation(null);
                } else {
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                }
            }
            // console.log(marker.position.lat());
            // console.log(marker.position.lng());
            // viewport = place.geometry.viewport;
            // markers.push(marker);
            bounds.extend(place.geometry.location);
        }

        map.setCenter(bounds.getCenter());
    });
});