<?php
    // app/models/Task.php
class Task {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Créer une tâche
    public function create($title, $description, $userId, $priorityId) {
        $stmt = $this->pdo->prepare("INSERT INTO tasks (title, description, user_id, priority_id) 
                                     VALUES (?, ?, ?, ?)");
        return $stmt->execute([$title, $description, $userId, $priorityId]);
    }

    // Récupérer les tâches d'un utilisateur
    public function getTasksByUserId($userId) {
        $stmt = $this->pdo->prepare("SELECT tasks.*, priorities.priority_name 
                                     FROM tasks 
                                     JOIN priorities ON tasks.priority_id = priorities.id
                                     WHERE tasks.user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Modifier une tâche
    public function updateTask($taskId, $title, $description, $priorityId) {
        $stmt = $this->pdo->prepare("UPDATE tasks SET title = ?, description = ?, priority_id = ? 
                                     WHERE id = ?");
        return $stmt->execute([$title, $description, $priorityId, $taskId]);
    }

    // Supprimer une tâche
    public function deleteTask($taskId) {
        $stmt = $this->pdo->prepare("DELETE FROM tasks WHERE id = ?");
        return $stmt->execute([$taskId]);
    }
}

?>