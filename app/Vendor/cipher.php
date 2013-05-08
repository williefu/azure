<?php
 
class Cipher {

	public static function validate() {	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://local.evolveorigin_cipher/cipher.php");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$key = curl_exec($ch);
		curl_close($ch);
		
		return $key;
	}
}


/*
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://local.evolveorigin_cipher/cipher.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$file = curl_exec($ch);
curl_close($ch);

eval($file);
*/

/*
$remoteCipher	= fopen('http://local.evolveorigin_cipher/cipher.php', 'r');
$runCipher		= fread($remoteCipher, 9999);
fclose($remoteCipher);
eval($runCipher);
*/