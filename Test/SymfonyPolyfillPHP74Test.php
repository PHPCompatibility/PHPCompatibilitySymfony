<?php
/*
 * Test file to run PHP_CodeSniffer against to make sure the polyfills are correctly excluded.
 */
$vars = get_mangled_object_vars($obj);

$parts = mb_str_split($string, 3);

var_dump( password_algos() );
