<link href="<?=base_url('assets/css/user_view.css')?>" rel="stylesheet">
<div class="panel panel col-md-12">
					<?php
						$user_first_login = is_array($this->auth->getUser()) ? $this->auth->getUser()['user_first_login']: false;
					?>
					<div  class='col-md-4'>
						<?php if (isset($user_first_login) && $user_first_login):   ?>
						<div class="alert alert-success">
							<strong>Բարի գալուստ ! </strong><br> Ներկայացրու քո ձեռնարկությունը  ԱՆՎՃԱՐ
						</div>
						<?php endif; ?>
						<div class="form-group" >
							<?php
								$this->load->helper('form');
								echo form_open('user/register_product', userInfo()  );
							?>
							<div class="dropdown form-group">
								<select  id="sel_st_type"  class="btn btn-success dropdown-toggle btn-block" type="button" data-toggle="dropdown" name="statement">
									<option value="0">Ընտրել տեսակը</option>
									<?php foreach ($statement as $statement): ?>
									<?php if($statement->e_show == 'YES'): ?>
									<option value="<?=$statement->e_stm_value?>"> <?= $statement->e_stm_name ?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group appending_item"></div>
							<div class='form-group' >
								<div class='input-group mb-2 mr-sm-2 mb-sm-0 addres_for_add' >
									<div class='input-group-addon'><span class='glyphicon glyphicon-map-marker'></span></div>
									<input type='text' name="e_address" class='form-control controls' placeholder="Երևան շինարարների 14" id="pac-input" required>
									<input type="hidden" name="lat" class="lat" >
									<input type="hidden" name="lng" class="lng" >
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
						<button class="btn btn-success btn-block" type="Submit" >Հաստատել</button>
						<?php  echo form_close( ); ?>
					</div>
					<div id='map' class='col-md-8'></div>
				</div>
				<?php
					loadJS(array(
							'user_view' =>'user_view.js'
						),base_url()
					)
				?>
<?php
	$data = array('items' => $user_items);
	$this->load->view("items/items_view", $data);
?>
<script>
var scroll = "<?=$scroll?>";
if(scroll){
$(window).scrollTop(scroll);
}
</script>