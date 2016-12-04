<?php
session_start();
$db=mysqli_connect("localhost","root","","authentication");

if(isset($_POST['register_btn'])){
session_start();
$username=mysql_real_escape_string($_POST['username']);
$email=mysql_real_escape_string($_POST['email']);
$password=mysql_real_escape_string($_POST['password']);
$password2=mysql_real_escape_string($_POST['password2']);


$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
if (preg_match($regex, $email)) {
 echo $email . " is a valid email";
} else { 
 echo $email . " is an invalid email. Please try again.";
}    

if($password==$password2){
$password=md5($password);
$sql="insert into users(username, email, password) values('$username','$email','$password')";
mysqli_query($db,$sql);
$_SESSION['message']="you are now logged in";
$_SESSION['username']=$username;
header("location:home.php");
}else{
$_SESSION['message']="the two passwords do not match";
}
}
?>

<html>
<head>
<title>Registration</title>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="header">
<h1>Registration Page</h1>
</div>
<form method="post" action="register.php">
<table>
<tr>
<td>username:</td>
<td><input type="text" name="username" class="textInput"></td>
</tr>
<tr>
<td>email:</td>
<td><input type="email" name="email" class="textInput"></td>
</tr>
<tr>
<td>password:</td>
<td><input type="password" name="password" class="textInput"></td>
</tr>
<tr>
<td>password 2:</td>
<td><input type="password" name="password2" class="textInput"></td>
</tr>
<tr>
<td>password:</td>
<td><input type="submit" name="register_btn" value="register"></td>
</tr>
</table>
</form>
</body>
</html>