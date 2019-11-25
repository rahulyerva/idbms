<?php
session_start();

if(isset($_SESSION['userid'])!="") {
	header("Location: dashboard.php");
}

include 'config.php';

//check if form is submitted
if (isset($_POST['login'])) {

	$userid = $_POST['username'];
	$password = $_POST['password'];
	$usertype = $_POST['usertype'];
	$result = mysqli_query($con, "SELECT * FROM userdetails WHERE userid = '" . $userid . "' and password = '" . $password . "' ");

	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['userid'] = $row['userid'];
		$_SESSION['usertype'] = $row['usertype'];

		if($_SESSION['userid']==1 && $_SESSION['usertype']=="admin"){

			header("Location: admin.php");
		}else{

			header("Location: dashboard.php");
		}
	} else {
		$errormsg = "Incorrect Email or Password!!!";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>BMU Bank</title>
	<link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div  class="navbar-header">
      
      <a class="navbar-brand" href="#">ONLINE BANKING SYSTEM</a>
    </div>
    
    </div>
  </div>
</nav>


<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<fieldset>
					<legend>Login</legend>
					
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="username" placeholder="Your Username" required class="form-control" />
					</div>

					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Your Password" required class="form-control" />
					</div>
					<div class="form-group lead">
						<label for="usertype">I am a: </label>
						<input type="radio" name="usertype" value="User" class="custom-radio" required>&nbsp;User|
						<input type="radio" name="usertype" value="admin" class="custom-radio" required>&nbsp;Admin
					</div>
					
					<div class="form-group">
						<input type="submit" name="login" value="Login" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
	</div>

</div>

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

