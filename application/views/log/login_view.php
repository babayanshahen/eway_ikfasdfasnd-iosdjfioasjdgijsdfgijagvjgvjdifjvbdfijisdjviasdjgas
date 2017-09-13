<!-- <style>
    .panel-default>.panel-heading {
    background-color: #b4d250;
}
.btn-info {
    background-color: rgba(34, 34, 34, 0.45);
    border-color: rgba(70, 184, 218, 0.13);
}
</style>
<div class="container">
    <div class="row centered-form">
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                    <h3 class="panel-title">EwaY </h3>
                    <?=isset($errorline) && $errorline ? '<small>Չեն համընկնում</small>' : ''?>
                    </div>
                    <div class="panel-body">
                    <form role="form" action="<?=base_url('log/doLogin')?>" method="post">
                        <div class="form-group <?=isset($error_mobile) && $error_mobile ? 'has-error' : ''?>">
                            <input type="text" name="user_login" id="last_name" class="form-control input-sm" placeholder="Մուտքանուն" <?=isset($usermobile) ? "value=$usermobile" : ''?>>
                        </div>
                        <div class="form-group <?=isset($error_email) && $error_email ? 'has-error' : ''?>">
                            <input type="password" name="user_password" id="user_password" class="form-control input-sm" placeholder="Գաղտնաբառ" <?=isset($useremail) ? "value=$useremail" : ''?>>
                        </div>
                        <input type="submit" value="Մուտք" class="btn btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 -->
<link href="<?=base_url('assets/css/logreg.css')?>" rel="stylesheet">
<!-- <div class="container">
    <div class="row">
        <h2>Fancy Login / Registration form</h2>
    </div>
</div>
<br>
<br> -->
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="form-body">
                <ul class="nav nav-tabs final-login">
                    <li  <?= $logactive? 'class="active"'  : '' ?>><a data-toggle="tab" href="#sectionA">ՄՈՒՏՔ</a></li>
                    <li <?= $regactive? 'class="active"'  : '' ?>><a data-toggle="tab" href="#sectionB">Միացիր Մեզ</a></li>
                </ul>
                <div class="tab-content">
                    <div id="sectionA" class="tab-pane fade  <?= $logactive? 'in active'  : '' ?>">
                        <div class="innter-form">
                            <form action="<?=base_url('log/doLogin')?>" class="sa-innate-form" method="post">
                                    <div class="input-group input-group-lg margin-bottom-sm">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </span>
                                        <input class="form-control" type="text" name="user_login" placeholder="Մուտքանուն">
                                    </div>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-lock"></span>
                                        </span>
                                        <input class="form-control" type="password" name="user_password" placeholder="Գաղտնաբառ">
                                    </div>
                                <button type="submit">Մուտք</button>
                                <!-- <a href="">Forgot Password?</a> -->
                            </form>
                        </div>
                        <!-- <div class="social-login">
                            <p>- - - - - - - - - - - - - Sign In With - - - - - - - - - - - - - </p>
                            <ul>
                                <li><a href=""><i class="fa fa-facebook"></i> Facebook</a></li>
                                <li><a href=""><i class="fa fa-google-plus"></i> Google+</a></li>
                                <li><a href=""><i class="fa fa-twitter"></i> Twitter</a></li>
                            </ul>
                        </div> -->
                        <div class="clearfix"></div>
                    </div>
                        <div id="sectionB" class="tab-pane fade <?= $regactive? 'in active'  : '' ?>">
                        <div class="innter-form">
                            <form action="<?=base_url('log/registering')?>" class="sa-innate-form" method="post">
                                <label <?=isset($errornick) && $errornick ? 'class="has-error"' : '' ?>>Անուն</label>
                                <input type="text" name="user_nick" <?=isset($user_nick) ? "value=$user_nick" : ''?>>
                                <label <?=isset($errorlogin) && $errorlogin ? 'class="has-error"' : '' ?>>Մուտքանուն</label>
                                <input type="text" name="user_login" <?=isset($user_login) ? "value=$user_login" : ''?>>
                                <label <?=isset($errorp) && $errorp ? 'class="has-error"' : '' ?>>Գաղտնաբառ</label>
                                <input type="password" name="user_password">
                                <label <?=isset($errorpc) && $errorpc ? 'class="has-error"' : '' ?>>Կրկնել գաղտնաբառ</label>
                                <input type="password" name="password_confirmation">
                                <?php if(isset($errorline) && $errorline ){
                                    echo 
                                    "
                                        <div class='alert alert-danger' role='alert'>
                                            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                                            <span class='sr-only'>Error:</span>
                                            $errorline
                                        </div>

                                    ";
                                }


                                ?>
                                <button type="submit">Միանալ հիմա</button>
                                <div>
                                    
                                </div>
                                
                            </form>
                        </div>
                        <!-- <div class="social-login">
                            <p>- - - - - - - - - - - - - Register With - - - - - - - - - - - - - </p>
                            <ul>
                                <li><a href=""><i class="fa fa-facebook"></i> Facebook</a></li>
                                <li><a href=""><i class="fa fa-google-plus"></i> Google+</a></li>
                                <li><a href=""><i class="fa fa-twitter"></i> Twitter</a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>