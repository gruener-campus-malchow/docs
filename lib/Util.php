<?php

class Util {


	// generate random token with /[a-zA-Z0-9-]/
	// The point of this function is to generate reasonably unguessable url parameters,
	// IT IS (PROBABLY) NOT CRYPTOGRAPHICALLY SECURE.
	//
	// Tokens will never begin or end with a hyphen and never contain two hyphens in a row.
	// This means that (depending on the length), the hyphen has a smaller chance of appearing;
	// this is somewhat counteracted by the fact that the hyphen appears twice in the character pool
	// (this way the amount of characters is 64, which works better with base64 and random_bytes).
	public static function random_token($length = 16) {
		while (true) {
			$random = preg_replace('@[\+/]@', '-', substr(base64_encode(random_bytes(ceil($length / 4 * 3))), 0, $length));
			if (!preg_match('@(^-|--|-$)@', $random)) return $random;
		}
	}




	public static function return_text($message, $code = 200) {
		http_response_code($code);
		header('Content-Type: text/plain');
		die($message);
	}

	public static function return_json($content, $code = 200) {
		http_response_code($code);
		header('Content-Type: application/json');
		die(json_encode($content));
	}


}
