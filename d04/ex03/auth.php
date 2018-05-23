<?php
function auth($login, $passwd)
{
	$pass = hash('whirlpool', $passwd);
	$user = unserialize (file_get_contents('../private/passwd'));
	if ($user)
	{
		foreach ($user as $elem) 
		{
			if (($elem['login'] == $login) && ($elem['passwd'] == $pass))
				return TRUE;
		}
	}
	else
		return FALSE;
}
?>
