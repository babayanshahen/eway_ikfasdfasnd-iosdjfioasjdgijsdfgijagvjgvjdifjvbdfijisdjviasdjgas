$(document).ready(function() {
    var input = (document.getElementById('pac-input'));
    var searchBox = new google.maps.places.SearchBox((input));
    google.maps.event.addListener(searchBox, 'places_changed', function() {
        var places = searchBox.getPlaces();
        var bounds = new google.maps.LatLngBounds();
        var place = null;
        var viewport = null;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16
        });

        for (var i = 0; place = places[i]; i++) {
            var marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                icon: base_url+'/images/googleyou.png',
                title: place.name,
                position: place.geometry.location
            });
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
            bounds.extend(place.geometry.location);
        }
        map.setCenter(bounds.getCenter());
    });
});