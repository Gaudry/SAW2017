
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST["test"])){
		$user = trim($_POST["test"]);
	}
	if(isset($_POST["pass"])){
		$pass = trim($_POST["pass"]);
	}
}
require_once("connectDbLocalhost.php");
mysqli_real_escape_string($conn,$user);
mysqli_real_escape_string($conn,$pass);

$user = htmlspecialchars($user);
$pass = htmlspecialchars($pass);

	$preparedQuery = mysqli_prepare($conn, "SELECT * FROM `users` WHERE `email` = ? OR `username` = ? ");
	mysqli_stmt_bind_param($preparedQuery, 'ss', $user,$user);
	$stmt = mysqli_stmt_execute($preparedQuery);

		if($row = mysqli_fetch_assoc($stmt)){
			if(password_verify($pass,$row["password"])){
				$_SESSION["loginUser"] = $row["username"];
				header("location : perso.php");
			}
			else {
				header("location: sign.php?error=1");
				die;
			}
		}
		else{
			header("location: ./sign.php?error=1");
				die;
		}
mysqli_close($conn);
?>
