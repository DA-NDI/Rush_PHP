<?php
abstract class Fighter{

	public static $soldier_name;
	public function __construct($soldier_type) {
		$this->soldier_name = $soldier_type;
	}
	public function get_name()
	{
		return $this->soldier_name;
	}
	abstract function fight( $name );
}
?>