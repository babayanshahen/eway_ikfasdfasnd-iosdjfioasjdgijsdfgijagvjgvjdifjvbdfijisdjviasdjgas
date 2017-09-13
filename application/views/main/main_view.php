<link href=    "<?=base_url('assets/css/searchdiv.css')?>" rel="stylesheet">
<!-- 
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> -->
<style>
        #map{
            height: 400px;
            border: 2px solid rgba(34, 34, 34, 0.49);
        }
        .input-group-addon{
            background-color: #9fb947;
        }
</style>
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
            <input name="search_product" type="text" ng-model="getProduct" class="form-control" placeholder="Մուտքագրիր այն ինչ քեզ պետք է հիմա" id="inp_search_product">
            <div class="input-group-addon greeen-color" id="search_product">Գտնել</div>
        </div>
        <div id="search_res"  class="list-group pre-scrollable" style="margin-top:24px">
        </div> 
    </div>
    <div class="col-md-12" >
        <div class="img-responsive" id="map" ></div>
    </div>
</div>
<br>
  
<div class="col-md-12">
        <div class="row">
            <div class="col-md-2 col-sm-3">
                <a onclick="ViewAllShop()" href="javascript:void(0)">
                <div class="progress">
                    <div class="progress-value">
                        <img src="<?=base_url('images/icons/shop.png')?>" alt="shops_in-armenia" with="70px" height="70px">
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-2 col-sm-3">
                <div class="progress">
                    <div class="progress-value">
                        <img src="<?=base_url('images/icons/car_wash.png')?>" alt="car_wash NEAR ME" with="80px" height="80px">
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-6">
                <a onclick="" href="javascript:void(0)">
                <div class="progress">
                    <div class="progress-value">
                        <img src="<?=base_url('images/icons/car_technical.png')?>" alt="car_technical_support" with="70px" height="70px">
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-2 col-sm-6">
                <a onclick="" href="javascript:void(0)">
                <div class="progress">
                    <div class="progress-value">
                        <img src="<?=base_url('images/icons/rent_home.png')?>" alt="car_technical_support" with="80px" height="80px">
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-2 col-sm-6">
                <a onclick="" href="javascript:void(0)">
                <div class="progress">
                    <div class="progress-value">
                        <img src="<?=base_url('images/icons/terminal.png')?>" alt="paying now" with="135px" height="135px">
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-2 col-sm-6">
                <a onclick="" href="javascript:void(0)">
                <div class="progress">
                    <div class="progress-value">
                        <img src="<?=base_url('images/icons/hotel.png')?>" alt="hotel armenia now" with="50px" height="50px">
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-2 col-sm-6">
                        <a onclick="" href="javascript:void(0)">
                        <div class="progress">
                            <div class="progress-value">
                                <img src="<?=base_url('images/icons/beauty-salon.png')?>" alt="beuty salon armenia" with="50px" height="50px">
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <a onclick="" href="javascript:void(0)">
                        <div class="progress">
                            <div class="progress-value">
                                <img src="<?=base_url('images/icons/restaurant.png')?>" alt="restaurant near me" with="80px" height="80px">
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <a onclick="" href="javascript:void(0)">
                        <div class="progress">
                            <div class="progress-value">
                                <img src="<?=base_url('images/icons/services.png')?>" alt="services near me" with="80px" height="80px">
                            </div>
                        </div>
                        </a>
                    </div>
            
        </div>
</div>

<?php
            loadJS(array(
                        'statement' =>'statement.js'
                        ),base_url()
            )
        ?>
<script>
    function initMap() {
        var options = {
            zoom: 14,
            center: {lat: -34.397, lng: 150.644},
        }

        var map = new google.maps.Map(document.getElementById('map'), options)

        // var myloc = new google.maps.Marker({
        //     clickable: true,
        //     shadow: null,
        //     zIndex: 999,
        //     map: map
        //     // icon: 'http://localhost/newproject/images/google.png'
        // });

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
                // console.log(event.latLng.lat())
                $( "#search_product" ).trigger( "click" )
                // $.ajax({
                //         type: 'POST',
                //         url: "<?=base_url('main/searchPRoduct ')?>",
                //         dataType: "json",
                //         data: {
                //             'search_product': $("#inp_search_product").val()
                //         },
                    }
                    // marker.addListener('ready', toggleBounce);
                    // marker.addListener('dragged', dragged);
                    google.maps.event.addListener(marker, 'dragend', dragged)
                });
        }


    var gmarkers = [];
    var gdistance = [];
    $(document).ready(function() {
        $("#search_product").click(function() {
                $("#search_res").empty();
            function removeMarkers() {
                for (i = 0; i < gmarkers.length; i++) {
                    gmarkers[i].setMap(null);
                }
            }
            removeMarkers();
            $.ajax({
                type: 'POST',
                url: "<?=base_url('main/searchproduct ')?>",
                dataType: "json",
                data: {
                    'search_product': $("#inp_search_product").val()
                },
                success: function(msg) {
                    $.each(msg, function(key, value) {
                        // console.log(msg);
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
                        var searched_lat = parseFloat(value.e_lat)
                        var searched_lng = parseFloat(value.e_lng)
                        var current_lat = initialLocation.lat()
                        var current_lng = initialLocation.lng()
                        var distance = Math.sqrt(Math.pow(current_lng - searched_lng, 2) + Math.pow(current_lat - searched_lat, 2))
                        var timedistance =  Math.round(distance * 13 /  0.02631798049107498)


                        var infowindow = new google.maps.InfoWindow({
                            content: '<div>Հասցե:  '+value.e_address+'</br>Հեռ:  '+value.e_pnumber +'</br>Գին: '+value.e_product_price +'</br>Մոտավորապես: '+timedistance +' Րոպե</div>'
                        });
                        marker.addListener('click', function() {
                            infowindow.open(map, marker);
                        });
                        
                        gmarkers.push(marker);
                        // var searched_lat = parseFloat(value.e_lat)
                        // var searched_lng = parseFloat(value.e_lng)
                        var current_lat = initialLocation.lat()
                        var current_lng = initialLocation.lng()
                        var distance = Math.sqrt(Math.pow(current_lng - searched_lng, 2) + Math.pow(current_lat - searched_lat, 2))

                        gdistance.push(distance);
                        var timedistance =  Math.round(distance * 13 /  0.02631798049107498)
                        $("#search_res").append(
                        '<div style="margin-top:10px" class="input-group"><span class="input-group-addon" id="basic-addon1" ><span class="glyphicon glyphicon-user"></span></span><input readonly type="text" class="form-control" placeholder="'+value.user_nick+'" aria-describedby="basic-addon1"></div>'+
                        '<div class="input-group"><span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-map-marker"></span></span><input readonly type="text" class="form-control" placeholder="'+value.e_address+'" aria-describedby="basic-addon1"></div>'+
                        '<div class="input-group"><span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-ruble"></span></span><input readonly type="text" class="form-control" placeholder="'+value.e_product_price+'" aria-describedby="basic-addon1"></div>'+
                        '<div class="input-group"><span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-phone"></span></span><input readonly type="text" class="form-control" placeholder="'+value.e_pnumber+'" aria-describedby="basic-addon1"></div>'+
                        '<div class="input-group"><span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-road"></span></span><input readonly type="text" class="form-control" placeholder="Մոտավորապես '+timedistance+' Րոպե  " aria-describedby="basic-addon1"></div>'

                            )
                    });
                }
            });
var gdistance = [];
   // var gdistance = [3 , 6, 2, 56, 32, 5, 89, 32];




        });
    });



    }
    



</script>
 