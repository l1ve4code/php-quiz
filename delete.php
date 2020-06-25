<?php
    session_start();

    $kek = $_SESSION['test']['tests'];
    if(count($kek) > 1){
        for($i=0; $i < count($kek); $i++){
            if($_GET['delete']-1 == array_keys($kek)[$i]){
                unset($kek[array_keys($kek)[$i]]);
                break;
            }
        }
    }
    $_SESSION['test']['tests'] = $kek;
    header('Location: ../maker.php');
?>
