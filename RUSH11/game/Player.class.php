<?php
require_once("./Traits.php");
session_start();

abstract class Player{

	use GetHP, GetShield {
		GetHP::get_hepe as get_hp;
	}
	public $hp, $shield, $pp, $speed;
	public static $verbose = FALSE;
	public function __construct($vertex) 
	{
			$this->hp = 0;
			$this->shield = 0;
			$this->pp = 0;
			$this->speed = 1;
			echo "Player constructed\n";
	}
	public function __toString() {
		if (Self::$verbose == TRUE)
			return sprintf("Player( hp: %.02d, shield: %.02d, pp:%.02d)", $this->hp, $this->shield, $this->pp);
//		else
//			return sprintf("verbse if FALSE");

	}
		public	static function doc() {
			$content = file_get_contents("./doc/Player.doc.txt");
			print("$content\n");
			return;
		}
	public function set_hp($hp) {
		$this->hp = $hp;
		$_SESSION['hp2'] = $hp;

	}
	public function set_shield($shield) {
		$this->shield = $shield;

	}
	public function set_speed($speed) {
		$this->speed = $speed;

	}
	public function set_pp($pp) {
		$this->pp = $pp;

	}
	abstract public function get_pp();

	function __destruct() {
		if (Self::$verbose == TRUE)
			printf("Player destructed\n");
		}
	}
	?>