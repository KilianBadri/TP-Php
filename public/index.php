<?php
require_once '..\app\Controllers\taskController.php';
require_once '..\app\Controllers\userController.php';
require_once '..\config\database.php';
$taskController = new taskController($pdo);
$userController = new userController($pdo);


$url = $_SERVER['REQUEST_URI'];

switch ($url) {
    case '/register':
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $userController->showRegisterForm();
        } else {
            $userController->register();
        }
        break;
    case '/login':
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $userController->showLoginForm();
        } else {
            $userController->login();
        }
        break;
    case '/logout':
        $userController->logout();
        break;
    default:
    //   $userController->showRegisterForm();  
            header('Location: /TP-Php/app/Views/User/register.php');
    exit;
    }

?>