<link href="<?=base_url('assets/css/logreg.css')?>" rel="stylesheet">
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
                                <?php if(isset($loginerror) && $loginerror ){
                                    echo 
                                    "
                                    <div class='margin-bottom-sm'>
                                        <div class='alert alert-danger' role='alert'>
                                            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                                            <span class='sr-only'>Error:</span>
                                            $errorline
                                        </div>
                                    </div>
                                    ";
                                }
                                ?>
                                <button type="submit">Մուտք</button>
                                <!-- <a href="">Forgot Password?</a> -->
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                        <div id="sectionB" class="tab-pane fade <?= $regactive? 'in active'  : '' ?>">
                        <div class="innter-form">
                            <form action="<?=base_url('log/registering')?>" class="sa-innate-form" method="post">
                                <div class="input-group input-group-lg margin-bottom-sm">
                                    <span class="input-group-addon <?=isset($errornick) && $errornick ? 'has-error' : '' ?>" >
                                        <span class="glyphicon glyphicon-user"></span>
                                    </span>
                                    <input class="form-control" type="text" name="user_nick" placeholder="Անուն"  <?=isset($user_nick) ? "value='$user_nick'" : ''?> >
                                </div>
                                <!-- login -->
                                <div class="input-group input-group-lg margin-bottom-sm">
                                    <span class="input-group-addon <?=isset($errorlogin) && $errorlogin ? 'has-error' : '' ?>" >
                                        <i class="glyphicon glyphicon-log-in"></i>
                                    </span>
                                    <input class="form-control" type="text" name="user_login" placeholder="Մուտքանուն"  <?=isset($user_login) ? "value='$user_login'" : ''?> >
                                </div>
                                <!-- Pass -->
                                <div class="input-group input-group-lg margin-bottom-sm">
                                    <span class="input-group-addon <?=isset($errorp) && $errorp ? 'has-error' : '' ?>" >
                                        <span class="glyphicon glyphicon-lock"></span>
                                    </span>
                                    <input class="form-control" type="password" name="user_password" placeholder="Գաղտնաբառ"  >
                                </div>
                                <!-- Passconf -->
                                <div class="input-group input-group-lg margin-bottom-sm">
                                    <span class="input-group-addon <?=isset($errorpc) && $errorpc ? 'has-error' : '' ?>" >
                                        <span class="glyphicon glyphicon-lock"></span>
                                    </span>
                                    <input class="form-control" type="password" name="password_confirmation" placeholder="Կրկնել գաղտնաբառ"  >
                                </div>
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