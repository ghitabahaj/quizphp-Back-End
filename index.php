<?php 
include 'scripts.php';
include_once './classes/questions.php';          
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Quick Quiz - Play</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="progress-container">
      <h3 id="first-step"><i class="uil uil-sign-alt"></i></h3>
      <div class="to-step" id="to-second">
        <div class="to-step-fill1" id="to-second-fill1"></div>
      </div>
      <h3 id="second-step"><i class="uil uil-shield-question" id="second-step-icon"></i></h3>
      <div class="to-step" id="to-third">
        <div class="to-step-fill2" id="to-third-fill2"></div>
      </div>
      <h3 id="third-step"><i class="uil uil-favorite"  id="third-step-icon"></i></h3>
  </div> 
    <div class="big-container">
    <div class="guide active" id="guide">
      <!-- guide -->
      <h3>PHP Quick Quiz - Guide</h3>
      <div>  
      <i class="uil uil-check-circle"></i> <p class="para">Test your technical knowledge on the spot.</p></div>
      <div><i class="uil uil-check-circle"></i> <p class="para">Evaluate the correctness of your answers.</p></div>
      <div><i class="uil uil-check-circle"></i> <p class="para">Randomly picked questions from our database.</p></div>
      <div><i class="uil uil-check-circle"></i> <p class="para">You can test your PHP skills with Us.</p></div>     
      <button id="start-quiz" name="start">Start Quiz</button>
    </div>
    <div class="container game" id="game">
  
      <div  class="" style="width: 100%;">
        <div id="hud">
          <div id="hud-item">
            <p id="progressText" class="hud-prefix">
            </p>
            <div id="progressBar">
              <div id="progressBarFull"></div>
            </div>
          </div>
          <div id="hud-item">
            <p class="hud-prefix">
              Score
            </p>
            <h1 class="hud-main-text" id="score">
              0
            </h1>
          </div>
        </div>
       
    <div class="content"> 
      
        <h2 id="question">question</h2>
       </div>
       <div class="anwsers">
        <div class="choice-container">
          <p class="choice-prefix">A</p>
          <p class="choice-text" data-number="1" onclick="getAnswer(this.dataset['number']);">choice 1</p>
        </div>
        <div class="choice-container">
          <p class="choice-prefix">B</p>
          <p class="choice-text" data-number="2" onclick="getAnswer(this.dataset['number']);">choice 2</p>
        </div>
        <div class="choice-container">
          <p class="choice-prefix">C</p>
          <p class="choice-text" data-number="3" onclick="getAnswer(this.dataset['number']);">choice 3</p>
        </div>
        <div class="choice-container">
          <p class="choice-prefix">D</p>
          <p class="choice-text" data-number="4" onclick="getAnswer(this.dataset['number']);">choice 4</p>
        </div>
      </div>
      </div>
    </div>

        
    
    <div class="result" id="result" > 
      <i class="fas fa-crown"></i>
      <p>You've completed the Quiz!</p>
      <p>Your Score is</p>
      <div id="score1"></div>
      <!-- result -->
      <button id="quit-quiz" name="quit" userid=<?=$_SESSION['profile']['id']?> scoreUser="">Quit Quiz</button>
      <a href="logout.php"><button id="log-out">Log Out</button></a>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="main.js"></script>
  </body>
</html>