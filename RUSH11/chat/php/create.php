<?php

include "auth.php";

if (isset($_POST["submit"]) && $_POST["submit"] == "OK" && ($users = load_users()) !== FALSE && 
	($users = user_add($users, $_POST["login"], $_POST["passwd"], $_POST["rdb"])) !== FALSE && save_users($users))
{
	header("Location: ../../index.html");
}
else
{
	echo "<script type='text/javascript'>alert('There is already user with this login');
window.location='../html/create.html';</script>";
}
?>