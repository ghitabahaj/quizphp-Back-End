var questions;
getdata();
function getdata(){
  function convert(str)
{
  str = str.replace(/&amp;/g, "&");
  str = str.replace(/&gt;/g, ">");
  str = str.replace(/&lt;/g, "<");
  str = str.replace(/&quot;/g, '"');
  str = str.replace(/&#039;/g, "'");
  return str;
}

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function(){
    if(this.readyState==4 && this.status == 200){
      console.log(convert(this.responseText));

      let jsonResponse = JSON.parse(convert(this.responseText));
      questions = jsonResponse;
    }
  };

  xhttp.open("GET","./classes/test.php",false);
  xhttp.send();

}

console.log(questions);

  const question = document.getElementById('question');
  const choices = Array.from(document.getElementsByClassName('choice-text'));
  const progressText = document.getElementById('progressText');
  const scoreText = document.getElementById('score');
  const progressBarFull = document.getElementById('progressBarFull');
  const scoreDiv = document.getElementById('score1');


  // buttons 
  const startQ = document.getElementById('start-quiz');
  const quitQ = document.getElementById('quit-quiz');

  
  // page 
  const guide = document.getElementById('guide');
  const quiz = document.getElementById('game');
  const result = document.getElementById('result');




  // directions divs 
  const toStep1 = document.getElementById('to-second-fill1');
  const toStep2 = document.getElementById('to-third-fill2');
  const secondStep = document.getElementById('second-step');
  const thirdStep = document.getElementById('third-step');
  const thirdStepIcon = document.getElementById('third-step-icon');
  const secondStepIcon = document.getElementById('second-step-icon');


startQ.addEventListener('click',function(){
  guide.classList.remove('active');
  quiz.classList.add('active');
  guide.classList.add('hide');
  toStep1.style.width ='100%';
  setTimeout(function () {
    secondStep.style.backgroundColor="rgb(0, 166, 255)";
    secondStepIcon.style.color="white";
  },500);
});
let scoreU = 0;
quitQ.addEventListener('click',function(){
     location.reload();
     id = quitQ.getAttribute("UserId");
     scoreU=quitQ.getAttribute("scoreUser");
    window.location.href = "./scripts.php?id=" + id+"&Score="+scoreU;
});

  let correctanswer=0;
  let questioncounter=0;
  let score=0;
  const total=questions.length;
  let questionIndex = Math.floor(Math.random() * questions.length);
  
  showQuestion(questionIndex);
  
  function showQuestion(index){
      let j=0;
      question.innerText=questions[index].question;
      question.setAttribute("data-answer",questions[index].answer);
      for(let i=2;i<6;i++){
        choices[j].innerText=questions[index][i];
        j++;
      }
      questions.splice(index,1);
  }

  function getAnswer(param){
        choices.forEach(choice => {
        choice.classList.add("disabled");
      });
      let answer = question.dataset["answer"];
      if(param==answer){
        choices[param-1].classList.add("correct");
        correctanswer++;
        score+=10;
        scoreText.innerText = score;
        
      }else{
        choices[param-1].classList.add("incorrect");
        choices[answer-1].classList.add("correct");
        
      }
      choices.forEach(choice => {
        if(choice.dataset['number'] != param && choice.dataset['number'] != answer){
            choice.parentElement.classList.add("hidden");
        }
      });
      progressBarFull.style.width=(((total - questions.length) / total) * 100)+'%';
      if(questions.length == 0){
        quitQ.setAttribute("scoreUser",score);
        setTimeout(function(){
          choices.forEach(choice => {
             choice.classList.remove("incorrect");
              choice.classList.remove("correct");
              choice.parentElement.classList.remove("hidden");});
              quiz.classList.remove('active');
              quiz.classList.add('hide');
              result.classList.add('active');
              scoreDiv.innerText=score+"/"+ total*10;

          },1500);
          setTimeout(function () {
          toStep2.style.width ='100%';
          setTimeout(function () {
            thirdStep.style.backgroundColor="rgb(0, 166, 255)";
            thirdStepIcon.style.color="white";
          },500);},1000);
       
      }else{
        setTimeout(function(){
    choices.forEach(choice => {
       choice.classList.remove("incorrect");
        choice.classList.remove("correct");
        choice.parentElement.classList.remove("hidden");
        choice.classList.remove("disabled");
    });
    questionIndex = Math.floor(Math.random() * questions.length);
    showQuestion(questionIndex)},1500);
      }
  
  }
