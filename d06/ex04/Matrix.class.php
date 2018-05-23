<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Matrix.php                                         :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: avolgin <marvin@42.fr>                     +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/04/10 12:10:53 by avolgin           #+#    #+#             */
/*   Updated: 2018/04/10 20:12:48 by avolgin          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */
require_once (__DIR__.'/../ex01/Vertex.class.php');
require_once (__DIR__.'/../ex02/Vector.class.php');

Class Matrix {

	const IDENTITY = "IDENTITY";
	const SCALE = "SCALE";
	const RX = "RX";
	const RY = "RY";
	const RZ = "RZ";
	const TRANSLATION = "TRANSLATION";
	const PROJECTION = "PROJECTION";

	public $_matrix;
	public static $verbose = FALSE;
	public function __construct( array $keys ) 
	{
		if (array_key_exists('preset', $keys))
		{
			if ($keys['preset'] == "IDENTITY")
			{
				$matrix_type = Self::IDENTITY;
				$this->_matrix = array(
  				array(1.0, 0.0, 0.0, 0.0),
  				array(0.0, 1.0, 0.0, 0.0),
  				array(0.0, 0.0, 1.0, 0.0),
  				array(0.0, 0.0, 0.0, 1.0));
			}
			if ($keys['preset'] == "SCALE")
			{
				$sc = $keys['scale'];
				$matrix_type = "SCALE preset";
				$this->_matrix = array(
  				array($sc * 1, 0, 0, 0),
  				array(0, $sc * 1, 0, 0),
  				array(0, 0, $sc * 1, 0),
  				array(0, 0, 0, 1));
			}
			if ($keys['preset'] == "RX")
			{
				$matrix_type = "Ox ROTATION preset";
				$this->_matrix = array(
  				array(1, 0, 0, 0),
  				array(0, cos($keys['angle']), -sin($keys['angle']), 0),
  				array(0, sin($keys['angle']), cos($keys['angle']), 0),
  				array(0, 0, 0, 1));			
			}
			if ($keys['preset'] == "RY")
			{
				$matrix_type = "Oy ROTATION preset";
				$this->_matrix = array(
  				array(cos($keys['angle']), 0.0, sin($keys['angle']), 0.0),
  				array(0.0, 1.0, 0.0, 0.0),
  				array(-sin($keys['angle']), 0.0, cos($keys['angle']), 0.0),
  				array(0.0, 0.0, 0.0, 1.0));		
			}
			if ($keys['preset'] == "RZ")
			{
				$matrix_type = "Oz ROTATION preset";
				$this->_matrix = array(
  				array(cos($keys['angle']), -sin($keys['angle']), 0.0, 0.0),
  				array(sin($keys['angle']), cos($keys['angle']), 0.0, 0.0),
  				array(0.0, 0.0, 1.0, 0.0),
  				array(0.0, 0.0, 0.0, 1.0));
			}
			if ($keys['preset'] == "TRANSLATION")
			{
				$matrix_type = "TRANSLATION preset";
				$this->_matrix = array(
  				array(1, 0, 0, $keys['vtc']->get_x()),
  				array(0, 1, 0, $keys['vtc']->get_y()),
  				array(0, 0, 1, $keys['vtc']->get_z()),
  				array(0, 0, 0, 1));			
			}
			if ($keys['preset'] == "PROJECTION")
			{
				$matrix_type = "PROJECTION preset";
				$nul_el = 1 / tan(0.5 * deg2rad($keys['fov']));
				$this->_matrix = array(
  				array($nul_el / $keys['ratio'], 0.0, 0.0, 0.0),
  				array(0.0, 1 / tan(0.5 * deg2rad($keys['fov'])), 0.0, 0.0),
  				array(0.0, 0.0, -1.0 * (-$keys['near'] - $keys['far']) / ($keys['near'] - $keys['far']), (2 * $keys['near'] * $keys['far']) / ($keys['near'] - $keys['far'])),
  				array(0.0, 0.0, -1.0, 0.0));
			}
		}
		if (Self::$verbose == TRUE)
			printf("Matrix %s instance constructed\n", $matrix_type);
	}
	public function __toString() {
		//if (Self::$verbose == TRUE)
		//{
		 return sprintf ("M | vtcX | vtcY | vtcZ | vtxO\n-----------------------------\nx | %.2f | %.2f | %.2f | %.2f\ny | %.2f | %.2f | %.2f | %.2f\nz | %.2f | %.2f | %.2f | %.2f\nw | %.2f | %.2f | %.2f | %.2f", $this->_matrix[0][0], $this->_matrix[0][1], $this->_matrix[0][2], $this->_matrix[0][3], $this->_matrix[1][0], $this->_matrix[1][1], $this->_matrix[1][2], $this->_matrix[1][3], $this->_matrix[2][0], $this->_matrix[2][1], $this->_matrix[2][2], $this->_matrix[2][3], $this->_matrix[3][0], $this->_matrix[3][1], $this->_matrix[3][2], $this->_matrix[3][3]);
		//}
		//else
		//	return sprintf("No print with static False flag\n");

	}
	public	static function doc() {
		print(file_get_contents("./Matrix.doc.txt")."\n");
		}
	public function mult( Matrix $rhs ) {
        $matr3 = array(
				array(1.0, 0.0, 0.0, 0.0),
				array(0.0, 1.0, 0.0, 0.0),
				array(0.0, 0.0, 1.0, 0.0),
                array(0.0, 0.0, 0.0, 1.0));
        $r=count($this->_matrix);
        $c=count($rhs->_matrix[0]);
        $p=count($rhs->_matrix);
        for ($i=0;$i< $r;$i++){
            for($j=0;$j<$c;$j++){
                $matr3[$i][$j]=0;
            for($k=0;$k<$p;$k++){
                $matr3[$i][$j]+=$this->_matrix[$i][$k]*$rhs->_matrix[$k][$j];
            }
            }
        }
       $matr = new Matrix(array('preset' => "IDENTITY"));
       $matr->_matrix = $matr3;
    return($matr);
    }
	public function transformVertex( Vertex $vtx ) 
	{
		$x = $vtx->get_x() * $this->_matrix[0][0] + $vtx->get_y() * $this->_matrix[0][1] + $vtx->get_z() * $this->_matrix[0][2] + $vtx->get_w() * $this->_matrix[0][3];
		$y = $vtx->get_x() * $this->_matrix[1][0] + $vtx->get_y() * $this->_matrix[1][1] + $vtx->get_z() * $this->_matrix[1][2] + $vtx->get_w() * $this->_matrix[1][3];
		$z = $vtx->get_x() * $this->_matrix[2][0] + $vtx->get_y() * $this->_matrix[2][1] + $vtx->get_z() * $this->_matrix[2][2] + $vtx->get_w() * $this->_matrix[2][3];
		$w = $vtx->get_x() * $this->_matrix[3][0] + $vtx->get_y() * $this->_matrix[3][1] + $vtx->get_z() * $this->_matrix[3][2] + $vtx->get_w() * $this->_matrix[3][3];
		return new Vertex( array( 'x' => $x, 'y' => $y, 'z' => $z, 'w' => $w ) );		
	}
	function __destruct() {
		if (Self::$verbose == TRUE)
			printf("Matrix instance destructed\n");
		}
	}
	?>