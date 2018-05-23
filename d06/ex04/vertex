<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Vertex.php                                         :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: avolgin <marvin@42.fr>                     +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/04/10 12:10:53 by avolgin           #+#    #+#             */
/*   Updated: 2018/04/10 20:12:48 by avolgin          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */
require_once (__DIR__.'/../ex00/Color.class.php');

Class Vertex {


	private $_x, $_y, $_z, $_color;
	private $_w = 1.0;

	private $content = 0;
	public static $verbose = FALSE;
	public function __construct( array $vertex) 
	{
		if ( array_key_exists( 'x', $vertex ) && array_key_exists( 'y', $vertex ) && array_key_exists( 'z', $vertex ))
		{
			$this->_x = floatval($vertex['x']);
			$this->_y = floatval($vertex['y']);
			$this->_z = floatval($vertex['z']);
			if ((array_key_exists('w', $vertex) && $vertex['w'] !== NULL))
				$this->_w = $vertex['w'];
			if ((array_key_exists('color', $vertex) && $vertex['color'] !== NULL && $vertex['color'] instanceof Color))
				$this->_color = $vertex['color'];
			else
				$this->_color = new Color( array( 'red' => 255, 'green' => 255, 'blue' => 255 ) );
			if (Self::$verbose == TRUE)
				printf("Vertex( x: %.02f, y: %.02f, z:%.02f, w:%.02f, %s ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
		}
		else
		{
			echo "Too few arguments / invalid arguments. Script should stop\n";
			return;
		}
	}
	public function __toString() {
		if (Self::$verbose == TRUE)
			return sprintf("Vertex( x: %.02f, y: %.02f, z:%.02f, w:%.02f, %s )", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
		else
			return sprintf("Vertex( x: %.02f, y: %.02f, z:%.02f, w:%.02f )", $this->_x, $this->_y, $this->_z, $this->_w);

	}
		public	static function doc() {
			$content = file_get_contents("./Vertex.doc.txt");
			print("$content\n");
			return;
		}
	public function set_x($coord) {
		$this->_x = $coord;

	}
	public function set_y($coord) {
		$this->_y = $coord;

	}
	public function set_z($coord) {
		$this->_z = $coord;

	}
	public function set_w($coord) {
		$this->_w = $coord;

	}
	public function set_color(array $color) {
		$this->_color = new Color ($color);

	}
	public function get_x() {
		return $this->_x;

	}
	public function get_y() {
		return $this->_y;

	}
	public function get_z() {
		return $this->_z;

	}
	public function get_w() {
		return $this->_w;

	}
	public function get_color() {
		return $this->_color;

	}
		function __destruct() {
			if (Self::$verbose == TRUE)
				printf("Vertex( x: %.02f, y: %.02f, z:%.02f, w:%.02f, %s ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color);
		}
	}
	?>