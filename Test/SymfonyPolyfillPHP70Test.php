<?php
/*
 * Test file to run PHP_CodeSniffer against to make sure the polyfills are correctly excluded.
 */
$a = intdiv( $b, PHP_INT_MIN );

if (error_clear_last()) {
	try {
		preg_replace_callback_array();
	} catch( ArithmeticError $e ) {
	} catch( DivisionByZeroError $e ) {
	} catch( Error $e ) {
}

class MyException extends AssertionError implements SessionUpdateTimestampHandlerInterface {
	public function something( ParseError $e, TypeError $t ) {}
}
