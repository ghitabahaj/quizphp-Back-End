const signupB=document.getElementById('signup-btn');
const loginB=document.getElementById('login-link');
const signuplink=document.getElementById('signup-link');


const signup=document.getElementById('signup');
const login=document.getElementById('login');


signupB.addEventListener('click',function(){
    login.classList.remove('hide');
    signup.classList.add('hide');
  });


signuplink.addEventListener('click',function(){
    login.classList.add('hide');
    signup.classList.remove('hide');
  });
  
loginB.addEventListener('click',function(){
    login.classList.remove('hide');
    signup.classList.add('hide');
  });