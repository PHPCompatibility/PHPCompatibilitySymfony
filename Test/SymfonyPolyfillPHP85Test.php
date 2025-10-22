<?php
/*
 * Test file to run PHP_CodeSniffer against to make sure the polyfills are correctly excluded.
 */

echo get_error_handler();
echo get_exception_handler();
array_first($array);
array_last($array);

/*
// This test will not help at this time as we can't just ignore the use of the DelayedTargetValidation/NoDiscard attribute
// with the current attribute handling in PHPCompatibility 10.0.
#[DelayedTargetValidation]
#[NoDiscard]
function dummy() {}
*/
