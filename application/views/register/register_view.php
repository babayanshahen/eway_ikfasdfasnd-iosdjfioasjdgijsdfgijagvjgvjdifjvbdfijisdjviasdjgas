<!-- <style>
	body{
    background-color: #dadada;
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
		    		<h3 class="panel-title">E-way </h3>
		    		<?=isset($errorline) && $errorline ? '<small>Չեն համընկնում</small>' : ''?>
		 			</div>
		 			<div class="panel-body">
		    		<form role="form" action="<?=base_url('register/registering')?>" method="post">
		    					<div class="form-group <?=isset($error_ln) && $error_ln ? 'has-error' : ''?>">
		    						<input type="text" name="user_lastname" id="last_name" class="form-control input-sm" placeholder="Անուն" <?=isset($userlastname) ? "value=$userlastname" : ''?>>
		    					</div>
		    					<div class="form-group <?=isset($error_ln) && $error_ln ? 'has-error' : ''?>">
		    						<input type="text" name="user_lastname" id="last_name" class="form-control input-sm" placeholder="Ազգանուն" <?=isset($userlastname) ? "value=$userlastname" : ''?>>
		    					</div>
		    			<div class="form-group <?=isset($error_mobile) && $error_mobile ? 'has-error' : ''?>">
		    				<input type="text" name="user_mobile_number" id="last_name" class="form-control input-sm" placeholder="Հեռախոսահամար" <?=isset($usermobile) ? "value=$usermobile" : ''?>>
		    			</div>
		    			<div class="form-group <?=isset($error_email) && $error_email ? 'has-error' : ''?>">
		    				<input type="email" name="user_email" id="email" class="form-control input-sm" placeholder="Էլ հասցե" <?=isset($useremail) ? "value=$useremail" : ''?>>
		    			</div>
		    			<div class="form-group <?=isset($error_n) && $error_n ? 'has-error' : ''?>">
		                			<input type="text" name="user_name" id="first_name" class="form-control input-sm" placeholder="Մուտքանուն" <?=isset($username) ? "value=$username" : ''?>>
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
</div> -->
<link href="<?=base_url('assets/css/logreg.css')?>" rel="stylesheet">
<div class="container">
	<div class="row">
		<h2>Fancy Login / Registration form</h2>
	</div>
</div>
<br>
<br>
<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4">
<div class="form-body">
    <ul class="nav nav-tabs final-login">
        <li class="active"><a data-toggle="tab" href="#sectionA">Sign In</a></li>
        <li><a data-toggle="tab" href="#sectionB">Join us!</a></li>
    </ul>
    <div class="tab-content">
        <div id="sectionA" class="tab-pane fade in active">
        <div class="innter-form">
            <form class="sa-innate-form" method="post">
            <label>Email Address</label>
            <input type="text" name="username">
            <label>Password</label>
            <input type="password" name="password">
            <button type="submit">Sign In</button>
            <a href="">Forgot Password?</a>
            </form>
            </div>
            <div class="social-login">
            <p>- - - - - - - - - - - - - Sign In With - - - - - - - - - - - - - </p>
    		<ul>
            <li><a href=""><i class="fa fa-facebook"></i> Facebook</a></li>
            <li><a href=""><i class="fa fa-google-plus"></i> Google+</a></li>
            <li><a href=""><i class="fa fa-twitter"></i> Twitter</a></li>
            </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="sectionB" class="tab-pane fade">
			<div class="innter-form">
            <form class="sa-innate-form" method="post">
            <label>Name</label>
            <input type="text" name="username">
            <label>Email Address</label>
            <input type="text" name="username">
            <label>Password</label>
            <input type="password" name="password">
            <button type="submit">Join now</button>
            <p>By clicking Join now, you agree to hifriends's User Agreement, Privacy Policy, and Cookie Policy.</p>
            </form>
            </div>
            <div class="social-login">
            <p>- - - - - - - - - - - - - Register With - - - - - - - - - - - - - </p>
			<ul>
            <li><a href=""><i class="fa fa-facebook"></i> Facebook</a></li>
            <li><a href=""><i class="fa fa-google-plus"></i> Google+</a></li>
            <li><a href=""><i class="fa fa-twitter"></i> Twitter</a></li>
            </ul>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
