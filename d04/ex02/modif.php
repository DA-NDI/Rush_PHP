<?php
function print_error()
{
	echo "ERROR\n";
	exit ;
}
if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] && $_POST['submit'] === "OK") 
{
	$user = unserialize(file_get_contents('../private/passwd'));
	if ($user) 
	{
		foreach ($user as $k => $v) 
		{
			if (($v['passwd'] === hash('whirlpool', $_POST['oldpw'])) && $v['login'] === $_POST['login'])
			{
				$user[$k]['passwd'] = hash('whirlpool', $_POST['newpw']);
				file_put_contents('../private/passwd', serialize($user));
				echo "OK\n";
			}
			else 
				print_error();
		}
	}
} 
else 
	print_error();
?>