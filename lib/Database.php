<?php

class Database {

	private static $connection;


	public static function connect($file) {
		try {
			self::$connection = new PDO("sqlite:$file");
		} catch (PDOException $e) {
			// ignore errors and keep going
		}
	}


	public static function query($query, $values = [], $fetchMode = PDO::FETCH_ASSOC) {
		if (!isset(self::$connection)) return false;

		$statement = self::$connection->prepare($query);

		foreach ($values as $key => $value) {
			$statement->bindValue($key + 1, $value);
		}

		if ($statement->execute()) {
			return $statement->fetchAll($fetchMode);
		}
		return false;
	}


	public static function build($source_filename) {
		$statements = file_get_contents($source_filename);
		$statements = array_filter(explode(';', $statements));
		foreach ($statements as $statement) {
			self::query($statement);
		}
	}

}
