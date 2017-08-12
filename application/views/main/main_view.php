	<style>
		#map{
			height: 400px;
		}
	</style>
<!-- <h1>my google map</h1> -->
<!-- <div id="map"></div> -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsfS8yvhtJNEVfk5IaNFW6s8zr6KDrdbw&callback=initMap"></script>

<!-- Navigation -->
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
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Գրանցվել</a>
                    </li>
                    <li>
                        <a href="#">Ծառայություններ</a>
                    </li>
                    <li>
                        <a href="#">Կապ</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Հայաստան 
                    <small>Գտի՝ր այն ինչ որոնում քեզ ամենամոտ վայրում</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8" >
            <div class="img-responsive" id="map" ></div>
            </div>

            <div class="col-md-4">
                <h3>Կայքի մասին</h3>
                <p>Գտի՝ր այն ինչ որոնում քեզ ամենամոտ վայրում</p>
					<div class="input-group mb-2 mr-sm-2 mb-sm-0">
						<div class="input-group-addon">Ինձ պետք է</div>
						<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="օրինակ մեքենայի ...">
					</div>
					<hr>
                	<!-- <img class="img-responsive" src="<?=base_url('images/search.jpg')?>" alt=""> -->
	                <h4>Ներկայացրու քո ապրանքը</h4>
	                <ul>
	                    <li>Գրանցվիր </li>
	                    <li>Նշիր քեզ  քարտեզի վրա</li>
	                    <li>Ներկայացրու քո ապրանքը</li>
	                </ul>
            </div>
            <!-- <div class="col-sm-3 col-xs-6">
				<h4>Ներկայացրու քո ապրանքը</h4>
                <ul>
                    <li>Գրանցվիր </li>
                    <li>Նշիր քեզ  քարտեզի վրա</li>
                </ul>
			</div> -->

        </div>
        <!-- /.row -->

        <!-- Related Projects Row -->
        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header">Related Projects</h3>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="<?=base_url('images/iphone_search.jpg')?>" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="<?=base_url('images/search_project.jpg')?>" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="<?=base_url('images/search_ipad.jpg')?>" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="<?=base_url('images/image_car.jpg')?>" alt="">
                </a>
            </div>

        </div>
        <!-- /.row -->
<script>
	function initMap(){
		var options = {
			zoom:11,
			center:{lat:40.1791857,lng:44.4991029}
		}

		var map = new google.maps.Map(document.getElementById('map'),options)

		var marker = new google.maps.Marker({
          position: {lat:40.0691,lng:45.0382},
          map: map
        });
	}

</script>
