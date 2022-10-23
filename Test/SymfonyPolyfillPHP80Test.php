<?php
/*
 * Test file to run PHP_CodeSniffer against to make sure the polyfills are correctly excluded.
 */

class Foo implements Stringable {}

$fdiv = fdiv(10, 3);

try {
    $chars = count_chars($string, 5);
} catch(ValueError $e) {
}

$bool = filter_var('yes', FILTER_VALIDATE_BOOL);

$debug = get_debug_type($bar);

if (preg_last_error_msg() !== 'No error') {
    exit;
}

if (str_contains($haystack, $needle)) {}
if (str_starts_with($haystack, $needle)) {}
if (str_ends_with($haystack, $needle)) {}

$id = get_resource_id($res);

try {
    // Match expression.
} catch(UnhandledMatchError $e) {
}

class MyAttributes extends \Attribute {}

if (is_a($token, PhpToken::class)) {}
