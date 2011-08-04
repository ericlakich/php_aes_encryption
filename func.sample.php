<?php
/*
 * Encryption function for the aes encryption class
 * 
 * This file demonstrates the use of the aes encryption class
 */

/*
 * This function accepts three argumets
 * $string = the string to encrypt
 * $method = Encrypt or Decrypt the string; E=encrypt D=decrypt
 * $key = a 32 character alpha-numeric string to use as an encryption key
 *
 */
 
 // require the aes class
 require('class.aes_encryption.php');
 
// function to encrypt the string 
function aes($string,$method='E',$key="ABCDEFGHIJKLMNOPQRSTUVWXYZ123456") {
	
	$aes = new AES($key);

	$data = $string;
	
	switch ($method) {
		case 'E':
			$encrypt = $aes->encrypt($data);
			$string_out = bin2hex($encrypt);
			break;
		case 'D':
			$bin_str = pack("H*" , $data); 
			$string_out = $aes->decrypt($bin_str);
			break;
	}
	
	return $string_out;

}

?>