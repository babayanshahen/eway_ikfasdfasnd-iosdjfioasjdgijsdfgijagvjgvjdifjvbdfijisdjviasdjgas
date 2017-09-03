$(document).ready(function(){
    $("#apranqatesak").click(function(){
        $(".aprankappend").html(
        	"<div class='form-group'><div class='input-group mb-2 mr-sm-2 mb-sm-0'><div class='input-group-addon'>Անվանումը</div><input type='text' name='e_product_name' class='form-control'  placeholder='Հեռախոս, համակարգիչ, ակսեսուար ...'></div> </div><div class='form-group'><div class='input-group mb-2 mr-sm-2 mb-sm-0'><div class='input-group-addon'>Տեսակ</div><input type='text' name='e_product_type' class='form-control'  placeholder='Samsung Galaxy s7, Iphone 5s ...'></div></div>  </div><div class='form-group'><div class='input-group mb-2 mr-sm-2 mb-sm-0'><div class='input-group-addon'>Գինը </div><input type='number' name='e_product_price' class='form-control'  placeholder='AMD USD EURO'></div></div>  </div><div class='form-group'><div class='input-group mb-2 mr-sm-2 mb-sm-0'><div class='input-group-addon'<i class='fa fa-mobile'></i>Բջջային </div><input type='number' class='form-control' name='e_pnumber' placeholder='Լրացնել հետևյալ կարգով 098100100'></div></div> "
        	);
    });
});