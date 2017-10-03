<?php// out($update_items); ?>
<link href="<?=base_url('assets/css/user_view.css')?>" rel="stylesheet">
<div class="panel panel col-md-12">
			<div  class='col-md-4'>
				<div class="form-group" >
					<?php
						$this->load->helper('form');
						echo form_open('user/updateProduct', userInfo()  );
					?>
					<div class="dropdown form-group">
						<select  id="sel_st_type"  class="btn btn-success dropdown-toggle btn-block" type="button" data-toggle="dropdown" name="statement">
							<?php foreach ($statement as $statement): ?>
							<?php if($statement->e_show == 'YES'): ?>
							<option value="<?=$statement->e_stm_value?>" <?=$update_items->statment == $statement->e_table_name.'_model' ? 'selected=selected':''?>	> <?= $statement->e_stm_name ?></option>
							<?php endif; ?>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group appending_item"></div>
					<div class='form-group' >
						<div class='input-group mb-2 mr-sm-2 mb-sm-0 addres_for_add' >
							<div class='input-group-addon'><span class='glyphicon glyphicon-map-marker'></span></div>
							<input type='text' name="e_address" class='form-control controls' placeholder="Երևան շինարարների 14" id="pac-input" required>
							<input type="hidden" name="item_id"  value="<?=$update_items->id ?>">
							<input type="hidden" name="current_statment"  value="<?=$update_items->statment ?>">
							<input type="hidden" name="e_lat" class="lat" value="<?=$update_items->e_lat ?>">
							<input type="hidden" name="e_lng" class="lng" value="<?=$update_items->e_lng ?>">
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
				<button class="btn btn-warning btn-block" onclick='location.href="<?=base_url('user')?>" '>
					Թողնել նույնությամբ
				</button>
				<button class="btn btn-danger btn-block" onclick='location.href="<?=base_url('user/deleteitem/'.$update_items->statment.'/'.$update_items->id)?>" '>Հեռացնել</button>
			</div>
			<div id='map' class='col-md-8'></div>
			<?php
				loadJS(array(
						'user_view' =>'user_view.js'
					),base_url()
				)
			?>
</div>
<script>
var e_salon_name = "<?=$update_items->e_salon_name ?>"
var e_pnumber = "<?=$update_items->e_pnumber ?>"
var e_address = "<?=$update_items->e_address ?>"
// var e_lat = "<?=$update_items->e_lat ?>"
// var e_lng = "<?=$update_items->e_lng ?>"
$('#sel_st_type').val($( "select option:selected" ).val()).trigger('change');
$( "input[name='e_salon_name']").val(e_salon_name);
$( "input[name='e_pnumber']").val(e_pnumber);
$( "input[name='e_address']").val(e_address);
// $( "input[name='lat']").val(e_lat);
// $( "input[name='lng']").val(e_lng);
$('#sel_st_type').prop('disabled', 'disabled');
</script>