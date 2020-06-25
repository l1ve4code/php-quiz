<?php

    $connect = mysqli_connect("std-mysql", 'std_926', '123456789', "std_926");

    if(!$connect){
        die("Error. Not connected");
    }

?>