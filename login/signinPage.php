<?php
  session_start();
  if(isset($_SESSION["loginUser"])){
    header("location:perso.php");
    die("");
  }
?>
<!Doctype>
<html>
	<head>
		<title>Page_Log_In</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		  <link rel="stylesheet" href="Css/loginstyle.css">
	</head>
<body>
<div class="myform">
	<h2> SIGN IN </h2>
	<form action="php/actionsignin.php" method="post">
		<div class="input-group has-feedback" id="divutente">
		    <span class="input-group-addon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
		    <label for="mail" hidden>email</label>
		    <input id="test" name="test" type="text" class="form-control" placeholder="Email/Username" required>
		    <span id = iconMail class="glyphicon form-control-feedback"></span>
		</div>	

		<div class="input-group has-feedback" id="divpassword">
			<span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
			<label for="pass" hidden>password</label>
			<input name="pass" id="pass" type="password" class="form-control" placeholder="Password" required>
			<span id = iconPass class="glyphicon form-control-feedback"></span>
		</div>

		<?php   if(isset($_GET['error']) && $_GET['error'] == 1){
					echo '
					<h5 class="messageError" id="messageErrorPhp"> Errore: user not found</h5>';
				}
				?>

		<div class="check"><input type="checkbox" name="rememberMe" checked="checked"> Remember me</div>
		<button id = submitButton class="btn btn-success btn-lg bb" type="submit"><i class="fa fa-user-plus" aria-hidden="true"></i>sign in</button>
	</form>	
	<script> validateReg() </script>
</div>
</body>
</html>