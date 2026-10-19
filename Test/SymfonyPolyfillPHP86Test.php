<?php
/*
 * Test file to run PHP_CodeSniffer against to make sure the polyfills are correctly excluded.
 */

echo clamp($value, $mix, $max);
echo ARRAY_FILTER_USE_VALUE;
echo grapheme_strrev();

mySort($a, SortDirection::Descending);
