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
    <title>GoAdz</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<style>
		.nav-right{
			float:right;
		}
		.topJumbo{
			margin-top:80px;
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
          <a class="navbar-brand" href="index.php">Project Name</a>
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
	
	<div class="container topJumbo">
		<div class="row">
                <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Post an Ad</h3>
                    </div>
					<?php
						if(!isset($_SESSION["log_name"])){ ?>
					
					<div class="panel-body">
						<label>Please login before post Ad</label>
					</div>
					<?php 
					}
					else{ ?>
                    <div class="panel-body">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="createAd" id="createAd" method="POST" action="add_create.php">
					
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls floating-label-form-group-with-value">
								<label>Condition</label>
                                <select class="form-control" id="optradio_sel" name="optradio_sel">
								<option>New</option>
								<option>Recondition</option>
							  </select>
                            </div>
							
                            <div class="form-group col-xs-12 floating-label-form-group controls floating-label-form-group-with-value">
                                <label>Vehicle Type</label>
                                <select class="form-control" id="sel_vehi" name="sel_vehi">
								<?php 
									$vehical_set = get_vehicals();
									while ($vehical = mysqli_fetch_array($vehical_set)) {
										echo "<option value=\"{$vehical["vehical_name"]}\">{$vehical["vehical_name"]}</option>";
									}
								?>
							  </select>
                            </div>
                            <div class="form-group col-xs-12 floating-label-form-group controls floating-label-form-group-with-value">
                                <label>Location</label>
                                <select class="form-control" id="sel_loc" name="sel_loc">
								<?php 
									$location_set = get_locations();
									while ($location = mysqli_fetch_array($location_set)) {
										echo "<option value=\"{$location["location_name"]}\">{$location["location_name"]}</option>";
									}
								?>
							  </select>
                            </div>
                            <div class="form-group col-xs-12 floating-label-form-group controls floating-label-form-group-with-value">
                                <label>Year</label>
                                <select class="form-control" id="sel_part" name="sel_part">
								<?php 
									$part_set = get_vehi_parts();
									while ($parts = mysqli_fetch_array($part_set)) {
										echo "<option value=\"{$parts["desc"]}\">{$parts["desc"]}</option>";
									}
								?>
							  </select>
                            </div>
                            <div class="form-group col-xs-12 floating-label-form-group controls floating-label-form-group-with-value">
                                <label>Price</label>
                                <input type="text" class="form-control" placeholder="Price" id="sel_price" name="sel_price" required="" data-validation-required-message="Please enter the password.">
                            </div>
							<div class="form-group col-xs-12 floating-label-form-group controls floating-label-form-group-with-value">
                                <label>Phone</label>
                                <input type="text" class="form-control" placeholder="Phone No" id="sel_phn" name="sel_phn" required="" data-validation-required-message="Please enter the password.">
                            </div>
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Submit</button>
                            </div>
                        </div>
                    </form>
					</div>
					<?php } ?>
                </div>
            </div>
		</div>
	</div>	
	<footer class="footer navbar navbar-inverse navbar-fixed-bottom">
		<div class="container">
			<p>© Company 2014</p>
        </div>
      </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php require_once("includes/conn_close.php"); ?>