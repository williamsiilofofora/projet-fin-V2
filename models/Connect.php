<?php

namespace forum\models;
use \PDO;
class Connect {
    protected function dbConnect(){

		$db = new PDO('mysql:host=localhost;dbname=forum2;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		return $db;	
}
}
?>