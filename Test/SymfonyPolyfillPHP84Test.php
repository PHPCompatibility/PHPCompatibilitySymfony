<?php
/*
 * Test file to run PHP_CodeSniffer against to make sure the polyfills are correctly excluded.
 */

echo CURL_HTTP_VERSION_3;
echo CURL_HTTP_VERSION_3ONLY;

array_find($array, $callback);
array_find_key($array, $callback);
array_any($array, $callback);
array_all($array, $callback);
fpow($num, $exponent);

echo mb_ucfirst($string);
echo mb_lcfirst($string);
mb_trim($string);
mb_ltrim($string);
mb_rtrim($string);

bcdivmod($num1, $num2);

grapheme_str_split($string);

$r = new ReflectionConstant(ClassName::CONSTANT_NAME);

/*
// This test will not help at this time as we can't just ignore the use of the Deprecated attribute
// with the current attribute handling in PHPCompatibility 10.0.
#[Deprecated]
function foo() {}
*/
