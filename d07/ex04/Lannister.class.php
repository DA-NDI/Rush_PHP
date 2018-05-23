<?php
Class Lannister{

	public function sleepWith($name){
		if (get_parent_class($name) == "Lannister")
			echo "Not even if I'm drunk !\n";
		else
			echo "Let's do this.\n";
	}	
}
?>