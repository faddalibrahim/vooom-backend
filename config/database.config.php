<?php 

	require __DIR__.'/credentials.config.php';

	class Database{
		private $host = HOST;
		private $user = USERNAME;
		private $password = PASSWORD;
		private $name = DB_NAME;
		protected $conn;
		protected $connection_error;
		protected $connection_success;
		
		protected function connect(){
			$this->conn = null;

			try{
				$this->conn = new PDO("mysql:host=$this->host;dbname=$this->name;charset=utf8",$this->user,$this->password);

				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);   
				
				
			}catch (PDOException $e){
				$this->connection_error = 'Connection Error: ' . $e->getMessage(). ' in ' . $e->getFile() . ' : '. $e->getLine();

			}
			
			return $this->conn;
		}
	}

 ?>