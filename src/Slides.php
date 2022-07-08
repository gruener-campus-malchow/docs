<?php

class Slides {


	public static function get($id, $encryption_key) {
		$query = Database::query('select `content` from `slides` where `id` = ?', [ $id ]);
		if (!isset($query[0]) || !isset($query[0]['content'])) return false;

		$content = self::decrypt($query[0]['content'], $encryption_key);

		// here's a special case we usually *should* be handling seperately, but php's built-in
		// functions already return false on failure
		//if ($content === false) [...]
		return $content;
	}

	public static function update($id, $encryption_key, $content) {
		Database::query('update `slides` set `content` = ? where `id` = ?', [
			self::encrypt($content, $encryption_key),
			$id
		]);
	}

	public static function create() {
		$id = self::random_id();
		$encryption_key = self::random_encryption_key();
		$admin_key = Util::random_token(32);

		Database::query('replace into `slides` (`id`, `admin_key`) values (?, ?)', [
			$id,
			password_hash($admin_key, PASSWORD_DEFAULT)
		]);

		return ['id' => $id, 'encryption_key' => $encryption_key, 'admin_key' => $admin_key];
	}


	private static function encrypt($content, $key) {
		return openssl_encrypt($content, MD_CRYPT_METHOD, $key);
	}

	private static function decrypt($encrypted_content, $key) {
		return openssl_decrypt($encrypted_content, MD_CRYPT_METHOD, $key);
	}


	private static function random_id() {
		while (true) {
			$id = Util::random_token(6);
			if (!Database::query('select `id` from `slides` where `id` = ?', [ $id ])) return $id;
		}
	}

	private static function random_encryption_key() {
		return Util::random_token(12);
	}

}
