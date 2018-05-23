<?php
Class UnholyFactory{

	private $_array = array();
	public function fabricate($soldier_name)
	{
		if ($this->_array[$soldier_name])
		{
		echo ("(Factory fabricates a fighter of type ".$soldier_name.")\n");
		return (clone $this->_array[$soldier_name]);
		}
	else
		echo ("(Factory hasn't absorbed any fighter of type ".$soldier_name.")\n");
	}
	public function absorb($class_soldier)
	{
		if (get_parent_class($class_soldier) != 'Fighter')
		{
			echo ("(Factory can't absorb this, it's not a fighter)\n");
			return;
		}
		else if ($this->_array[$class_soldier->get_name()])
		{
			echo ("(Factory already absorbed a fighter of type ".$class_soldier->get_name().")\n");
		}
		else
		{
			echo ("(Factory absorbed a fighter of type ".$class_soldier->get_name().")\n");
			$this->_array[ $class_soldier->get_name() ] = $class_soldier;
		}
	}
}
?>