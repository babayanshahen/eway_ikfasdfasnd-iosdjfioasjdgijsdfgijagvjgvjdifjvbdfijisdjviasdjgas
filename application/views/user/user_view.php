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
<?php 
	$user_first_login = is_array($this->auth->getUser()) ? $this->auth->getUser()['user_first_login']: false;
?>
<?php if (isset($user_first_login) && $user_first_login):   ?>
	<div class="alert alert-success">
	  <strong>Բարի գալուստ ! </strong> Ներկայացրու քո ապրանքը կամ ձեռնարկությունը  ԱՆՎՃԱՐ
	</div>
<?php endif; ?>
	<div  class='col-md-6'>
		<div class="form-group" >
			<?php
				$this->load->helper('form');
				echo form_open('user/register_product', userInfo()  );
			?>
			<div class="dropdown form-group">
				<select  id="sel_st_type"  class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" name="statement">
					<option value="0">Ընտրել տեսակը</option>
					<?php foreach ($statement as $statement): ?>
					<option value="<?=$statement->e_stm_value?>"> <?= $statement->e_stm_name ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group appending_item"></div>
			<div class='form-group' >
				<div class='input-group mb-2 mr-sm-2 mb-sm-0 addres_for_add' >
					<div class='input-group-addon'><span class='glyphicon glyphicon-map-marker'></span></div>
					<input type='text' name="e_address" class='form-control controls' placeholder="Երևան շինարարների 14" id="pac-input">
					<input type="hidden" name="lat" class="lat">
					<input type="hidden" name="lng" class="lng">
					<!-- <div class="input-group-addon " onclick="AddAddress()">Ավելացնել հասցե</div> -->
				</div>
			</div>
		</div>
		<?php
			loadJS(array(
						'apranqatesak' =>'apranqatesak.js'
						),base_url()
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
					),base_url()
				) 
			?>
			<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCsfS8yvhtJNEVfk5IaNFW6s8zr6KDrdbw&callback=initMap"></script> -->

<!-- <div class="input-group mb-2 mr-sm-2 mb-sm-0">
	<div class="input-group-addon">Անվանումը</div>
	<input type="text" name="e_product_name" class="form-control" placeholder="Հեռախոս,ամակարգիչ, ակսեսուար ...">
</div> -->