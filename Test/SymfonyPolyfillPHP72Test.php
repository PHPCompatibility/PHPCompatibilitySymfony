<?php
/*
 * Test file to run PHP_CodeSniffer against to make sure the polyfills are correctly excluded.
 */
$a = PHP_OS_FAMILY ? utf8_encode($b) : utf8_decode($b);

$c = stream_isatty();
$d = sapi_windows_vt100_support();

$e = mb_scrub(mb_ord(mb_chr(spl_object_id(), $encoding), $encoding), $encoding);

$floats = PHP_FLOAT_DIG + PHP_FLOAT_EPSILON + PHP_FLOAT_MIN + PHP_FLOAT_MAX;
