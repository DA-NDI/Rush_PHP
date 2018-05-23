<?php
include "auth.php";
if ((isset($_POST["submit"]) && $_POST["submit"] == "OK" && ($users = load_users()) !== FALSE && ($users = user_chpasswd($users, $_POST["login"], $_POST["oldpw"], $_POST["newpw"])) !== FALSE && save_users($users)) || !print("ERROR_mod\n"))
{
	header("Location: index.html");
	echo "OK\n";
}
?>