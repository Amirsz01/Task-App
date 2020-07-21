<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Главная</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <?php
    if (isset($_GET['error']))
    {
        switch($_GET['error'])
        {
            case 1:
                $error_massage = "Неправильный логин или пароль";
                break;
            case 2:
                $error_massage = "У вас нет доступа для этой страницы";
                break;
            default:
                break;
        }
        echo "<div class=\"alert alert-danger\" role=\"alert\">
        $error_massage
        </div>";
    }
    if (isset($_GET['alert']))
    {
        switch($_GET['alert'])
        {
            case 1:
                $massage = "Задача успешно добавлена!";
                break;
            case 2:
                $massage = "Задача успешно изменена";
                break;
            default:
                break;
        }
        echo "<div class=\"alert alert-success\" role=\"alert\">
        $massage
        </div>";
    }
        include 'app/views/'.$content_view;
    ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>