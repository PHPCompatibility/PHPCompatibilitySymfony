<?php
/*
 * Test file to run PHP_CodeSniffer against to make sure the polyfills are correctly excluded.
 */

odbc_connection_string_is_quoted($str);
odbc_connection_string_should_quote($str);
odbc_connection_string_quote($str);
echo ini_parse_quantity($shorthand);

class MyEngine implements Random\Engine {}
$cl = function (
    Random\CryptoSafeEngine $param
): Random\Engine\Secure {
    // Do something.
};

try {
} catch (Random\BrokenRandomEngineError $e) {
} catch (Random\RandomException $e) {
} catch (Random\RandomError $e) {
}

echo AllowDynamicProperties::class;

#[AllowDynamicProperties]
class HasDynamicProperties {}

if (is_a($token, SensitiveParameterValue::class)) {}

/*
// This test will not help at this time as we can't just ignore the use of the SensitiveParameter attribute
// with the current attribute handling in PHPCompatibility 10.0.
function hasSensitiveData(
    #[SensitiveParameter]
    string $password
) {}
*/
