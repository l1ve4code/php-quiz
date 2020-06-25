<?php
    session_start();
    if($_SESSION['user']){
        if($_SESSION['user']['privilege'] != "admin"){
            header('Location: ../index.php');
        }
    }else{
        header('Location: ../index.php');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main_style.css">
    <title>Quiz</title>
</head>
<body>
    <header class = "head_quiz">
        <a href="index.php">Вернуться на главную страницу</a>
    </header>
    <main>
        <form action="" method="" class = "form_make">
            <div>
                <label for="quiz_name">Название опроса</label>
                <input type="text" name = "quiz_name" id = "quiz_name">
            </div>
            <a href = "#">Добавить поле</a>
        </form>
    </main>
</body>
</html>