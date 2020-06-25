<?php
    session_start();
    unset($_SESSION['test']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main_style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Start Page</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-space-between">
            <a class="navbar-brand" href="#">PHP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Опросы</a>
                    </li>
                </ul>
            </div>
            <form class="form-inline justify-content-space-between w-15">
                <?php
                    if(isset($_SESSION["user"])){
                        echo ' <ul class = "navbar-nav"><li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  '.$_SESSION["user"]["full_name"].'
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            
                                  <a class="dropdown-item" href="#">Настройки</a>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="includes/logout.php">Выход</a>
                                </div>
                              </li></ul>';
                    }
                    else{
                        echo '<ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="login.php">Авторизация</a>
                                </li>
                            </ul>';
                    }
                ?>
            </form>
        </nav>
    </header>
    <main>
        <div class = "add_quiz">
            <a href = "maker.php">Добавить опрос</a>
        </div>
    </main>
    <footer>
        <?php
          require_once "includes/connect.php";
          $memas = mysqli_query($connect, "SELECT * FROM `polls`");
          if(mysqli_num_rows($memas) > 0 and isset($_SESSION['user'])){
//              $users = mysqli_fetch_assoc($memas);
            while($users = mysqli_fetch_assoc($memas)){
                echo "<h2>ОПРОС:".$users['title']."</h2>";
                $title = $users["title"];
                $dop = mysqli_query($connect, "SELECT * FROM `answ` WHERE title = '$title';");
                echo "Вопросы: ";
                echo $users['exiter'];
                echo "<h5>Ответы людей(а может и нет):</h5>";
                while($text = mysqli_fetch_assoc($dop)){
                    $answ = $text['answers'];
                    $exp_answ = explode(",", $answ);
                    for($kek=0;$kek< count($exp_answ) - 2; $kek++){
                        echo "<p>".$exp_answ[$kek]."</p>";
                    }
                    echo "____________________";
                }
            }
          }
        ?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src = "js/main.js"></script>
</body>
</html>