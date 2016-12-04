<?php
session_start();
?>


<html>
<head>
<title>Registration</title>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="header">
<h1>Registration</h1>
</div>
<h1>Home</h1>
<div><h2 style = "color:008080;">Welcome  <?php echo $_SESSION['username']; ?></h2></div>
</body>
</html>