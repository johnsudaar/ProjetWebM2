<?php
require_once "config.php";
class DBDriver{
	private static $_instance = null;
	private $bdd;
	private function __construct() {
		global $DATABASE_URL, $DATABASE_NAME, $DATABASE_USER, $DATABASE_PASSWORD;
		$this->bdd = new PDO('mysql:host='.$DATABASE_URL.';dbname='.$DATABASE_NAME.';charset=utf8', $DATABASE_USER, $DATABASE_PASSWORD);

	}
	public static function get() {
		if(is_null(self::$_instance)) {
			self::$_instance = new DBDriver();
		}

		return self::$_instance;
	}

	public function getDriver(){
		return $this->bdd;
	}
}
