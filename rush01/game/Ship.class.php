<?php
interface Ship{
	public function __construct($name);
	public function __toString();
	public	static function doc();
	public function get_hp();
	public function get_fuel();
	public function get_size();
	public function get_speed();
	public function get_shield();
	public function get_weapon();
	public function set_hp($hp);
	public function set_fuel($fuel);
	public function set_size($size);
	public function set_speed($speed);
	public function set_shield($shield);
	public function set_weapon(array $weapon);
	function __destruct();
}
?>