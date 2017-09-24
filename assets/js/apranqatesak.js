$( document ).on('change', '.dropdown', function(e) {
	if($('select[name=statement]').val() == '1'){
        $(".appending_item").html(
        	"<div class='form-group'><div class='input-group mb-2 mr-sm-2 mb-sm-0'><div class='input-group-addon'>Անվանումը</div><input type='text' name='e_product_name' class='form-control'  placeholder='Հեռախոս, համակարգիչ, ակսեսուար ...'></div> </div><div class='form-group'><div class='input-group mb-2 mr-sm-2 mb-sm-0'><div class='input-group-addon'>Տեսակ</div><input type='text' name='e_product_type' class='form-control'  placeholder='Samsung Galaxy s7, Iphone 5s ...'></div></div>  </div><div class='form-group'><div class='input-group mb-2 mr-sm-2 mb-sm-0'><div class='input-group-addon'>Գինը </div><input type='number' name='e_product_price' class='form-control'  placeholder='AMD USD EURO'></div></div>  </div><div class='form-group'><div class='input-group mb-2 mr-sm-2 mb-sm-0'><div class='input-group-addon'<i class='fa fa-mobile'></i>Բջջային </div><input type='number' class='form-control' name='e_pnumber' placeholder='Լրացնել հետևյալ կարգով 098100100'></div></div> "
        	);

	}
	if ($('select[name=statement]').val() == '2'){
		            		console.log(base_url+'user/getTypes/shops');
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
					"<input type='text' name='e_shop_name' class='form-control' placeholder='Yerevan City'>"+
				"</div>"+
			"</div>"+
			"<div class='form-group'>"+
				"<div class='input-group mb-2 mr-sm-2 mb-sm-0'>"+
					"<div class='input-group-addon '>Տեսակ</div>"+
						"<select class='form-control 'id='shop_type' name='shop_type' >"+
						"</select>"+
				"</div>"+
        	"</div>"+
			"<div class='checkbox'>"+
			  "<label ><input type='checkbox' name='round_the_clock'  onclick='SetdisableORenable()'>24 ժամ</label>"+
			"</div>"+
        	"<div class='form-group'>"+
        		"<div class='input-group mb-2 mr-sm-2 mb-sm-0'>"+
					"<div class='input-group-addon'>Աշխ Ժամ</div>"+
					"<input type='time' name='e_time_1' class='form-control time_input' >"+
					"<input type='time' name='e_time_2' class='form-control time_input' >"+
				"</div>"+
			"</div>"
        	);
	}
	// carwash
	if($('select[name=statement]').val() == '3'){
		$(".appending_item").html(
        	"<div class='form-group'>"+
        		"<div class='input-group mb-2 mr-sm-2 mb-sm-0'>"+
					"<div class='input-group-addon'>Անվանումը</div>"+
					"<input type='text' name='e_name' class='form-control' placeholder='Sonax'>"+
				"</div>"+
			"</div>"+
			"<div class='checkbox'>"+
			  "<label ><input type='checkbox' name='round_the_clock'  onclick='SetdisableORenable()'>24 ժամ</label>"+
			"</div>"+
        	"<div class='form-group'>"+
        		"<div class='input-group mb-2 mr-sm-2 mb-sm-0'>"+
					"<div class='input-group-addon'>Աշխ Ժամ</div>"+
					"<input type='time' name='e_time_1' class='form-control time_input' >"+
					"<input type='time' name='e_time_2' class='form-control time_input' >"+
				"</div>"+
			"</div>"
        	);
	}
	if($('select[name=statement]').val() == '4'){
		$(".appending_item").html(
        	"<div class='form-group'>"+
        		"<div class='input-group mb-2 mr-sm-2 mb-sm-0'>"+
					"<div class='input-group-addon'>Անվանումը</div>"+
					"<input type='text' name='e_shop_name' class='form-control' placeholder='Doctor car'>"+
				"</div>"+
			"</div>"+
			
			"<div class='checkbox'>"+
			  "<label ><input type='checkbox' name='round_the_clock' onclick='SetdisableORenable()'>24 ժամ</label>"+
			"</div>"+
        	"<div class='form-group'>"+
        		"<div class='input-group mb-2 mr-sm-2 mb-sm-0'>"+
					"<div class='input-group-addon'>Աշխ Ժամ</div>"+
					"<input type='time' name='e_time_1' class='form-control time_input' >"+
					"<input type='time' name='e_time_2' class='form-control time_input' >"+
				"</div>"+
			"</div>"
        	);
	}

	if($('select[name=statement]').val() == '5'){
		$(".appending_item").html(
				"<ul class='nav nav-tabs'>"+
                    "<li class=''><a href='javascript:void(0)' onclick= 'setvalueHomeS()' data-toggle='tab' style='background-color:#5cb85c' >Սեփական</a></li>"+
                    "<li class=''><a href='javascript:void(0)' onclick= 'setvalueHomeP()' data-toggle='tab' style='background-color:#5cb85c' >Շենք</a></li>"+
					"<input type='hidden' id='setvalueHomeType' name='rent_type'>"+
                "</ul>"+
                "<div class='form-group'>"+
	        		"<div class='input-group mb-2 mr-sm-2 mb-sm-0'>"+
						"<div class='input-group-addon'><i class='glyphicon glyphicon-usd'></i></div>"+
						"<input type='text' name='e_pnumber' class='form-control' placeholder='0XX XXXXXX'>"+
					"</div>"+
				"</div>"+
                "<div class='form-group'>"+
	        		"<div class='input-group mb-2 mr-sm-2 mb-sm-0'>"+
						"<div class='input-group-addon'><i class='glyphicon glyphicon-usd'></i></div>"+
						"<input type='text' name='e_rend_price' class='form-control' placeholder='100.000 ԴՐԱՄ'>"+
					"</div>"+
				"</div>"
        	);
	}
	//terminal
	if($('select[name=statement]').val() == '6'){
		$(".appending_item").html(
                "<div class='form-group'>"+
	        		"<div class='input-group mb-2 mr-sm-2 mb-sm-0'>"+
						"<div class='input-group-addon'>Տեսակ</div>"+
						"<input type='text' name='e_type' class='form-control' placeholder='E-PAY,TellCell ... '>"+
					"</div>"+
				"</div>"+

				"<div class='checkbox'>"+
			  		"<label ><input type='checkbox' name='round_the_clock' onclick='SetdisableORenable()'>24 ժամ</label>"+
				"</div>"+
				"<div class='form-group'>"+
	        		"<div class='input-group mb-2 mr-sm-2 mb-sm-0'>"+
						"<div class='input-group-addon'>Աշխ Ժամ</div>"+
						"<input type='time' name='e_time_1' class='form-control time_input' >"+
						"<input type='time' name='e_time_2' class='form-control time_input' >"+
					"</div>"+
				"</div>"
        	);
	}

	if($('select[name=statement]').val() == '7'){
		$(".appending_item").html(
			"<div class='form-group'>"+
        		"<div class='input-group mb-2 mr-sm-2 mb-sm-0'>"+
					"<div class='input-group-addon'>Անվանում. <i class='glyphicon-glyphicon-home'></i></div>"+
					"<input type='text' name='e_hotel_name' class='form-control' placeholder='Sasuntsi Davit Hotel'>"+
				"</div>"+
			"</div>"+
			"<div class='form-group'>"+
        		"<div class='input-group mb-2 mr-sm-2 mb-sm-0'>"+
					"<div class='input-group-addon'>Հեռ. <i class='glyphicon glyphicon-phone'></i></div>"+
					"<input type='number' name='e_pnumber' class='form-control' placeholder='0XX - XXXXXX'>"+
				"</div>"+
			"</div>"
        	);
	}

	if($('select[name=statement]').val() == '8'){
		$(".appending_item").html(
			"<div class='form-group'>"+
        		"<div class='input-group mb-2 mr-sm-2 mb-sm-0'>"+
					"<div class='input-group-addon'>Անվանում. <i class='glyphicon-glyphicon-home'></i></div>"+
					"<input type='text' name='e_salon_name' class='form-control' placeholder='Lika'>"+
				"</div>"+
			"</div>"+
			"<div class='form-group'>"+
        		"<div class='input-group mb-2 mr-sm-2 mb-sm-0'>"+
					"<div class='input-group-addon'>Հեռ. <i class='glyphicon glyphicon-phone'></i></div>"+
					"<input type='number' name='e_pnumber' class='form-control' placeholder='0XX - XXXXXX'>"+
				"</div>"+
			"</div>"
        	);
	}

	if($('select[name=statement]').val() == '10'){
		$(".appending_item").html(
			"<div class='form-group'>"+
        		"<div class='input-group mb-2 mr-sm-2 mb-sm-0'>"+
					"<div class='input-group-addon'>Անվանում. <i class='glyphicon-glyphicon-home'></i></div>"+
					"<input type='text' name='e_name' class='form-control' placeholder='Shant'>"+
				"</div>"+
			"</div>"+
			"<div class='form-group'>"+
        		"<div class='input-group mb-2 mr-sm-2 mb-sm-0'>"+
					"<div class='input-group-addon'>Հեռ. <i class='glyphicon glyphicon-phone'></i></div>"+
					"<input type='number' name='e_pnumber' class='form-control' placeholder='0XX - XXXXXX'>"+
				"</div>"+
			"</div>"
        	);
	}

	if($('select[name=statement]').val() == '11'){
		$(".appending_item").html(
			"<div class='checkbox'>"+
		  		"<label ><input type='radio' value='gaz' name='type_of_charge'  required> Գալալցակայան</label>"+
			"</div>"+

			"<div class='checkbox'>"+
		  		"<label ><input type='radio' value='petrol' name='type_of_charge' > Բենզալցակայան</label>"+
			"</div>"+

			"<div class='form-group'>"+
        		"<div class='input-group mb-2 mr-sm-2 mb-sm-0'>"+
					"<div class='input-group-addon'>Անվանում <i class='glyphicon-glyphicon-home'></i></div>"+
					"<input type='text' name='e_name' class='form-control' placeholder='Petrol'>"+
				"</div>"+
			"</div>"
        	);
	}

	if($('select[name=statement]').val() == '12'){
		$(".appending_item").html(
			"<div class='form-group'>"+
        		"<div class='input-group mb-2 mr-sm-2 mb-sm-0'>"+
					"<div class='input-group-addon'>Անվանում. <i class='glyphicon-glyphicon-home'></i></div>"+
					"<input type='text' name='e_name' class='form-control' placeholder='Natali Pharm'>"+
				"</div>"+
			"</div>"+
			"<div class='checkbox'>"+
			  		"<label ><input type='checkbox' name='round_the_clock' onclick='SetdisableORenable()'>24 ժամ</label>"+
				"</div>"+
				"<div class='form-group'>"+
	        		"<div class='input-group mb-2 mr-sm-2 mb-sm-0'>"+
						"<div class='input-group-addon'>Աշխ Ժամ</div>"+
						"<input type='time' name='e_time_1' class='form-control time_input' >"+
						"<input type='time' name='e_time_2' class='form-control time_input' >"+
					"</div>"+
				"</div>"
        	);
	}



});

