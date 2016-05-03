<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/data_function.php"); ?>
<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<style>
		.nav-right{
			float:right;
		}
		
		.topJumbo{
			margin-top:80px;
		}
		
		.divPad{
			padding-left:0px;
			padding-right:0px;
		}
		
		.tag {
		  font-size: 11px;
		  padding: .3em .4em .4em;
		  margin: 0 .1em;
		}
		.tag a {
		  color: #bb1;
		  cursor: pointer;
		  opacity: 0.6;
		}
		.tag a:hover {
		  opacity: 1.0
		}
		.tag .remove {
		  vertical-align: bottom;
		  top: 0;
		}
		.tag a {
		  margin: 0 0 0 .3em;
		}
		.tag a .glyphicon-white {
		  color: #fff;
		  margin-bottom: 2px;
		}
	</style>

  </head>
  <body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav nav-right">
			<li><a href="post_add.php">Post Ad</a></li>
			<li style="padding-bottom:15px;padding-top:15px;color:#fff">|</li>
            <li><a href="register.php">Register</a></li>
			<li style="padding-bottom:15px;padding-top:15px;color:#fff">|</li>
			<?php
				if(!isset($_SESSION["log_name"])){
					echo "<li><a href=\"login.php\">SignIn</a></li>";
				}
				else{
					echo "<li><a href=\"log_out.php\">Welcome {$_SESSION["log_name"]} SignOut</a></li>";
				}
            ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">

      <div class="col-md-12 jumbotron topJumbo">
       <form name="search_item" id="search_item" method="POST" action="search_item.php">
		<div class="col-md-10">
			<input type="text" id="search_main" name="search_main" class="form-control" placeholder="Search term">
		</div>
		<div class="col-md-2">
			<button class="btn btn-md btn-primary btn-block" type="submit">Search</button>
		</div>
		<div id="advSearchSection">
			<span class="tag label label-info">
			  <span>Colombo</span>
			  <a><i class="remove glyphicon glyphicon-remove-sign glyphicon-white"></i></a> 
			</span>
			<span class="tag label label-info">
			  <span>2005</span>
			  <a><i class="remove glyphicon glyphicon-remove-sign glyphicon-white"></i></a> 
			</span>
		</div>
		<!--<div class="col-md-12">
			<div class="checkbox">
			  <label>
				<input type="checkbox" id="chkAdvSearch" value="remember-me"> Advanced Search
			  </label>
			</div>
		</div>-->
      </div>

      <div class="row marketing">
        <div class="col-lg-3">
          <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Search by..</h3>
                    </div>
                    <div class="panel-body">
						
						<div class="col-md-12 divPad">
							<div class="form-group">
								<select class="form-control" id="cond" name="cond">
									<option></option>
									<option>New</option>
									<option>Recondition</option>
								</select>
							</div>
						</div>
						<div class="col-md-12 divPad">
							<div class="form-group">
							  <select class="form-control" id="loc" name="loc">
								<option></option>
								<?php 
									$location_set = get_locations();
									while ($location = mysqli_fetch_array($location_set)) {
										echo "<option value=\"{$location["location_name"]}\">{$location["location_name"]}</option>";
									}
								?>
							  </select>
							</div>
						</div>
						<div class="col-md-12 divPad">
							<div class="form-group">
							  <select class="form-control" id="vehi" name="vehi">
								<option></option>
								<?php 
									$vehical_set = get_vehicals();
									while ($vehical = mysqli_fetch_array($vehical_set)) {
										echo "<option value=\"{$vehical["vehical_name"]}\">{$vehical["vehical_name"]}</option>";
									}
								?>
							  </select>
							</div>
						</div>
						<div class="col-md-12 divPad">
							<div class="form-group">
							  <select class="form-control" id="item" name="item" placeholder="Parts">
								<option></option>
								<?php 
									$part_set = get_vehi_parts();
									while ($parts = mysqli_fetch_array($part_set)) {
										echo "<option value=\"{$parts["desc"]}\">{$parts["desc"]}</option>";
									}
								?>
							  </select>
							</div>
						</div>
						<div class="col-md-5 divPad">
							<div class="form-group">
								<input type="text" id="price1" name="price1" class="form-control" placeholder="Price">
							</div>
						</div>
						<div class="col-md-2"><p>to</p></div>
						<div class="col-md-5 divPad">
							<div class="form-group " >
								<input type="text" id="price2" name="price2" class="form-control" placeholder="Price">
							</div>
						</div>
                    </div>
                </div>
        </div>
		 </form>
        <div class="col-lg-9">
		
		<?php 
			$ad_set = get_myAd();
			while ($ad = mysqli_fetch_array($ad_set)) {?>
		<div class="row">	
		<?php		echo "<h4>{$ad["sel_vehical"]}</h4>";
		?>
		<div class="col-md-5 divPad">
			<?php $img_file = str_replace(' ', '', $ad["sel_part"]);?>
			<img src=<?php echo "img/{$img_file}.jpg"?> alt="Smiley face" width="250" height="180">
		</div>
		<div class="col-md-7 divPad">
			<?php	echo "<p>{$ad["sel_user_name"]}</p>";
					echo "<p>{$ad["sel_phn"]}</p>";
					echo "<p>{$ad["sel_price"]}</p>";
					echo "<p>{$ad["sel_part"]}</p>";
					echo "<p>{$ad["sel_location"]}</p>";
			?>
		</div>
		</div>
		<?php } ?>
		
        </div>
      </div>

      <footer class="footer navbar navbar-inverse navbar-fixed-bottom">
		<div class="container">
			<p>© Company 2014</p>
        </div>
      </footer>

    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	
	<script>
		
		$( window ).load(function() {
		
			$("#advSearchSection").show();
		
			$("#chkAdvSearch").on("click", function(){
				 if ($(this).is(':checked'))
					 $("#advSearchSection").show();
				   else
					 $("#advSearchSection").hide();
			});
		});

	</script>
  </body>
</html>
<?php require_once("includes/conn_close.php"); ?>