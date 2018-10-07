<?php
/*
 * Test file to run PHP_CodeSniffer against to make sure the polyfills are correctly excluded.
 */
if ( trait_exists( 'MyTrait' ) && class_uses( 'MyTrait' ) ) {
	echo hex2bin();
}

session_register_shutdown();

class MyCallback extends CallbackFilterIterator {
	public function ABC( RecursiveCallbackFilterIterator $a ) {}
}
class MySession implements SessionHandlerInterface {}
