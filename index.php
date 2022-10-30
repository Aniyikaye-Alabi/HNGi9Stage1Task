<<<<<<< HEAD
<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once 'connection_string.php';
  include_once 'getSlackBio.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $bio = new Bio($db);

  // Blog post query
  $result = $bio->read();
  // Get row count
  $num = $result->rowCount();

  // Check if any posts
  if($num > 0) {
    // Post array
    $bios_arr;
    // $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $bio_item = array(
        'slackUsername' => $slackUsername,
        'backend' => $backend == 1 ? true : false,
        'age' => $age,
        'bio' => $bio,
      );

      // Push to "data"
      //array_push($bios_arr, $bio_item);
      $bios_arr = $bio_item;
      // array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    echo json_encode($bios_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Posts Found')
    );
  }

  ?>
=======
<?php
    session_start();
    include("connection_string.php");

    //$id = $_SESSION['id'];
    $sql = "SELECT * FROM `slackbio` LIMIT 1";
    $result = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_assoc($result);

    // $bioJson = json_encode($row);

    // echo $bioJson;


    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $arr = array(
                "slackUsername" => $row['slackUsername'],
                "backend" => ($row['backend'] == 1) ? true : false,
                "age" => (int)$row['age'],
                "bio" => $row['bio']
            );

            $bioJson = json_encode($arr);
            echo $bioJson;
        }

    } else {
    //     echo "0 results";
    }
?>
>>>>>>> 11bbb1a8763fffc0e556f66719f245194dbcb367
