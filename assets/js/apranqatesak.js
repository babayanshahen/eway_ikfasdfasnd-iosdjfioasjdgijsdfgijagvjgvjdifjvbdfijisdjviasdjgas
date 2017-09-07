$( document ).on('change', '.dropdown', function(e) {
	if($('select[name=statement]').val() == '1'){
        $(".appending_item").html(
        	"<div class='form-group'><div class='input-group mb-2 mr-sm-2 mb-sm-0'><div class='input-group-addon'>Անվանումը</div><input type='text' name='e_product_name' class='form-control'  placeholder='Հեռախոս, համակարգիչ, ակսեսուար ...'></div> </div><div class='form-group'><div class='input-group mb-2 mr-sm-2 mb-sm-0'><div class='input-group-addon'>Տեսակ</div><input type='text' name='e_product_type' class='form-control'  placeholder='Samsung Galaxy s7, Iphone 5s ...'></div></div>  </div><div class='form-group'><div class='input-group mb-2 mr-sm-2 mb-sm-0'><div class='input-group-addon'>Գինը </div><input type='number' name='e_product_price' class='form-control'  placeholder='AMD USD EURO'></div></div>  </div><div class='form-group'><div class='input-group mb-2 mr-sm-2 mb-sm-0'><div class='input-group-addon'<i class='fa fa-mobile'></i>Բջջային </div><input type='number' class='form-control' name='e_pnumber' placeholder='Լրացնել հետևյալ կարգով 098100100'></div></div> "
        	);

	}
	if ($('select[name=statement]').val() == '2'){
		        $.ajax({
		            url:  base_url+'user/getTypes/shops',
		            success: function(data) {
		            	data = JSON.parse( data );
		            	$.each(data, function(key, value) {
							// console.log( data );
		            		$("#shop_type").append('<option value='+value.sh_value+'>'+value.sh_name+'</option>');
		            		// console.log(value)
		            	});
		                // $("#shop_type").html(
		                // 	'<option>asd</option>'
		                // 	)
		            }
		        });
		$(".appending_item").html(
        	"<div class='form-group'>"+
        		"<div class='input-group mb-2 mr-sm-2 mb-sm-0'>"+
					"<div class='input-group-addon'>Անվանումը</div>"+
					"<input type='text' name='e_product_name' class='form-control' placeholder='Yerevan City'>"+
				"</div>"+
			"</div>"+
			"<div class='form-group'>"+
				"<div class='input-group mb-2 mr-sm-2 mb-sm-0'>"+
					"<div class='input-group-addon '>Տեսակ</div>"+
						"<select class='form-control 'id='shop_type'  >"+
						"</select>"+
				"</div>"+
        	"</div>"+
			"<div class='checkbox'>"+
			  "<label ><input type='checkbox' value='round_the_clock' onclick='SetdisableORenable()'>24 ժամ</label>"+
			"</div>"+
        	"<div class='form-group'>"+
        		"<div class='input-group mb-2 mr-sm-2 mb-sm-0'>"+
					"<div class='input-group-addon'>Աշխ Ժամ</div>"+
					"<input type='time' name='e_product_name' class='form-control time_input' >"+
					"<input type='time' name='e_product_name' class='form-control time_input' >"+
				"</div>"+
			"</div>"
        	);
	}
});
function SetdisableORenable() {
	if($(".time_input").attr("disabled") == 'disabled'){
		$("input").removeAttr('disabled');
	}else{
    	$(".time_input").attr("disabled", 'disabled');
	}
}