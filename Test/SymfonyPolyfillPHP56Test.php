<?php
/*
 * Test file to run PHP_CodeSniffer against to make sure the polyfills are correctly excluded.
 */
$a = hash_equals();
$a = ldap_escape();

$var = LDAP_ESCAPE_FILTER + LDAP_ESCAPE_DN;
