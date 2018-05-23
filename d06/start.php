<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   start.php                                          :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: avolgin <marvin@42.fr>                     +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/04/10 12:10:53 by avolgin           #+#    #+#             */
/*   Updated: 2018/04/10 15:32:02 by avolgin          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

Class Example {

	public $public_var = 0; // purblic you can use outside the class. private only inside
	private $private_var = 'hello';
	public $att1 = 0;
	public $att2 = 0;
	public $att3 = 0;
	
	public function __construct( array $kwargs) {
		print(' Constructor called' . PHP_EOL );

		if ( array_key_exists( 'arg1', $kwargs ) )
			$this->att1 = $kwargs['arg1'];
		else
			$this->att1 = -1;

		$this->att2 = $kwargs['arg2']; 
		return;
		if ( array_key_exists( 'arg3', $kwargs ) )
			$this->att3 = $kwargs['arg3'];
		else
			$this->att3 = $this->att1;
		print( '$this->att1: ' . $this->att1 . PHP.EOL );
		print( '$this->att2: ' . $this->att2 . PHP.EOL );
		print( '$this->att3: ' . $this->att3 . PHP.EOL );
	}
	public function __get( $att ) {
		print ( 'You tried to get private' . $att . PHP_EOL);
		return;
	}
	function __destruct() {
		print("Destructor called\n");
		return;
	}
	function public_bar() {
		print(' Method public_bar called' . PHP_EOL );
		return;
	}
	private	function private_bar() {
		print(' Method privat_bar called' . PHP_EOL );
		return;
	}
}

$instance = new Example( array( 'arg1' => 40, 'arg2' => 50, 'arg3' => 60 ) );
$instance = new Example( array( 'arg3' => 60, 'arg2' => 50, 'arg1' => 40 ) );
$instance = new Example( array( 'arg1' => 60, 'arg2' => 50) );
$instance = new Example( array( 'arg2' => 50 ) );
$instance = new Example( array( 'arg3' => 60, 'arg2' => 50) );


/* $instance = new Example(); */

/* print( '$instance->private_var: ' . $instance->private_var . PHP_EOL ); */
/* $instance->public_var = 52; */
/* print( '$instance->public_var: ' . $instance->public_var . PHP_EOL ); */

//$instance->bar();

?>