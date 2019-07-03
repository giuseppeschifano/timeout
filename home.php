<?php
require_once('header.php');
if(!isset($_SESSION['user']))
{
    header('Location: .');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>timeout - home</title>
</head>
<body>
<h1>Logged in as: <?php echo $_SESSION['user']['username']; ?></h1>
<form action="auth.php" method="post">
    <input type="submit" value="deactivate" name="deactivate">
</form>
</body>
</html>
