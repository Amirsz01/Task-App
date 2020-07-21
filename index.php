<?php
require ('app/Model.php');
require ('app/Controller.php');
require ('app/View.php');

session_start();

$controller = new Controller();

isset($_GET["page_num"]) ? $page  = $_GET["page_num"] : $page = 1;
isset($_SESSION['sort_type']) ? $sort_type = $_SESSION['sort_type'] : $_SESSION['sort_type'] = $sort_type = 1;
isset($_SESSION['sort_name']) ? $sort_name = $_SESSION['sort_name'] : $_SESSION['sort_name'] = $sort_name = 'username';

switch ($_GET['action'])
{
    case "auth":
        $res = $controller->model->auth($_POST['login'], $_POST['password']);
        if($res != -1){
           $_SESSION['login'] = $res;
           if($controller->model->is_admin($_SESSION['login']))
           {
               $_SESSION['admin'] = true;
           }
            header('Location: /index.php');
        } else {
            header('Location: /index.php?page=auth&error=1');
        }
        break;
    case "create":
        $controller->model->create_new_task(htmlspecialchars($_POST['username']), $_POST['email'], htmlspecialchars($_POST['task-text']));
        header('Location: /index.php?alert=1');
        break;
    case "logout":
        if(isset($_SESSION['login']))
        {
            unset($_SESSION['login']);
            if(isset($_SESSION['admin']))
            {
                unset($_SESSION['admin']);
            }
        }
        header('Location: /index.php');
        break;
    case "edit":
        if(isset($_POST['status']) &&
            $_POST['status'] == 'on')
        {
           $status = "success";
        }
        else
        {
            $status = "wait";
        }
        $controller->model->edit_task_info($_GET['task_id'], $_POST['task-text'], $status);
        header('Location: /index.php?alert=2');
        break;
    case "sort":
        $_SESSION['sort_type'] = $_GET['sort_type'];
        $_SESSION['sort_name'] = $_GET['sort_name'];
        header('Location: /index.php');
        break;
    default:
        break;
}


switch ($_GET['page']) {
    case "input_task":
        $controller->view->generate('input_task.php', 'template_view.php');
        break;
    case "auth":
        $controller->view->generate('auth.php', 'template_view.php');
        break;
    case "edit_task":
        $controller->view->generate('edit_task.php', 'template_view.php', $controller->model->get_task_data($_GET['task_id']));
        break;
    default:
        $data = (object)[
            'data' => $controller->model->get_data($page, $sort_name, $sort_type),
            'page' => $page,
            'page_max' => $controller->model->get_max_page()
        ];
        $controller->view->generate('content.php', 'template_view.php', $data);
        break;
}
