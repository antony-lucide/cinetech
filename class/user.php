<?php
class UserModel {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }

    public function createUser($username, $email, $password) {
        $this->validateUserData($username, $email, $password);
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        try {
            $sql = "INSERT INTO users (username, email, password, created_at) 
                   VALUES (:username, :email, :password, NOW())";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la création de l'utilisateur: " . $e->getMessage());
        }
    }

    private function validateUserData($username, $email, $password) {
        if (strlen($username) < 3) {
            throw new Exception("Le nom d'utilisateur doit contenir au moins 3 caractères");
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Format d'email invalide");
        }
        
        if (strlen($password) < 8) {
            throw new Exception("Le mot de passe doit contenir au moins 8 caractères");
        }
    }

    public function login($email, $password) {
        $user = $this->getUserByEmail($email);
        
        if (!$user || !password_verify($password, $user['password'])) {
            throw new Exception("Email ou mot de passe incorrect");
        }
        
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        
        return $user;
    }

    public function getUserByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}