<link href="<?=base_url('assets/css/searchdiv.css')?>" rel="stylesheet">
        
<div class="container">
<div class="row">
    <!-- <div class="col-md-12">
        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
            <input name="search_product" type="text" ng-model="getProduct" class="form-control" placeholder="Մուտքագրիր այն ինչ քեզ պետք է հիմա" id="inp_search_product">
            <div class="input-group-addon greeen-color" id="search_product">Գտնել</div>
        </div>
        <div id="search_res"  class="list-group pre-scrollable" style="margin-top:24px">
        </div> 
    </div> -->
    <div class="col-md-12">
            <p align="center"> ԽՈՐՀՈՒՐԴ Է ՏՐՎՈՒՄ ՄԻԱՑՆԵԼ GPS<span class="glyphicon glyphicon-map-marker"></span> ՀԱՄԱԿԱՐԳԸ </p>
            <a href="<?=base_url('main/about')?>"><p align="center"> ԻՄԱՆԱԼ ԿԱՅՔԻ ՄԱՍԻՆ ՄԱՆՐԱՄԱՍՆ</p> </a>
            <a href="<?=base_url('log/reg')?>"><p align="center"> ՄԻԱՑԻՐ ՄԵԶ ԵՎ ՏԵՂԵԿԱՑՐՈՒ ՔՈ  ՄԱՍԻՆ</p> </a>
    </div>
    <div class="col-md-12" >
        <div class="img-responsive" id="map" ></div>
    </div>
</div>
<br>
  
<div class="col-md-12">
        <div class="row">
            <div class="col-md-2 col-sm-3">
                <a href="javascript:void(0)" id="searchshop" onclick="scrolltop()">
                <div class="progress">
                    <div class="progress-value">
                        <img src="<?=base_url('images/icons/shop.png')?>" alt="shops_in-armenia" with="70px" height="70px">
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-2 col-sm-3" >
                <a href="javascript:void(0)" id="searchhotel" onclick="scrolltop()">
                <div class="progress">
                    <div class="progress-value">
                        <img src="<?=base_url('images/icons/hotel.png')?>" alt="hotel armenia now" with="50px" height="50px">
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-2 col-sm-3">
                        <a href="javascript:void(0)" id="searchsalon" onclick="scrolltop()">
                        <div class="progress">
                            <div class="progress-value">
                                <img src="<?=base_url('images/icons/beauty-salon.png')?>" alt="beuty salon armenia" with="100px" height="100px">
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-2 col-sm-3">
                        <a href="javascript:void(0)" id="searchrestorant" onclick="scrolltop()">
                        <div class="progress">
                            <div class="progress-value">
                                <img src="<?=base_url('images/icons/restaurant.png')?>" alt="restaurant near me" with="80px" height="80px">
                            </div>
                        </div>
                        </a>
                    </div>
            <div class="col-md-2 col-sm-3">
                <a href="javascript:void(0)" id="searchrenthome" onclick="scrolltop()">
                <div class="progress">
                    <div class="progress-value">
                        <img src="<?=base_url('images/icons/rent_home.png')?>" alt="rent home" with="80px" height="80px">
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-2 col-sm-3">
                <a href="javascript:void(0)" id="searchterminal" onclick="scrolltop()">
                <div class="progress">
                    <div class="progress-value">
                        <img src="<?=base_url('images/icons/terminal.png')?>" alt="paying now" with="135px" height="135px">
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-2 col-sm-3">
                <a href="javascript:void(0)" id="searchcarwash" onclick="scrolltop()">
                    <div class="progress">
                        <div class="progress-value">
                            <img src="<?=base_url('images/icons/car_wash.png')?>" alt="car_wash NEAR ME" with="80px" height="80px">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-2 col-sm-3">
                <a href="javascript:void(0)" id="searchpharmacy" onclick="scrolltop()">
                <div class="progress">
                    <div class="progress-value">
                        <img src="<?=base_url('images/icons/pharmacy.png')?>" alt="pharmacy" with="70px" height="70px">
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-2 col-sm-3">
                <a href="javascript:void(0)" id="searchcharge" onclick="scrolltop()">
                <div class="progress">
                    <div class="progress-value">
                        <img src="<?=base_url('images/icons/gazpetrol.png')?>" alt="gaz petrol near me" with="80px" height="80px">
                    </div>
                </div>
                </a>
            </div>
            
        </div>
