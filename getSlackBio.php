<?php

    
  class Bio {
    // DB stuff
    private $conn;
    private $table = 'slackbio';

    // Post Properties
    public $slackUsername;
    public $backend;
    public $age;
    public $bio;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT * FROM `slackbio` LIMIT 1';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
}
    // session_start();
    // include("connection_string.php");

    // //$id = $_SESSION['id'];
    // $sql = "SELECT * FROM `slackbio` LIMIT 1";
    // $result = mysqli_query($conn, $sql);
    // // $row = mysqli_fetch_assoc($result);

    // // $bioJson = json_encode($row);

    // // echo $bioJson;


    // if (mysqli_num_rows($result) > 0) {
    //     while($row = mysqli($result)) {
    //         $arr = array(
    //             "slackUsername" => $row['slackUsername'],
    //             "backend" => ($row['backend'] == 1) ? true : false,
    //             "age" => (int)$row['age'],
    //             "bio" => $row['bio']
    //         );

    //         $obj = (object)$arr;

    //         $bioJson = json_encode($obj);
    //         // $curl = curl_init("http://localhost/HNGi9/Stage1/getSlackBio.php");
    //         // $one = curl_exec($curl);
    //         //echo $bioJson;
    //         print_r($bioJson);
    //         //var_dump($bioJson);
    //     }

    // } else {
    // //     echo "0 results";
    // }
?>