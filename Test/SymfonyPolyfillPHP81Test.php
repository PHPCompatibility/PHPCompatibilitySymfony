<?php
/*
 * Test file to run PHP_CodeSniffer against to make sure the polyfills are correctly excluded.
 */

if (array_is_list($array) === true) {}

$exists = enum_exists(name::class);

echo MYSQLI_REFRESH_REPLICA;

class Foo extends ReturnTypeWillChange {}

$file = new CURLStringFile();
