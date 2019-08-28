<?php
/*
 * Test file to run PHP_CodeSniffer against to make sure the polyfills are correctly excluded.
 */
if ( is_countable( $abc ) ) {
	$a = hrtime() ? array_key_first() : array_key_last();
}

class MyException extends JsonException {}
