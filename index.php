
<?php
include('login.php'); // Includes Login Script
include('header.php');
if(isset($_SESSION['login_user'])){
header("location: employee.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Form in PHP</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<div id="login">
<h2> Please login to continue</h2>
<form action="" method="post">
<label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<input name="submit" type="submit" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>