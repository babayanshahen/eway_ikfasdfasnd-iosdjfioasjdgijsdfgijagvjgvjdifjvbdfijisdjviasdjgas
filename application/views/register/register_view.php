<style>
	body{
    background-color: #dadada;
}
.centered-form{
	margin-top: 60px;
}

.centered-form .panel{
	background: rgba(255, 255, 255, 0.8);
	box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}
</style>
<div class="container">
    <div class="row centered-form">
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
    	<div class="panel panel-default">
    		<div class="panel-heading">
		    		<h3 class="panel-title">E-way <!-- <small> 	լրացրեք հետևյալ տողերը</small> --></h3>
		    		<?=isset($errorline) && $errorline ? '<small>Չեն համընկնում</small>' : ''?>
		 			</div>
		 			<div class="panel-body">
		    		<form role="form" action="<?=base_url('register/registering')?>" method="post">
		    			<div class="row">
		    				<div class="col-xs-6 col-sm-6 col-md-6">
		    					<div class="form-group <?=isset($error_n) && $error_n ? 'has-error' : ''?>">
		                <input type="text" name="user_name" id="first_name" class="form-control input-sm" placeholder="Անուն" <?=isset($username) ? "value=$username" : ''?>>
		    					</div>
		    				</div>
		    				<div class="col-xs-6 col-sm-6 col-md-6">
		    					<div class="form-group <?=isset($error_ln) && $error_ln ? 'has-error' : ''?>">
		    						<input type="text" name="user_lastname" id="last_name" class="form-control input-sm" placeholder="Ազգանուն" <?=isset($userlastname) ? "value=$userlastname" : ''?>>
		    					</div>
		    				</div>
		    			</div>
		    			<div class="form-group <?=isset($error_mobile) && $error_mobile ? 'has-error' : ''?>">
		    				<input type="text" name="user_mobile_number" id="last_name" class="form-control input-sm" placeholder="Հեռախոսահամար" <?=isset($usermobile) ? "value=$usermobile" : ''?>>
		    			</div>
		    			<div class="form-group <?=isset($error_email) && $error_email ? 'has-error' : ''?>">
		    				<input type="email" name="user_email" id="email" class="form-control input-sm" placeholder="Էլ հասցե" <?=isset($useremail) ? "value=$useremail" : ''?>>
		    			</div>
		    			<div class="row">
		    				<div class="col-xs-6 col-sm-6 col-md-6">
		    					<div class="form-group <?=isset($haserror) && $haserror ? 'has-error' : ''?>">
		    						<input type="password" name="user_password" id="password" class="form-control input-sm" placeholder="Գաղտնաբառ">
		    					</div>
		    				</div>
		    				<div class="col-xs-6 col-sm-6 col-md-6">
		    					<div class="form-group <?=isset($haserror) && $haserror ? 'has-error' : ''?>">
		    						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="կրկ. Գաղտնաբառ">
		    					</div>
		    				</div>
		    			</div>
		    			<input type="submit" value="Register" class="btn btn-info btn-block">
		    		</form>
		    	</div>
    		</div>
		</div>
	</div>
</div>