<?php

	class Sql extends PDO {

		private $conn;

		public function __construct(){

			$this->conn = new PDO("mysql:dbname=dbphp7;host=localhost", "root", "");
		}

		public function setParams($statment, $parameters = array()){
			/*
			echo "<strong>Metodo setParams</strong><br>";
			echo "statment: ";
			var_dump($statment);
			echo "<br>parameters: ";
			var_dump($parameters);
			echo "<br>-------------------------------------------------<br>";
			*/
			foreach ($parameters as $key => $value) {
				
				$this->setParam($statment, $key, $value);
			}
		}

		public function setParam($statment, $key, $value){			
				/*echo "<strong>Metodo setParam</strong><br>";
				echo "statment: ";
				var_dump($statment);
				echo "<br>key: ";
				var_dump($key);
				echo "<br>value: ";
				var_dump($value);
				echo "<br>-------------------------------------------------<br>";
				*/
				$statment->bindParam($key, $value);
			
		}

		public function query($rawQuery, $params = array()){
			/*
				echo "<strong>Metodo query</strong><br>";
				echo "rawQuery: ";
				var_dump($rawQuery);
				echo "<br>params: ";
				var_dump($params);
				echo "<br>-------------------------------------------------<br>";
			*/
			$stmt = $this->conn->prepare($rawQuery);	

			$this->setParams($stmt, $params)	;

			$stmt->execute();

			return $stmt;
		}

		public function select($rawQuery, $params = array()):array {
			/*echo "<strong>Metodo Select</strong><br>";
			echo "rawQuery: ";
			var_dump($rawQuery);
			echo "<br> params: ";
			var_dump($params);
			echo "<br>-------------------------------------------------<br>";
			*/
			$stmt = $this->query($rawQuery, $params);

			//var_dump($stmt);

			return $stmt->fetchAll(PDO::FETCH_ASSOC);

		}
	}

?>