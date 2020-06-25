<?php
    session_start();
    $id = $_SESSION["test"]['uuid'];
    $array = $_SESSION['test']['tests'];
    if(!isset($_SESSION["test"]['uuid'])){
        $id = 0;
    }
    else{
        $id++;
    }
    if(!isset($array)){
        $array = [];
    }
    else{
        array_push($array, "<div class = 'fields'>
                                        <label for = 'naming$id'>Название поля</label>
                                        <input type='text' name = 'naming$id' id = 'naming$id'>
                                        <select>
                                            <option>Число</option>
                                            <option>Положительное число</option>
                                            <option>Строка</option>
                                            <option>Текст</option>
                                            <option>С единственным выбором </option>
                                            <option>С множественным выбором</option>
                                        </select>
                                        <a href = 'delete.php/?delete=$id'>Удалить</a>
                                    </div>");
    }
    $_SESSION['test'] = ['tests' => $array,
                        'uuid' => $id];
    header("Location: maker.php");
?>