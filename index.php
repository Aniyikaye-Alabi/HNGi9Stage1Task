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