<?php

    session_start();

    unset($_SESSION["kekers"]);

    require_once "includes/connect.php";

    $url = $_GET['url'];

    $result = mysqli_query($connect, "SELECT * FROM `polls` WHERE url1 = '$url' OR url2 = '$url' OR url3 = '$url'");

    if(mysqli_num_rows($result) > 0){
        $info = mysqli_fetch_assoc($result);
        $title = $info['title'];
        $string_name = explode(" ", $info['exiter']);
        $_SESSION["kekers"] = [
            "title" => $title,
            'count' => count($string_name)
        ];
        $type_text = explode(" ", $info['value_pole']);
        echo "<h3>Опрос: $title</h3><form action = '../register_anse.php' method='post' class = 'form_make'>";
        for($i=0; $i < count($type_text); $i++){
            if($type_text[$i] == "chislo"){
                echo "<div><p>".$string_name[$i]."</p>";
                echo "<input type = 'number' name = 'info".$i."' required></div>";
                continue;
            }
            else if($type_text[$i] == "pol_chilo"){
                echo "<div><p>".$string_name[$i]."</p>";
                echo "<input type = 'number' min = '0' name = 'info".$i."' required></div>";
                continue;
            }
            else if($type_text[$i] == "string"){
                echo "<div><p>".$string_name[$i]."</p>";
                echo "<input type = 'text' minlength='1' maxlength = '30' name = 'info".$i."' required></div>";
                continue;
            }
            else if($type_text[$i] == "text"){
                echo "<div><p>".$string_name[$i]."</p>";
                echo "<input type = 'text' minlength='1' maxlength = '255' name = 'info".$i."' required></div>";
                continue;
            }
            else if($type_text[$i] == "ed_vibor"){
                echo "<div><p>".$string_name[$i]."</p>";
                echo "<input type = 'text' name = 'info".$i."' required></div>";
                continue;
            }
            else if($type_text[$i] == "eb_monz"){
                echo "<div><p>".$string_name[$i]."</p>";
                echo "<input type = 'text' name = 'info".$i."' required></div>";
                continue;
            }
        }
        echo "<button type  = 'submit'>Отправить</button></form>";

    }
?>