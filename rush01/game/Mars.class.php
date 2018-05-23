<?php
require_once('./Ship.class.php');
Class MarsShip implements Ship{
	public static $verbose = FALSE;
	public $hp, $shield, $fuel, $speed, $weapon;
	public function __construct($ShipName) 
	{
		$this->hp = 30000;
		$this->shield = 0;
		$this->fuel = 100;
		$this->speed = 1;
		$this->weapon = "Laser";
//		if (Self::verbose == TRUE){
//		echo "MarsShip constructed\n";
//	}
	}
	public function __toString(){
		if (Self::$verbose == TRUE){
			return sprintf("Ship( hp: %.02d, shield: %.02d, weapon:%10s, speed: %.02d, fuel: %.02d,)",
				$this->hp, $this->shield, $this->weapon, $this->speed, $this->fuel);
		}
	}
	public	static function doc(){
	print(file_get_contents("./Mars.doc.txt")."\n");
	}
	public function get_hp() {
		return $this->hp;
	}
	public function get_fuel(){
		return $this->fuel;
	}
	public function get_size(){
		return $this->size;
	}
	public function get_speed(){
		return $this->speed;
	}
	public function get_shield(){
		return $this->shield;
	}
	public function get_weapon(){
		return $this->weapon;
	}
	public function __invoke()
	{
		return array('hp'=>$this->hp, 'fuel'=>$this->fuel, 'shield'=>$this->shield, 'weapon'=>$this->weapon, 'speed'=>$this->speed, 'size'=>$this->size);
	}
	public function set_hp($hp){
		$this->hp += $hp;
	}
	public function set_fuel($fuel){
		$this->fuel += $fuel;
	}
	public function set_size($size){
		$this->size += $size;
	}
	public function set_speed($speed){
		$this->speed += $hp;
	}
	public function set_shield($shield){
		$this->speed += $hp;
	}
	public function set_weapon(array $weapon){
		$this->speed += $hp;
	}
	function __destruct(){
		if (Self::$verbose == TRUE)
			printf("Player destructed\n");
		}
	}
?>
