<?php
function print_error()
{
	echo "ERROR\n";
	exit ;
}
if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] === "OK") 
{
	if (!file_exists('../private')) 
		mkdir("../private");
	if (!file_exists('../private/passwd')) 
		file_put_contents('../private/passwd', null);
	$user = unserialize(file_get_contents('../private/passwd'));
	if ($user) 
	{
		foreach ($user as $k => $v) 
		{
			if ($v['login'] === $_POST['login'])
				print_error();
		}
	}
	$field['login'] = $_POST['login'];
	$field['passwd'] = hash('whirlpool', $_POST['passwd']);
	$user[] = $field;
	file_put_contents('../private/passwd', serialize($user));
	echo "OK\n";
} 
else 
	print_error();
?>