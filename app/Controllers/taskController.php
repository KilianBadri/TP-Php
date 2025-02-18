<?php
require_once '..\app\models\Task.php';
require_once '..\app\models\User.php';
// require_once '..\app\models\Priority.php';
class TaskController {
    private $taskModel;
    private $userModel;
    private $priorityModel;

    public function __construct($pdo) {
        $this->taskModel = new Task($pdo);
        $this->userModel = new User($pdo);
        // $this->priorityModel = new Priority($pdo);
    }

    public function index($userId) {
        $tasks = $this->taskModel->getTasksByUserId($userId);
        
        include '../app/views/tasks.php';
    }
}


?>

