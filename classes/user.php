<?php 
include_once 'db_connect.php';
session_start();

class User{
    public $username;
    public $password;
    public $email;
    public $role;

    public function __construct($username,$password,$email,$role)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->role = $role;
    }

    public function createUser()
    {
        $username = $this->username;
        $password = $this->password;
        $email = $this->email;
        $role = $this->role;

        $db_connect = new db_connect;
        $pdo = $db_connect->connection();
        $sql = "INSERT INTO users (username,password,email,role)
        VALUES (:username, :password, :email, :role)"; 
        $stmt =  $pdo->prepare($sql);
        $stmt->bindParam(':username',            $username);
        $stmt->bindParam(':password',         $password); 
        $stmt->bindParam(':email',        $email);
        $stmt->bindParam(':role',         $role); 
        $stmt->execute();
    }


    public static function loginUser($username,$password){
        $db_connect = new db_connect;
        $pdo = $db_connect->connection();
        $sql = "SELECT * FROM users WHERE username=:username AND password=:password";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password); 
        $stmt->execute();
        $row = $stmt->fetch();
        if(!empty($row)){
            $_SESSION['profile']=$row;
            return $row;
        }  
        else{
            return false;
        }
        unset($stmt);
        unset($pdo);
    }

    public static function checkUser($email){
        $db_connect = new db_connect;
        $pdo = $db_connect->connection();
        $sql = "SELECT * FROM users WHERE email=:email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch();
        if(!empty($row)){
            return $row;
        }  
        else{
            return false;
        }
        unset($stmt);
        unset($pdo);
    }

    }

?>