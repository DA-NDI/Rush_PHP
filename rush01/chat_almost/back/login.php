<?php
session_start();
include "auth.php";
// if (!isset($_POST["login"] || !isset($_POST["passwd"])))
// {
// 	echo '<script language="javascript">';
// 	echo 'alert("All fields must be filled")';
// 	echo '</script>';
// 	return (FALSE);
// }
if (!auth($_POST["login"], $_POST["passwd"]))
{
	echo '<script language="javascript">';
	echo 'alert("You wrote wrong login or password")';
	echo '</script>';
	header("Location: index.html");

}
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
    background-image: url("resources/background.jpg") ;
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
    /*color: transparent;*/
    opacity: 0.4;
}
	</style>
</head>
<body>

<iframe name="chat" width="90%" height="550px" src="chat.php" align="center"></iframe>
<iframe id="input_field" name="speak" width="90%" height="50px" src="speak.php" align="center"></iframe>

</body>
</html>