</div>
<script>
    function scrolltop() {
        var body = $("html, body");
        body.stop().animate({
            scrollTop: 110
        }, 500, 'swing', function() {

        });
    }
    function initMap() {
        var options = {
            zoom: 14,
            // center: {lat: -34.397, lng: 150.644},
        }

        var map = new google.maps.Map(document.getElementById('map'), options)

        // var myloc = new google.maps.Marker({
        //     clickable: true,
        //     shadow: null,
        //     zIndex: 999,
        //     map: map
        //     // icon: 'http://localhost/newproject/images/google.png'
        // });

            // var dr_lat = '';
            // var dr_lng = '';
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                map.setCenter(initialLocation);
                var marker = new google.maps.Marker({
                position: initialLocation,
                map: map,
                draggable: true,
                icon: "<?=base_url("images/googleyou.png")?>",
                animation: google.maps.Animation.DROP
                // title: 'Hello World!'
            });
            function dragged(event) {
                // dr_lat = event.latLng.lat()
                // dr_lng = event.latLng.lng()
                initialLocation = new google.maps.LatLng(event.latLng.lat(), event.latLng.lng());

                // $( "#search_product" ).trigger( "click" )
                // $.ajax({
                //         type: 'POST',
                //         url: "<?=base_url('main/searchPRoduct ')?>",
                //         dataType: "json",
                //         data: {
                //             'search_product': $("#inp_search_product").val()
                //         },
                    }
                    // marker.addListener('ready', toggleBounce);
                    marker.addListener('dragged', dragged);
                    google.maps.event.addListener(marker, 'dragend', dragged)
                });
        }
    // var markers = [];
    // function deleteOldMarkers(){
    //     for (i = 0; i < markers.length; i++) {
    //         markers[i].setMap(null);
    //     }
    // }
    markers = [];
    $(document).ready(function() {
        $("#searchshop").click(function() {
        bounds  = new google.maps.LatLngBounds();
        // bounds.extend(
        //     new google.maps.LatLng(initialLocation.latLng.lat(), initialLocation.latLng.lng())
        // );
        // console.l(initialLocation.latLng.lng());
        for (i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
            $.ajax({
                url: "<?=base_url('main/searcshop ')?>",
                dataType: "json",
                success: function(data) {
                    $.each(data, function(key, value) {
                        var marker = new google.maps.Marker({
                            clickable: true,
                            // draggable: true,
                            animation: google.maps.Animation.DROP,
                            shadow: true,
                            icon: "<?='images/googlenearest.png'?>",
                            position: {
                                lat: parseFloat(value.e_lat),
                                lng: parseFloat(value.e_lng)
                            },
                            map: map
                        });
                        markers.push(marker);
                        bounds.extend(
                            new google.maps.LatLng(marker.position.lat(), marker.position.lng())
                        );
                        map.fitBounds(bounds);
                        map.panToBounds(bounds);
                        if(value.e_24hour !== 'ON'){
                            var e_24hour = value.e_time_1+' - '+value.e_time_2
                        }else{
                            var e_24hour = 'Շուրջօրյա'
                        }
                        var infowindow = new google.maps.InfoWindow({
                            content: 
                            '<div>Անվանում - <span>'+value.e_shop_name+'</span></div>'+
                            '<div>Տեսակ - <span>'+value.as_shop_type+'</span></div>'+
                            '<div>Աշխ.Ժամ - <span>'+e_24hour+'</span></div>'
                        });
                        marker.addListener('click', function() {
                            infowindow.open(map, marker);
                        });
                    })
                }
            })
        });

        $("#searchhotel").click(function() {
        bounds  = new google.maps.LatLngBounds();
            for (i = 0; i < markers.length; i++) {
               markers[i].setMap(null);
            }
            $.ajax({
                url: "<?=base_url('main/searchotel')?>",
                dataType: "json",
                success: function(data) {
                    $.each(data, function(key, value) {
                        var marker = new google.maps.Marker({
                            clickable: true,
                            // draggable: true,
                            animation: google.maps.Animation.DROP,
                            shadow: true,
                            icon: "<?=base_url('images/googlenearest.png')?>",
                            position: {
                                lat: parseFloat(value.e_lat),
                                lng: parseFloat(value.e_lng)
                            },
                            map: map
                        });
                        markers.push(marker);
                        bounds.extend(
                            new google.maps.LatLng(marker.position.lat(), marker.position.lng())
                        );
                        map.fitBounds(bounds);
                        map.panToBounds(bounds);
                        var infowindow = new google.maps.InfoWindow({
                            content: '<div>Տեսակ - <span>' + value.e_hotel_name + '</span></div>' +
                                '<div>Հասցե - <span>' + value.e_address + '</span></div>' +
                                '<div>Հեռ - <span>' + value.e_pnumber + '</span></div>' 
                        });
                        marker.addListener('click', function() {
                            infowindow.open(map, marker);
                        });
                    })
                }
            })
        });
        $("#searchsalon").click(function() {
        bounds  = new google.maps.LatLngBounds();
            for (i = 0; i < markers.length; i++) {
               markers[i].setMap(null);
            }
            $.ajax({
                url: "<?=base_url('main/searchsalon')?>",
                dataType: "json",
                success: function(data) {
                    $.each(data, function(key, value) {
                        var marker = new google.maps.Marker({
                            clickable: true,
                            // draggable: true,
                            animation: google.maps.Animation.DROP,
                            shadow: true,
                            icon: "<?=base_url('images/googlenearest.png')?>",
                            position: {
                                lat: parseFloat(value.e_lat),
                                lng: parseFloat(value.e_lng)
                            },
                            map: map
                        });
                        markers.push(marker);
                        bounds.extend(
                            new google.maps.LatLng(marker.position.lat(), marker.position.lng())
                        );
                        map.fitBounds(bounds);
                        map.panToBounds(bounds);
                        var infowindow = new google.maps.InfoWindow({
                            content: '<div>Անվանում - <span>' + value.e_salon_name + '</span></div>' +
                                '<div>Հասցե - <span>' + value.e_address + '</span></div>' +
                                '<div>Հեռ - <span>' + value.e_pnumber + '</span></div>' 
                        });
                        marker.addListener('click', function() {
                            infowindow.open(map, marker);
                        });
                    })
                }
            })
        });
        $("#searchrestorant").click(function() {
        bounds  = new google.maps.LatLngBounds();
            for (i = 0; i < markers.length; i++) {
               markers[i].setMap(null);
            }
            $.ajax({
                url: "<?=base_url('main/searchrest')?>",
                dataType: "json",
                success: function(data) {
                    $.each(data, function(key, value) {
                        var marker = new google.maps.Marker({
                            clickable: true,
                            // draggable: true,
                            animation: google.maps.Animation.DROP,
                            shadow: true,
                            icon: "<?='images/googlenearest.png'?>",
                            position: {
                                lat: parseFloat(value.e_lat),
                                lng: parseFloat(value.e_lng)
                            },
                            map: map
                        });
                        markers.push(marker);
                        bounds.extend(
                            new google.maps.LatLng(marker.position.lat(), marker.position.lng())
                        );
                        map.fitBounds(bounds);
                        map.panToBounds(bounds);                        
                        var infowindow = new google.maps.InfoWindow({
                            content: '<div>Անվանում - <span>' + value.e_name + '</span></div>' +
                                '<div>Հասցե - <span>' + value.e_address + '</span></div>' +
                                '<div>Հեռ - <span>' + value.e_pnumber + '</span></div>' 
                        });
                        marker.addListener('click', function() {
                            infowindow.open(map, marker);
                        });
                    })
                }
            })
        });

        $("#searchrenthome").click(function() {
        bounds  = new google.maps.LatLngBounds();
            for (i = 0; i < markers.length; i++) {
               markers[i].setMap(null);
            }
            $.ajax({
                url: "<?=base_url('main/searchhome')?>",
                dataType: "json",
                success: function(data) {
                    $.each(data, function(key, value) {
                        var marker = new google.maps.Marker({
                            clickable: true,
                            // draggable: true,
                            animation: google.maps.Animation.DROP,
                            shadow: true,
                            icon: "<?='images/googlenearest.png'?>",
                            position: {
                                lat: parseFloat(value.e_lat),
                                lng: parseFloat(value.e_lng)
                            },
                            map: map
                        });
                        markers.push(marker);
                        bounds.extend(
                            new google.maps.LatLng(marker.position.lat(), marker.position.lng())
                        );
                        map.fitBounds(bounds);
                        map.panToBounds(bounds);
                        if(value.e_rent_type == 'shenq'){
                            var htype = 'Շենք'
                        }else if(value.e_rent_type == 'sepakan'){
                            var htype = 'Սեփական Բնակարան'
                        }
                        var infowindow = new google.maps.InfoWindow({
                            content: '<div>Տեսակ - <span>' + htype + '</span></div>' +
                                '<div>Գին - <span>' + value.e_rent_price + '</span></div>' +
                                '<div>Հասցե - <span>' + value.e_address + '</span></div>' +
                                '<div>Հեռ - <span>' + value.e_rent_pnumber + '</span></div>' 
                        });
                        marker.addListener('click', function() {
                            infowindow.open(map, marker);
                        });
                    })
                }
            })
        });

        $("#searchterminal").click(function() {
        bounds  = new google.maps.LatLngBounds();
            for (i = 0; i < markers.length; i++) {
               markers[i].setMap(null);
            }
            $.ajax({
                url: "<?=base_url('main/searchterminal')?>",
                dataType: "json",
                success: function(data) {
                    $.each(data, function(key, value) {
                        var marker = new google.maps.Marker({
                            clickable: true,
                            animation: google.maps.Animation.DROP,
                            shadow: true,
                            icon: "<?='images/googlenearest.png'?>",
                            position: {
                                lat: parseFloat(value.e_lat),
                                lng: parseFloat(value.e_lng)
                            },
                            map: map
                        });
                        markers.push(marker);
                        bounds.extend(
                            new google.maps.LatLng(marker.position.lat(), marker.position.lng())
                        );
                        map.fitBounds(bounds);
                        map.panToBounds(bounds);
                        if(value.e_24hour == 'ON'){
                            var ashx = 'Շուրջօրյա';
                        }else{
                            var ashx = value.e_time_1+'-ից '+value.e_time_1 ;
                        }
                        var infowindow = new google.maps.InfoWindow({
                            content: 
                                '<div>Տեսակ - <span>' + value.e_type + '</span></div>' +
                                '<div>Հասցե - <span>' + value.e_address + '</span></div>'+
                                '<div>Աշխ.Ժամ - <span>' + ashx + '</span></div>'
                        });
                        marker.addListener('click', function() {
                            infowindow.open(map, marker);
                        });
                    })
                }
            })
        });

        $("#searchcarwash").click(function() {  
        bounds  = new google.maps.LatLngBounds();
            for (i = 0; i < markers.length; i++) {
               markers[i].setMap(null);
            }
            $.ajax({
                url: "<?=base_url('main/searchcarwash')?>",
                dataType: "json",
                success: function(data) {
                    $.each(data, function(key, value) {
                        var marker = new google.maps.Marker({
                            clickable: true,
                            // draggable: true,
                            animation: google.maps.Animation.DROP,
                            shadow: true,
                            icon: "<?='images/googlenearest.png'?>",
                            position: {
                                lat: parseFloat(value.e_lat),
                                lng: parseFloat(value.e_lng)
                            },
                            map: map
                        });
                        markers.push(marker);
                        bounds.extend(
                            new google.maps.LatLng(marker.position.lat(), marker.position.lng())
                        );
                        map.fitBounds(bounds);
                        map.panToBounds(bounds);                        
                        if(value.e_24hour !== 'ON'){
                            var e_24hour = value.e_time_1+' - '+value.e_time_2
                        }else{
                            var e_24hour = 'Շուրջօրյա'
                        }
                        var infowindow = new google.maps.InfoWindow({
                            content:
                                '<div>Անվանում - <span>' + value.e_name + '</span></div>' +
                                '<div> Աշխ.Ժամ - <span>' + e_24hour + '</span></div>' +
                                '<div>Հասցե - <span>' + value.e_address + '</span></div>'
                        });
                        marker.addListener('click', function() {
                            infowindow.open(map, marker);
                        });
                    })
                }
            })
        });

        //Pharmacy
        $("#searchpharmacy").click(function() { 
        bounds  = new google.maps.LatLngBounds();
            for (i = 0; i < markers.length; i++) {
               markers[i].setMap(null);
            }
            $.ajax({
                url: "<?=base_url('main/searchpharmacy')?>",
                dataType: "json",
                success: function(data) {
                    $.each(data, function(key, value) {
                        var marker = new google.maps.Marker({
                            clickable: true,
                            // draggable: true,
                            animation: google.maps.Animation.DROP,
                            shadow: true,
                            icon: "<?='images/googlenearest.png'?>",
                            position: {
                                lat: parseFloat(value.e_lat),
                                lng: parseFloat(value.e_lng)
                            },
                            map: map
                        });
                        markers.push(marker);
                        bounds.extend(
                            new google.maps.LatLng(marker.position.lat(), marker.position.lng())
                        );
                        map.fitBounds(bounds);
                        map.panToBounds(bounds);                        
                        if(value.e_24hour !== 'ON'){
                            var e_24hour = value.e_time_1+' - '+value.e_time_2
                        }else{
                            var e_24hour = 'Շուրջօրյա'
                        }
                        var infowindow = new google.maps.InfoWindow({
                            content:
                                '<div>Անվանում - <span>' + value.e_name + '</span></div>' +
                                '<div> Աշխ.Ժամ - <span>' + e_24hour + '</span></div>' +
                                '<div>Հասցե - <span>' + value.e_address + '</span></div>'
                        });
                        marker.addListener('click', function() {
                            infowindow.open(map, marker);
                        });
                    })
                }
            })
        });

        //charge
        $("#searchcharge").click(function() { 
        bounds  = new google.maps.LatLngBounds();
            for (i = 0; i < markers.length; i++) {
               markers[i].setMap(null);
            }
            $.ajax({
                url: "<?=base_url('main/searchcharge')?>",
                dataType: "json",
                success: function(data) {
                    $.each(data, function(key, value) {
                        var marker = new google.maps.Marker({
                            clickable: true,
                            // draggable: true,
                            animation: google.maps.Animation.DROP,
                            shadow: true,
                            icon: "<?='images/googlenearest.png'?>",
                            position: {
                                lat: parseFloat(value.e_lat),
                                lng: parseFloat(value.e_lng)
                            },
                            map: map
                        });
                        markers.push(marker);
                        bounds.extend(
                            new google.maps.LatLng(marker.position.lat(), marker.position.lng())
                        );
                        map.fitBounds(bounds);
                        map.panToBounds(bounds);                        
                        if(value.e_type_of_charge == 'petrol'){
                            var charge_type = 'ԲԵնզալցակայան'
                        }else{
                            var charge_type = 'Գազալցակայան'
                        }
                        var infowindow = new google.maps.InfoWindow({
                            content:
                                '<div>Նկարագրություն - <span>' + value.e_name + '</span></div>' +
                                '<div> Տեսակ- <span>' + charge_type + '</span></div>' +
                                '<div>Հասցե - <span>' + value.e_address + '</span></div>'
                        });
                        marker.addListener('click', function() {
                            infowindow.open(map, marker);
                        });
                    })
                }
            })
        });        
    })
    }

</script>
 