<?php
    # Importing connection variables
    require_once ("database_credentials.php");

    # Establishing a database connection
    # $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE);
    class DatabaseConnection {
        public function connect(){
            $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE);
            // Check connection
            if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            }
            return $conn;
        }
    }
?>