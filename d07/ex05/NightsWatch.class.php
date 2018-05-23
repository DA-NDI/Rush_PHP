<?php
Class NightsWatch{

private $_text;
	public function recruit($name)
{
	$array = get_class_methods($name);
	foreach ($array as $func)
	{
		if ($func == "fight")
		{
			$this->_text[] = $name;
		}
	}
}
public function fight()
{
	foreach ($this->_text as $elem)
	{
		$elem->fight();
	}
}
}
?>