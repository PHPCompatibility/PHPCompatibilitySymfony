<?php
/*
 * Test file to run PHP_CodeSniffer against to make sure the polyfills are correctly excluded.
 */

echo get_error_handler();
echo get_exception_handler();
array_first($array);
array_last($array);

#[DelayedTargetValidation]
#[NoDiscard]
function dummy() {}
