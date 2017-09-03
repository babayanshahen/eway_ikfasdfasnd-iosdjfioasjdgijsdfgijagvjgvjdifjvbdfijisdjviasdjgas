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
			<div class="form-group aprankappend"></div>
			<div class='form-group' >
				<div class='input-group mb-2 mr-sm-2 mb-sm-0'>
					<div class='input-group-addon'>Հասցե</div>
					<input type='text' name="e_address" class='form-control controls' placeholder="Երևան շինարարների 14" id="pac-input" >
					<input type="hidden" name="lat" class="lat">
					<input type="hidden" name="lng" class="lng">
				</div>
			</div>
		</div>
		<?php
			loadJS(array(
						'apranqatesak' =>'apranqatesak.js'
						)
			)
		?>
		<button class="btn btn-success" type="Submit" >Հաստատել</button>
		<?php  echo form_close( ); ?>
	</div>
	<div id='map' class='col-md-6'></div>
</div>
			<?php
				loadJS(array( 
								'user_view' =>'user_view.js'
					)
				) 
			?>
			<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCsfS8yvhtJNEVfk5IaNFW6s8zr6KDrdbw&callback=initMap"></script> -->
