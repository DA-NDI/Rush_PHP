<?php
require_once (__DIR__.'/../ex01/Vertex.class.php');
require_once (__DIR__.'/Matrix.class.php');
class Camera
{
	public static $verbose = false;
	private $_origin;
	
	private $_width;
	private $_height;
	private $_tT;
	private $_tR;
	private $_proj;

	public function __construct(array $smth)
	{
		$this->_origin = $smth['origin'];
		$orientation = $smth['orientation'];
		$translation = new Vector(['dest' => $this->_origin]);
		$this->_tT = new Matrix(['preset' => Matrix::TRANSLATION, 'vtc' => $translation->opposite()]);
		$this->_tR = $orientation;
		if (array_key_exists('ratio', $smth))
		{
			$ratio = $smth['ratio'];
			$this->_width = $ratio * $this->_height;
		}
		else
		{
			$this->_width = $smth['width'];
			$this->_height = $smth['height'];
			$ratio = $smth['width'] / $smth['height'];
		}
		$fov = $smth['fov'];
		$near = $smth['near'];
		$far = $smth['far'];
		$this->_proj = new Matrix(['preset' => Matrix::PROJECTION, 'fov' => $fov, 'ratio' => $ratio, 'near' => $near, 'far' => $far]);
		if (Camera::$verbose === TRUE) {
			printf("Camera instance constructed\n");
		}
	}
	public	static function doc() {
		print(file_get_contents("./Camera.doc.txt")."\n");
		}
	public function __destruct()
	{
		if (Camera::$verbose === true)
			print("Camera instance destructed\n");
	}
	public function __toString()
	{
		return ("Camera( \n+ Origine: $this->_origin\n+ tT:\n$this->_tT\n+ tR:\n$this->_tR\n+ tR->mult( tT ):\n".$this->_tR->mult($this->_tT)."\n+ Proj:\n$this->_proj\n)");
	}
	public function watchVertex(Vertex $worldVertex)
	{
		$v = $this->_tR->mult($this->_tT);
		$c = $v->transformVertex($worldVertex);
		$n = $this->_proj->transformVertex($c);
		return (new Vertex(['x' => (1 + $n->get_x()) * $this->_width / 2, 
			'y' => (1 + $n->get_y()) * $this->_height / 2, 
			'z' => $n->get_z()]));
	}

}
?>