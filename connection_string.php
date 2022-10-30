<?php
    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $db_name = "hngi9db";

//     $servername = "db4free.net";
//     $username = "davepro123";
//     $password = "Dave@123";
//     $db_name = "hngi9db";

    // // Create connection
    // $conn = mysqli_connect($servername, $username, $password, $db_name);
    // mysqli_set_charset($conn, 'utf8');

    // // Check connection
    // if (!$conn) {
    //     die("Connection failed: " . mysqli_connect_error());
    // }
    // // echo "Connected successfully";

    class Database {
        // 0B Params
        private $host = 'db4free.net';
        private $db_name = 'hngi9db';
        private $username = 'davepro123';
        private $password = 'Dave@123';
        private $conn;

        // DB Connect
        public function connect() {
            $this->conn = null;
      
            try { 
              $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
              $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
              echo 'Connection Error: ' . $e->getMessage();
            }
      
            return $this->conn;
        }
    }

?>
