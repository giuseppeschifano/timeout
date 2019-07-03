<?php
require_once('header.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Timeout - index</title>
</head>
<body>
<?php if(isset($_SESSION['errormsg'])) { echo $_SESSION['errormsg']; unset($_SESSION['errormsg']); } ?>
<label>Login:</label>
<form action="auth.php" method="post">
    <input type="text" placeholder="Username" name="username">
    <br><br>
    <input type="password" placeholder="password" name="password">
    <br><br>
    <input type="submit" value="login" name="login">
</form>
</body>
</html>