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
								<?php 
									// echo $update_items->statment ;
									// echo $statement->e_table_name.'_model' ;
									// out($statement);
									// out($update_items->statment);
								 ?>
							<option value="<?=$statement->e_stm_value?>" <?=ucfirst($update_items->statment) == ucfirst ($statement->e_table_name.'_model') ? 'selected=selected':''?>	> <?= $statement->e_stm_name ?></option>
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
	$('#sel_st_type').val($( "select option:selected" ).val()).trigger('change');
	$('#sel_st_type').prop('disabled', 'disabled');
	var statment = "<?=ucfirst($update_items->statment)?>";
	switch (statment) {
	    case "Beauty_salon_model":
	        var e_salon_name = "<?=isset($update_items->e_salon_name) ? $update_items->e_salon_name : '' ?>"
	        var e_pnumber = "<?=isset($update_items->e_pnumber) ? $update_items->e_pnumber :'' ?>"
	        var e_address = "<?=$update_items->e_address ?>"
	        $("input[name='e_salon_name']").val(e_salon_name);
	        $("input[name='e_pnumber']").val(e_pnumber);
	        $("input[name='e_address']").val(e_address);
	        break;
	    case "Hotels_model":
	   		var e_hotel_name = "<?=isset($update_items->e_hotel_name) ? $update_items->e_hotel_name : '' ?>"
	        var e_pnumber = "<?=isset($update_items->e_pnumber) ? $update_items->e_pnumber :'' ?>"
	        var e_address = "<?=$update_items->e_address ?>"
	        $("input[name='e_hotel_name']").val(e_hotel_name);
	        $("input[name='e_pnumber']").val(e_pnumber);
	        $("input[name='e_address']").val(e_address);
	        break;
	    case "Restaurant_model":
	   		var e_name = "<?=isset($update_items->e_name) ? $update_items->e_name : '' ?>"
	        var e_pnumber = "<?=isset($update_items->e_pnumber) ? $update_items->e_pnumber :'' ?>"
	        var e_address = "<?=$update_items->e_address ?>"
	        $("input[name='e_name']").val(e_name);
	        $("input[name='e_pnumber']").val(e_pnumber);
	        $("input[name='e_address']").val(e_address);
	        break;
	    // default:
	    //     code block
	}
</script>