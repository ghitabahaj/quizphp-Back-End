<?php 
include_once 'db_connect.php';

class score{

    public $score;
    public $userId;

    public function __construct($score,$userId)
    {
        $this->score=$score;
        $this->userId=$userId;
    }



public static function saveScore($score,$userId){
    $db_connect = new db_connect;
    $pdo = $db_connect->connection();
    $sql = "INSERT INTO score (score,userId)
    VALUES (:score, :userId)"; 
    $stmt =  $pdo->prepare($sql);
    $stmt->bindParam(':score',            $score);
    $stmt->bindParam(':userId',         $userId); 
    $stmt->execute();
}}
?>