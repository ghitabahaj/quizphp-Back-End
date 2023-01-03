<?php 
include_once 'db_connect.php';

class question{
    public $text;
    public $choice1;
    public $choice2;
    public $choice3;
    public $choice4;
    public $answer;
    

    public function __construct($text,$choice1,$choice2,$choice3,$choice4,$anwser)
    {
        $this->text = $text;
        $this->choice1 = $choice1;
        $this->choice2 = $choice2;
        $this->choice3 = $choice3;
        $this->choice4 = $choice4;
        $this->answer = $answer;
    }
    
    public static function showQuestions(){
        $db_connect = new db_connect;
        $pdo = $db_connect->connection();
        $stmt = $pdo->prepare('SELECT * FROM questions');
        $stmt->execute();
        return $stmt->fetchAll();
    }  
}

?>