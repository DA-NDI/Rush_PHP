<?php
session_start();
//require_once('./Player.class.php');

Class PlayerOne extends Player{
	public function __construct($name) 
	{
			$this->hp = 500;
			$_SESSION['hp1'] = $this->hp;
			$this->shield = 0;
			$_SESSION['shield1'] = $this->shield;
			$this->pp = 0;
			$_SESSION['pp1'] = $this->pp;
			$this->speed = 1;
			$_SESSION['spped1'] = $this->speed;
//			echo ("Player".$name."constructed\n");
	}
	public function get_pp() {
		return $this->pp;

	}
}