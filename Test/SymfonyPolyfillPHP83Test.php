<?php
/*
 * Test file to run PHP_CodeSniffer against to make sure the polyfills are correctly excluded.
 */

json_validate($json, $depth);
mb_str_pad($string, $length);
str_increment($string);
str_decrement($string);

stream_context_set_options($context, $options);
ldap_exop_sync($ldap, $request_oid);
ldap_connect_wallet($uri, $wallet, $password);

echo Override::class;

class Foo extends DateError {}

if (is_a($token, DateException::class)) {}

try {
} catch (DateInvalidOperationException | DateInvalidTimeZoneException $e) {
} catch (DateMalformedIntervalStringException | DateMalformedPeriodStringException | DateMalformedStringException $e) {
} catch (DateObjectError | DateRangeError $e) {
} catch (SQLite3Exception $e) {
}
