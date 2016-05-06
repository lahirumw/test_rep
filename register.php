<?php require_once("includes/connection.php"); ?>
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
			float:left;
		}
		.topJumbo{
			margin-top:100px;
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
          <a class="navbar-brand" href="index.php">Project Name 1</a>
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
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="userCreate" id="userCreate" method="POST" action="user_create.php">
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls floating-label-form-group-with-value">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="user_name" name="user_name" required="" data-validation-required-message="Please enter your name.">
                            </div>
                        </div>
                        <div class="row control-group warning">
                            <div class="form-group col-xs-12 floating-label-form-group controls floating-label-form-group-with-value">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="user_email" name="user_email" required="" data-validation-required-message="Please enter your email address." aria-invalid="true">
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls floating-label-form-group-with-value">
                                <label>Phone Number</label>
                                <input type="tel" class="form-control" placeholder="Phone Number" id="user_phone" name="user_phone" required="" data-validation-required-message="Please enter your phone number." aria-invalid="false">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls floating-label-form-group-with-value">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" id="user_password" name="user_password" required="" data-validation-required-message="Please enter the password.">
                            </div>
                        </div>
						<div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls floating-label-form-group-with-value">
                                <label>Retype Password</label>
                                <input type="password" class="form-control" placeholder="Retype Password" id="re_pw" name="re_pw" required="" data-validation-required-message="Please enter the password.">
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Send</button>
                            </div>
                        </div>
                    </form>
					<?php
						
						if(ISSET($suc_val))
							echo "<p>{$suc_val}</p>";
					?>
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