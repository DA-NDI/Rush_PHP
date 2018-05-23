<?php

Class PlayerTwo extends Player{
	public function __construct($name) 
	{
			$this->hp = 5;
			$_SESSION['hp2'] = $this->hp;
			$this->shield = 0;
			$_SESSION['shield2'] = $this->shield;
			$this->pp = 0;
			$_SESSION['pp2'] = $this->pp;
			$this->speed = 1;
			$_SESSION['spped2'] = $this->speed;
//			echo ("Player".$name."constructed\n");
	}
	public function get_pp() {
		return $this->pp;

	}
}