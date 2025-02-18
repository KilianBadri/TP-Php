<?php
    class UserController {
        private $userModel;
        private $pdo;
    
        public function __construct($pdo) {
            $this->pdo = $pdo;
            $this->userModel = new User($pdo);
        }
    
        public function showRegisterForm() {
            include '..\app\Views\User\register.php'; 
        }
    
        public function register() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
        
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
                if ($this->userModel->register($name, $email, $hashedPassword)) {
                    $_SESSION['message'] = 'Inscription réussie !';
                    echo "Inscriptions réusis"; 
                    header('Location: /login');
                    exit;
                } else {
                    $_SESSION['message'] = 'Erreur lors de l\'inscription.';
                    echo "Vous ne vous êtes pas connecter.";
                    header('Location: /register');
                    exit;
                }
            }
        }
    
        public function showLoginForm() {
            include '..\app\Views\User\login.php';
        }
    
        public function login() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = $_POST['email'];
                $password = $_POST['password'];
    
                $user = $this->userModel->login($email, $password);
    
                if ($user) {
                    $_SESSION['user'] = $user;
                    header('Location: /dashboard');
                    exit;
                } else {
                    $_SESSION['message'] = 'Email ou mot de passe incorrect.';
                    header('Location: /login');
                    exit;
                }
            }
        }
    
        public function logout() {
            session_start();
            session_unset();
            session_destroy();
            header('Location: /login');
            exit;
        }
    }
?>
    