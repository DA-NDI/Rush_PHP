<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Color.php                                          :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: avolgin <marvin@42.fr>                     +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/04/10 12:10:53 by avolgin           #+#    #+#             */
/*   Updated: 2018/04/10 17:18:59 by avolgin          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

Class Color {

	public $red, $green, $blue;
	private $content = 0;
	public static $verbose = FALSE;
	public function __construct( array $rgb) 
	{
		if ( array_key_exists( 'rgb', $rgb ) )
		{
			$this->red = ((intval($rgb['rgb']) >> 16) & 0xFF);
			$this->green = ((intval($rgb['rgb']) >> 8) & 0xFF);
			$this->blue = (intval($rgb['rgb']) & 0xFF);
		}
		else
		{ 
			if( array_key_exists( 'red', $rgb ) )
				$this->red = $rgb['red'];
			else 
				$this->red = 0;
			if ( array_key_exists( 'green', $rgb ) )
				$this->green = $rgb['green'];
			else
				$this->green = 0;
			if ( array_key_exists( 'blue', $rgb ) )
				$this->blue = $rgb['blue'];
			else
				$this->blue = 0;
		}
		if (Self::$verbose == TRUE)
			{
				printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue); 
			}
		}
		public function __toString() {
			return sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
		}
		public	static function doc() {
			$content = file_get_contents("./Color.doc.txt");
			print("$content\n");
			return;
		}
		public	function add($Color) {
			$ret = new Color( array( "red" => $this->red + $Color->red, "green" => $this->green + $Color->green, "blue" => $this->blue + $Color->blue ) );
			return $ret;
		}
		public	function sub($Color) {
			$ret = new Color( array( "red" => $this->red - $Color->red, "green" => $this->green - $Color->green, "blue" => $this->blue - $Color->blue ) );
			return $ret;
		}
		public	function mult($Color) {
			$ret = new Color( array( "red" => $this->red * $Color, "green" => $this->green * $Color, "blue" => $this->blue * $Color ) );
			return $ret;
		}
		function __destruct() {
			if (Self::$verbose == TRUE)
				{
					printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue); 
				}
			}
		}
		?>