function SetdisableORenable() {
	if($(".time_input").attr("disabled") == 'disabled'){
		$("input").removeAttr('disabled');
    	$("input[name=round_the_clock]").val("OFF");
	}else{
		$("input[name=e_time_1]").val('');
		$("input[name=e_time_2]").val('');
    	$(".time_input").attr("disabled", 'disabled');
    	$("input[name=round_the_clock]").val("ON");

	}
}

function setvalueHomeS(){
	$("#setvalueHomeType").attr("value", 'sepakan');
}

function setvalueHomeP(){
	$("#setvalueHomeType").attr("value", 'shenq');
}

function deleteAdd(){
	$(".appended_add").remove()
	// console.log(e.target)
	// $(this).remove();
	// $(target).remove()
}

function AddAddress() {
    $(".appending_item").append(
        "<div class='form-group appended_add'>" +
        "<div class='input-group mb-2 mr-sm-2 mb-sm-0'>" +
        "<div class='input-group-addon'>Հասցե <span class='glyphicon glyphicon-map-marker'></span>" +
        "</div>" +
        "<input value="+$("[name='e_address']").val()+" type='text' id= 'pac-input1' name='e_adress' class='form-control'  placeholder='Նշել հավելյալ հասցե'>" +
        "<div class='input-group-addon' onclick='deleteAdd()'>Ջնջել <span class='glyphicon glyphicon-remove'></span>" +
        "</div>" +
        "</div>" +
        "<div class='form-group'>"
    );
}

