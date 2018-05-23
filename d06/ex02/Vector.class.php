<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Vector.php                                         :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: avolgin <marvin@42.fr>                     +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/04/10 12:10:53 by avolgin           #+#    #+#             */
/*   Updated: 2018/04/10 20:12:48 by avolgin          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */
require_once (__DIR__.'/../ex01/Vertex.class.php');

Class Vector {


	private $_x, $_y, $_z, $_dest;
	private $_w = 0.0;

	private $content = 0;
	public static $verbose = FALSE;
	public function __construct( array $vector) 
	{
		if (( array_key_exists('dest', $vector) && $vector['dest'] !== NULL && $vector['dest'] instanceof Vertex))
		{
	
			$x_dest = floatval($vector['dest']->get_x());
			$y_dest = floatval($vector['dest']->get_y());
			$z_dest = floatval($vector['dest']->get_z());
		}
		else
		{
			$x_dest = 0;
			$y_dest = 0;
			$z_dest = 0;
		}
		if ((array_key_exists('orig', $vector) && $vector['orig'] !== NULL && $vector['orig'] instanceof Vertex))
		{
			$x_orig = floatval($vector['orig']->get_x());
			$y_orig = floatval($vector['orig']->get_y());
			$z_orig = floatval($vector['orig']->get_z());
		}
		else
		{
			$vertex = new Vertex( array( 'x' => 0, 'y' => 0, 'z' => 0, 'w' => 1 ) );
			$x_orig = floatval($vertex->get_x());
			$y_orig = floatval($vertex->get_y());
			$z_orig = floatval($vertex->get_z());
		}
		$this->_x = $x_dest - $x_orig;
		$this->_y = $y_dest - $y_orig;
		$this->_z = $z_dest - $z_orig;
		if (Self::$verbose == TRUE)
			printf("Vector( x:%.02f, y:%.02f, z:%.02f, w:%.02f ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
//		else
//		{
//			echo "Too fewww arguments / invalid arguments. Script should stop\n";
//			return;
//		}
	}
	public function __toString() {
		if (Self::$verbose == TRUE)
			return sprintf("Vector( x:%.02f, y:%.02f, z:%.02f, w:%.02f )", $this->_x, $this->_y, $this->_z, $this->_w);
		else
			return sprintf("Vector( x:%.02f, y:%.02f, z:%.02f, w:%.02f )", $this->_x, $this->_y, $this->_z, $this->_w);

	}
		public	static function doc() {
			$content = file_get_contents("./Vector.doc.txt");
			print("$content\n");
			return;
		}
	public function magnitude() {
		return floatval(sqrt($this->_x * $this->_x + $this->_y * $this->_y + $this->_z * $this->_z));

	}
	public function normalize() {
		if ($this->magnitude() == 1)
			return clone $this;
		else 
		{
			$magn = $this->magnitude();
			return new Vector(array('dest' => new Vertex(array('x' => $this->_x / $magn, 'y' => $this->_y / $magn, 'z' => $this->_z / $magn))));
		}

	}
	public function add(Vector $rhs) {
		return new Vector(array('dest' => new Vertex(array('x' => $this->_x + $rhs->get_x(), 'y' => $this->_y + $rhs->get_y(), 'z' => $this->_z + $rhs->get_z()))));

	}
	public function sub(Vector $rhs) {
		return new Vector(array('dest' => new Vertex(array('x' => $this->_x - $rhs->get_x(), 'y' => $this->_y - $rhs->get_y(), 'z' => $this->_z - $rhs->get_z()))));

	}
	public function opposite() {
		return new Vector(array('dest' => new Vertex(array('x' => -$this->_x, 'y' => -$this->_y, 'z' => -$this->_z))));

	}
	public function scalarProduct( $k ) {
		return new Vector(array('dest' => new Vertex(array('x' => $this->_x * $k, 'y' => $this->_y * $k, 'z' => $this->_z * $k))));
	}
	public function dotProduct( Vector $rhs ) {
		return floatval($this->_x * $rhs->get_x() + $this->_y * $rhs->get_y() + $this->_z * $rhs->get_z());
	}
	public function cos( Vector $rhs ) {
		$scalar_mult = $this->dotProduct($rhs);
		$magnitude1 = $this->magnitude(); 
		$magnitude2 = $rhs->magnitude();
		return floatval($scalar_mult / ($magnitude1 * $magnitude2)); 
	}
	public function crossProduct( Vector $rhs ) {
		return new Vector(array('dest' => new Vertex(array('x' => $this->_y * $rhs->get_z() - $this->_z * $rhs->get_y(), 'y' => $this->_z * $rhs->get_x() - $this->_x * $rhs->get_z(), 'z' => $this->_x * $rhs->get_y() - $this->_y * $rhs->get_x()))));
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
		function __destruct() {
			if (Self::$verbose == TRUE)
				printf("Vector( x:%.02f, y:%.02f, z:%.02f, w:%.02f ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
		}
	}
	?>