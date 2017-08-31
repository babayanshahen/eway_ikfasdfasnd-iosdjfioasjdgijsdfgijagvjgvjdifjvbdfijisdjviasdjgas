<style>
	.fa{
font-size: 18px;
padding-right: 5px;
color: #b4d250;
}
#map{
			height: 350px;
            border: 2px solid rgba(34, 34, 34, 0.49);
		}
</style>

<div class="container">
<div  class='col-md-6'>
	<div class="form-group" >
		<?php
			$this->load->helper('form');
			echo form_open('user/register_product', userInfo()  );
		?>
		<div class="dropdown">
			<button   id="sel_st_type"class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Նշեք հայտի տեսակը
			<span class="caret"></span>
			</button>
			<ul class="dropdown-menu">
			<?php foreach ($statement as $statement): ?>
				<li><a href="#" onclick="changeButton(event)" id="apranqatesak" value="<?= $statement->e_stm_value?>" ><?= $statement->e_stm_name ?></a></li>
			<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<div class="form-group aprankappend"></div>
	<div class='form-group' >
		<div class='input-group mb-2 mr-sm-2 mb-sm-0'>
			<div class='input-group-addon'>Հասցե</div>
			<input type='text' name="user_prod_add" class='form-control controls' placeholder="Երևան շինարարների 14" id="pac-input" >
			<input type="hidden" name="lat" class="lat">
			<input type="hidden" name="lng" class="lng">
		</div>
	</div>
	<button class="btn btn-success" type="Submit" >Հաստատել</button>
	<?php echo form_close( ); ?>
</div>
			<div id='map' class='col-md-6'></div>
<script>
function changeButton(event){
	// alert('asdasd');
	console.log(event.target.innerHTML);
	// console.log($(this));
	$("#sel_st_type").html(event.target.innerHTML);
}
function initMap(){
	var options = {
		zoom:15,
		center:{lat:40.1566055,lng:44.5186327}
	}
	var map = new google.maps.Map(document.getElementById('map'),options)
	var myloc = new google.maps.Marker({
        clickable: true,
    	shadow: null,
        zIndex: 999,
        map: map
	});

	var input = (document.getElementById('pac-input'));
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
					icon: image,
					title: place.name,
					position: place.geometry.location
				});
					marker.addListener('click', toggleBounce);
					marker.addListener('dragend', ChangeLatLng);

            function ChangeLatLng(event) {
            		$( ".lat" ).val(event.latLng.lat());
            		$( ".lng" ).val(event.latLng.lng());
					}
					function toggleBounce(event) {
						alert(event.latLng.lat());
						// console.log(event.latLng.lat());
						if (marker.getAnimation() !== null) {
							marker.setAnimation(null);
						}else{
							marker.setAnimation(google.maps.Animation.BOUNCE);
						}
					}
					// console.log(marker.position.lat());
					// console.log(marker.position.lng());
			viewport = place.geometry.viewport;
			markers.push(marker);
			bounds.extend(place.geometry.location);
	    }

    	map.setCenter(bounds.getCenter());
  	});


    google.maps.event.addListener(map, 'bounds_changed', function() {
    var bounds = map.getBounds();
    $(".lat").val(bounds.b.b);
    $(".lng").val(bounds.b.f);
    searchBox.setBounds(bounds);
  });
}

$(document).ready(function(){
    $("#apranqatesak").click(function(){
        $(".aprankappend").append(
        	"<div class='form-group'><div class='input-group mb-2 mr-sm-2 mb-sm-0'><div class='input-group-addon'>Անվանումը</div><input type='text' class='form-control' id='inlineFormInputGroup' placeholder='Հեռախոս, համակարգիչ, ակսեսուար ...'></div> </div><div class='form-group'><div class='input-group mb-2 mr-sm-2 mb-sm-0'><div class='input-group-addon'>Տեսակ</div><input type='text' class='form-control' id='inlineFormInputGroup' placeholder='Samsung Galaxy s7, Iphone 5s ...'></div></div>  </div><div class='form-group'><div class='input-group mb-2 mr-sm-2 mb-sm-0'><div class='input-group-addon'>Գինը </div><input type='text' class='form-control' id='inlineFormInputGroup' placeholder='AMD USD EURO'></div></div>  </div><div class='form-group'><div class='input-group mb-2 mr-sm-2 mb-sm-0'><div class='input-group-addon'<i class='fa fa-mobile'></i>Հեռախոս </div><input type='text' class='form-control' id='inlineFormInputGroup' placeholder='Լրացնել հետևյալ կարգով 098100100'></div></div> "
        	);
    });
});
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCsfS8yvhtJNEVfk5IaNFW6s8zr6KDrdbw&callback=initMap"></script>