<?php

    $connect = mysqli_connect("localhost", 'root', 'root', "users_info");

    if(!$connect){
        die("Error. Not connected");
    }

?>