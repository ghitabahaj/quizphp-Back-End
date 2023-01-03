<?php 
include_once './classes/user.php';
include_once './classes/score.php';





 if(isset($_POST['saveuser']))                 saveUser();
 if(isset($_POST['loginuser']))                   logIn();
 if(isset($_GET['id']))                    saveScoreUser();



function saveUser(){
    $username = $_POST['username1'];
    $email  = $_POST['email1'] ;
    $password = $_POST['password1'];
    if(User::checkUser($email)){
    $_SESSION['inUse']="Email already exists!";
    header("location:home.php");
    }else{
    $user = new User($username,$password,$email,2);
    $user->createUser();
    header("location:home.php");
    }

}

function logIn(){
    $usernamecheck = $_POST['usernamelog'];
    $passwordcheck  = $_POST['passwordlog'] ;
     
   if( User::loginUser($usernamecheck,$passwordcheck)){
       header("location: index.php");
   }else{
    header("location: home.php");
    $_SESSION['dataInvalid']="Invalid Username or Password!";
    
   }
}

function saveScoreUser(){
    $id = $_GET['id'];
    $Score = $_GET['Score'];
    echo $id;
    echo $Score;
    // score::saveScore($Score,$id);
    if(score::saveScore($Score,$id)){
        header("location: index.php");
    }else{
        header("location: index.php");
    }
    unset($_GET['id']);
    unset($_GET['Score']);
}


?>