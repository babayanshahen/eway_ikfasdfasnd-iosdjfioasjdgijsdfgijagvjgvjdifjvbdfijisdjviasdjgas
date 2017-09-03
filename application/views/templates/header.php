<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-way - Start E-way</title>
    <link href="<?=base_url('bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('bootstrap/css/portfolio-item.css')?>" rel="stylesheet">
    <link rel="shortcut icon" href="<?=base_url('images/logo.png')?>" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body ng-app>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=base_url()?>">
                    <img class="img-responsive" src="<?=base_url('images/logo.png')?>" alt="E_way_logo" style="
    margin-top: -13px">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
            <?php if(!$this->auth->isLoggedIn()): ?>
                    <li>
                        <a href="<?=base_url('register')?>">Գրանցվել</a>
                    </li>
            <?php endif; ?>
                    <li>
                    <?php 
                    // out($this->auth->isLoggedIn() ? 'Մուտք' : 'Ելք' );

                     ?>
                        <a href="<?=base_url($this->auth->isLoggedIn() ? 'log/logout' : 'log' )?>"><?= $this->auth->isLoggedIn() ? 'Ելք' : 'Մուտք' ?></a>
                    </li>
                    <li>
                        <!-- <a href="#">Կապ</a> -->
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>