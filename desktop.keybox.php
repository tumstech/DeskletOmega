<?php

/* KeyBox Authorization and KeyBox services */
/* 

What is KeyBox?

KeyBox is a PHP Script used for encryption, decryption, key management and certificate management services.

*/

$keybox_version="1.0";

/*
encryption key
encryption key is used to encrypt system-level variables that needs protection.
change this if you want to run your own version of desklet. 
*/

$encryptionkey="1aO8$sFhuJio08Az$]ik[wdDmOaLi8aE"; // a default 32-bit (32 character) encryption key
$encryptionkey_hash="f17a6adb8453f63607352b365a312249"; // a MD5 hash of the key above, for verification.

protected $internal_encryptionkey="LPoKLeFhukCwdDmOaLiJio08Az$]i0aE";

$keybox_encryptionkey_16="xiU85R0{d5139l;Y"; // 16 - Bit (16 Character) Encryption Key (alphanumeric with special characters)
$keybox_encryptionkey_numeric_16="2594103574298561"; // a 16-bit numeric-only key (not much secure)
$keybox_encryptionkey_lowercase_16="a2c5r4g7u6v95d10"; // a 16-bit alphanumeric key, lower case only
$keybox_encryptionkey_uppercase_16="A2E51F5Q9Z5R30OP"; // a 16-bit alphanumeric key, uppercase only

/*KeyBox key management system */

// Not yet implemented

?>
