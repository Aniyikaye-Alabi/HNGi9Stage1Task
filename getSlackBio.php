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