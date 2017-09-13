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
    <div class="col-md-12" >
        <div class="img-responsive" id="map" ></div>
    </div>
</div>
<br>
  
<div class="col-md-12">
        <div class="row">
            <div class="col-md-2 col-sm-3">
                <a href="javascript:void(0)" id="searchshop">
                <div class="progress">
                    <div class="progress-value">
                        <img src="<?=base_url('images/icons/shop.png')?>" alt="shops_in-armenia" with="70px" height="70px">
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-2 col-sm-3">
                <a onclick="" href="javascript:void(0)">
                <div class="progress">
                    <div class="progress-value">
                        <img src="<?=base_url('images/icons/hotel.png')?>" alt="hotel armenia now" with="50px" height="50px">
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-2 col-sm-3">
                        <a onclick="" href="javascript:void(0)">
                        <div class="progress">
                            <div class="progress-value">
                                <img src="<?=base_url('images/icons/beauty-salon.png')?>" alt="beuty salon armenia" with="50px" height="50px">
                            </div>
                        </div>
                        </a>
                    </div>
                    <div class="col-md-2 col-sm-3">
                        <a onclick="" href="javascript:void(0)">
                        <div class="progress">
                            <div class="progress-value">
                                <img src="<?=base_url('images/icons/restaurant.png')?>" alt="restaurant near me" with="80px" height="80px">
                            </div>
                        </div>
                        </a>
                    </div>
            <div class="col-md-2 col-sm-3">
                <a onclick="" href="javascript:void(0)">
                <div class="progress">
                    <div class="progress-value">
                        <img src="<?=base_url('images/icons/rent_home.png')?>" alt="car_technical_support" with="80px" height="80px">
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-2 col-sm-3">
                <a onclick="" href="javascript:void(0)">
                <div class="progress">
                    <div class="progress-value">
                        <img src="<?=base_url('images/icons/terminal.png')?>" alt="paying now" with="135px" height="135px">
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
            <div class="col-md-2 col-sm-3">
                <a onclick="" href="javascript:void(0)">
                <div class="progress">
                    <div class="progress-value">
                        <img src="<?=base_url('images/icons/car_technical.png')?>" alt="car_technical_support" with="70px" height="70px">
                    </div>
                </div>
                </a>
            </div>
                    <div class="col-md-2 col-sm-3">
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
                    // console.log(dr_lat);

                // $( "#search_product" ).trigger( "click" )
                // $.ajax({
                //         type: 'POST',
                //         url: "<?=base_url('main/searchPRoduct ')?>",
                //         dataType: "json",
                //         data: {
                //             'search_product': $("#inp_search_product").val()
                //         },
                    }
                    // console.log(dr_lat);
                    // marker.addListener('ready', toggleBounce);
                    marker.addListener('dragged', dragged);
                    google.maps.event.addListener(marker, 'dragend', dragged)
                });
        }
    $(document).ready(function() {
        $("#searchshop").click(function() {
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
                        console.log(value)
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
    })
    // $(document).ready(function() {
    //     $("#search_product").click(function() {

    //     });
    // });

    // var gmarkers = [];
    // var gdistance = [];
//     $(document).ready(function() {
//         $("#search_product").click(function() {
//                 $("#search_res").empty();
//             function removeMarkers() {
//                 for (i = 0; i < gmarkers.length; i++) {
//                     gmarkers[i].setMap(null);
//                 }
//             }
//             removeMarkers();
//             $.ajax({
//                 type: 'POST',
//                 url: "<?=base_url('main/searchproduct ')?>",
//                 dataType: "json",
//                 data: {
//                     'search_product': $("#inp_search_product").val()
//                 },
//                 success: function(msg) {
//                     $.each(msg, function(key, value) {
//                         // console.log(msg);
//                         var marker = new google.maps.Marker({
//                             clickable: true,
//                             // draggable: true,
//                             animation: google.maps.Animation.DROP,
//                             shadow: true,
//                             icon: "<?='images/googlenearest.png'?>",
//                             position: {
//                                 lat: parseFloat(value.e_lat),
//                                 lng: parseFloat(value.e_lng)
//                             },
//                             map: map
//                         });
//                         var searched_lat = parseFloat(value.e_lat)
//                         var searched_lng = parseFloat(value.e_lng)
//                         var current_lat = initialLocation.lat()
//                         var current_lng = initialLocation.lng()
//                         // console.log(current_lat);
//                         var distance = Math.sqrt(Math.pow(current_lng - searched_lng, 2) + Math.pow(current_lat - searched_lat, 2))
//                         var timedistance =  Math.round(distance * 13 /  0.02631798049107498)


//                         var infowindow = new google.maps.InfoWindow({
//                             content: '<div>Հասցե:  '+value.e_address+'</br>Հեռ:  '+value.e_pnumber +'</br>Գին: '+value.e_product_price +'</br>Մոտավորապես: '+timedistance +' Րոպե</div>'
//                         });
//                         marker.addListener('click', function() {
//                             infowindow.open(map, marker);
//                         });
                        
//                         gmarkers.push(marker);
//                         // var searched_lat = parseFloat(value.e_lat)
//                         // var searched_lng = parseFloat(value.e_lng)
//                         var current_lat = initialLocation.lat()
//                         var current_lng = initialLocation.lng()
//                         var distance = Math.sqrt(Math.pow(current_lng - searched_lng, 2) + Math.pow(current_lat - searched_lat, 2))

//                         gdistance.push(distance);
//                         var timedistance =  Math.round(distance * 13 /  0.02631798049107498)
//                         $("#search_res").append(
//                         '<div style="margin-top:10px" class="input-group"><span class="input-group-addon" id="basic-addon1" ><span class="glyphicon glyphicon-user"></span></span><input readonly type="text" class="form-control" placeholder="'+value.user_nick+'" aria-describedby="basic-addon1"></div>'+
//                         '<div class="input-group"><span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-map-marker"></span></span><input readonly type="text" class="form-control" placeholder="'+value.e_address+'" aria-describedby="basic-addon1"></div>'+
//                         '<div class="input-group"><span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-ruble"></span></span><input readonly type="text" class="form-control" placeholder="'+value.e_product_price+'" aria-describedby="basic-addon1"></div>'+
//                         '<div class="input-group"><span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-phone"></span></span><input readonly type="text" class="form-control" placeholder="'+value.e_pnumber+'" aria-describedby="basic-addon1"></div>'+
//                         '<div class="input-group"><span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-road"></span></span><input readonly type="text" class="form-control" placeholder="Մոտավորապես '+timedistance+' Րոպե  " aria-describedby="basic-addon1"></div>'

//                             )
//                     });
//                 }
//             });
// var gdistance = [];
//    // var gdistance = [3 , 6, 2, 56, 32, 5, 89, 32];




//         });
//     });



    }
    



</script>
 