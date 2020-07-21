<?php
require ('storage/config.php');
class Model
{
    public $db;
    function __construct()
    {
        global $mysql;
        $this->db = mysqli_connect($mysql['host'], $mysql['user'], $mysql['password'], $mysql['db_name']);
        if ($this->db == false){
            print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
        }
        $sql = "CREATE TABLE IF NOT EXISTS `task_list` (`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT, `text` VARCHAR(400) NOT NULL, `userid` INT DEFAULT -1 , `email` VARCHAR(50), `username` VARCHAR(50) NOT NULL, `status` VARCHAR(30) DEFAULT 'wait', `edited` BOOLEAN NOT NULL DEFAULT FALSE);";
        $sql .= "CREATE TABLE IF NOT EXISTS `users` (`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT, `username` VARCHAR(400) NOT NULL, `hash` VARCHAR(255) ,`admin` BOOLEAN NOT NULL DEFAULT FALSE);";
        mysqli_query($this->db,$sql);
    }

    public function create_new_task($username, $email, $text, $user_id = "-1")
    {
        $sql = "INSERT INTO `task_list` (`username`, `email`, `text`, `userid`) VALUES ('$username', '$email', '$text', '$user_id')";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            $message  = 'Неверный запрос: ' . mysqli_error() . "\n";
            $message .= 'Запрос целиком: ' . $sql;
            die($message);
        }
    }

    function __destruct()
    {
        mysqli_close($this->db);
    }

    public function get_data($page, $sort_name, $sort_type)
    {
        global $num_recourse_per_page;
        $start = ($page-1) * $num_recourse_per_page;
        $sort_type ? $type = 'ASC' : $type = 'DESC';
        $sql = "SELECT * from `task_list` ORDER BY `$sort_name` $type, `id` $type LIMIT $start, $num_recourse_per_page";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            $message  = 'Неверный запрос: ' . mysqli_error() . "\n";
            $message .= 'Запрос целиком: ' . $sql;
            die($message);
        }
        return $result;
    }

    public function get_max_page()
    {
        global $num_recourse_per_page;
        return ceil(mysqli_fetch_row(mysqli_query($this->db, "SELECT COUNT(1) FROM `task_list` LIMIT 1"))[0] / $num_recourse_per_page);;
    }

    public function auth($login, $password)
    {
        $sql = "SELECT *  FROM `users` WHERE `username` = '$login';";
        $response = mysqli_fetch_row(mysqli_query($this->db,$sql));
        /*
         * [0] - id
         * [1] - login
         * [2] - hash
         * */
        if(password_verify($password, $response[2]))
        {
            return $response[0];
        }
        else
        {
            return -1;
        }
    }

    public function is_admin($user_id)
    {
        return mysqli_fetch_object(mysqli_query($this->db, "SELECT * FROM `users` WHERE `id` = $user_id;"))->admin;
    }

    public function get_task_data($task_id)
    {
        return mysqli_fetch_object(mysqli_query($this->db, "SELECT * FROM `task_list` WHERE `id` = $task_id;"));
    }
    
    public function edit_task_info($task_id, $text, $status)
    {
        $sql = "UPDATE `task_list` SET `edited` = 1 WHERE `id` = $task_id && `text` != '$text';";
        mysqli_query($this->db, $sql);
        $sql = "UPDATE `task_list` SET `text` = '$text', `status` = '$status' WHERE `id` = $task_id;";
        $result = mysqli_query($this->db, $sql);
        if (!$result) {
            $message  = 'Неверный запрос: ' . mysqli_error() . "\n";
            $message .= 'Запрос целиком: ' . $sql;
            die($message);
        }
        return true;
    }
}
