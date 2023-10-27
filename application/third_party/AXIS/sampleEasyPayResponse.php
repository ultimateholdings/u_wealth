<?php

/* Its sample response, 
 * please check you got 'i' parameter in response you received 
 * sample URL 
 * http://localhost:8080?i=9CiL2nMRz844%2Fy7VN1DkAphA7yFqr%2FruoaAwEXHWb2JMNHIrEJaXyg0gaSBgWN8zfiw0S1dEWfS8n3PZk9IOwRDiLtgvhR6dAqIKKzRAJvhIWgjTP5Cd9AAKDBgQ8QBtf6HSfcnMweJgrwndQJ3sn2RXDMDHeBsfIL83AR%2BX%2FRfbj9wTcm6GJPhzUMfES8ippxAaV6U7855lJn4scWk%2BfqzamYxxCr5wOtSBszNh%2Bnq0r3p399kLzGkiVphjBQShANoxZMFBtbS3X%2Fp2nWfJuF47ADs%2F31AstOeyWEP1N4Q%3D
 */

define('ENCRYPTION_KEY', 'axisbank12345678');
preg_match_all('/(\w+)=([^&]+)/', $_SERVER["QUERY_STRING"], $pairs);
$_GET = array_combine($pairs[1], $pairs[2]);

include_once 'AesForJava.php';
$aes = new AesForJava();
echo $qStr = $aes->decrypt(urldecode($_GET['i']), ENCRYPTION_KEY, 128);

/**
 * sample response decrypted string is
 * BRN=606387&STC=000&RMK=success&TRN=22492978&TET=12/08/2016 03:49:37 PM&PMD=AIB&RID=31988&VER=1.0&CID=2862&TYP=111&CRN=10099623&CNY=INR&AMT=1&CKS=32e1fbc3c22cb04cc2c89170bbea3a55d86a31c546d771aea757a862d64616b2
 */
