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
        <div class="col-lg-12">
            <h1 class="page-header"> Easy way
            <small>Գտի՝ր այն ինչ որոնում ես, հեշտությամբ</small>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8" >
            <div class="img-responsive" id="map" ></div>
        </div>
        <div class="col-md-4">
            <p>Մուտքագրիր այն ինչ քեզ պետք է հիմա</p>
            <?php 
                $this->load->helper('form');
                echo form_open('user/searchPRoduct' ); 
            ?>
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                <input name="search_product" type="text" ng-model="getProduct" class="form-control" placeholder="Մթերային խանութ ..." id="inp_search_product">
                <!-- <button  class="btn btn-default" id="search_product" >Submit</button> -->
                <div class="input-group-addon greeen-color" id="search_product">Գտնել
                </div>
            </div>
            <?php echo form_close(); ?>
            <hr>
            <h4>Easy way հեշտությամբ</h4>
            <ul>
                <li>Գրանցվիր </li>
                <li>Նշիր քեզ  քարտեզի վրա</li>
                <li>Ներկայացրու ապրանքը,ձեռնարկությունը</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Նոր ավելացված</h3>
        </div>
        <div class="col-sm-3 col-xs-6">
            <a href="#">
                <img class="img-responsive portfolio-item" src="<?=base_url('images/iphone_search.jpg')?>" alt="">
            </a>
        </div>
        <div class="col-sm-3 col-xs-6">
            <a href="#">
                <img class="img-responsive portfolio-item" src="<?=base_url('images/search_project.jpg')?>" alt="">
            </a>
        </div>
        <div class="col-sm-3 col-xs-6">
            <a href="#">
                <img class="img-responsive portfolio-item" src="<?=base_url('images/search_ipad.jpg')?>" alt="">
            </a>
        </div>
        <div class="col-sm-3 col-xs-6">
            <a href="#">
                <img class="img-responsive portfolio-item" src="<?=base_url('images/image_car.jpg')?>" alt="">
            </a>
        </div>
    </div>
<script>
    function initMap() {
        var options = {
            zoom: 16
        }

        var map = new google.maps.Map(document.getElementById('map'), options)

        var myloc = new google.maps.Marker({
            clickable: true,
            shadow: null,
            zIndex: 999,
            map: map
        });
                    
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                map.setCenter(initialLocation);
            var marker = new google.maps.Marker({
                position: initialLocation,
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP
                // title: 'Hello World!'
            });
        function toggleBounce(event) {
                        if (marker.getAnimation() !== null) {
                            marker.setAnimation(null);
                        }else{
                            marker.setAnimation(google.maps.Animation.BOUNCE);
                        }
                    }
                    marker.addListener('ready', toggleBounce);

                // console.log(initialLocation.lng());
            });
        }
    $(document).ready(function() {
        $("#search_product").click(function() {

            $.ajax({
                type: 'POST',
                url: "<?=base_url('user/searchPRoduct ')?>",
                dataType: "json",
                data: {
                    'search_product': $("#inp_search_product").val()
                },
                success: function(msg) {


                    $.each( msg, function( key, value ) {
                          console.log(parseFloat(value.e_lat));
                          console.log(parseFloat(value.e_lng));
                            var marker = new google.maps.Marker({
                                clickable: true,
                                shadow: null,
                                zIndex: 999,
                                position: {lat: parseFloat(value.e_lat), lng: parseFloat(value.e_lng)},
                                animation: google.maps.Animation.DROP,
                                map: map
                            });
                          
                        });
                    // console.log(msg);
                    // alert('wow' + msg);
                }
            });
        });
    });
    }
    


</script>
