<?php
session_start();
include "auth.php";
if (!auth($_POST["login"], $_POST["passwd"]))
{
    echo "<script type='text/javascript'>alert('Wrong Username or Password');
    window.location='../../index.html';</script>";
}
else
    header("Location: ../html/switch.html");

$_SESSION["loggued_on_user"] = $_POST["login"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Space Warriors</title>
	<style>
body
{
    margin: auto;
    padding: auto;
    background-image: url("../resources/background.jpg") ;
    background-position-x: center;
    background-position-y: center;
    background-size: cover;
    background-repeat-x: no-repeat;
    background-repeat-y: no-repeat;
    background-attachment: fixed;
    background-origin: initial;
    background-clip: initial;
}
iframe 
{
    background-color: white;
    border: 5px solid;
    margin: 20px 5% 0 5%;
    opacity: 0.4;
}
	</style>
</head>
<body>

<iframe name="chat" width="90%" height="550px" src="chat.php" align="center"></iframe>
<iframe id="input_field" name="speak" width="90%" height="50px" src="speak.php" align="center"></iframe>

</body>
</html>