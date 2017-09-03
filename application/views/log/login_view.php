<style>
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
                    <h3 class="panel-title">EwaY <!-- <small>  լրացրեք հետևյալ տողերը</small> --></h3>
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