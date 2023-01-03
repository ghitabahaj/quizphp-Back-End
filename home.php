<?php 
include 'scripts.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>PHP Quiz - Sign Up</title>
</head>
<body>
    <div class="container">
        <div class="signup" id="signup">
        <p class="title">Sign Up Here</p>
        <form class="signup-form" action="scripts.php" method="post">
        <?php if (isset($_SESSION['dataInvalid'])): ?>
				       <div class="red">
				       <strong>Oops !</strong>
					     <?php 
						   echo $_SESSION['dataInvalid']; 
						   unset($_SESSION['dataInvalid']);
					      ?>
				     </div>
			   <?php endif ?>
         <?php if (isset($_SESSION['inUse'])): ?>
				       <div class="red">
				       <strong>Oops !</strong>
					     <?php 
						   echo $_SESSION['inUse']; 
						   unset($_SESSION['inUse']);
					      ?>
				     </div>
			   <?php endif ?>
            <div>
              <label>Your Username</label>
              <input type="text" id="username1" name="username1" placeholder="username"/>    
            </div>

            <div>
              <label >Your Email</label>
              <input type="email" id="email1" name="email1" placeholder="email" />          
            </div>
         
            <div >
             <label>Password</label>
              <input type="password" id="pass1" name="password1" placeholder="password"/>
            </div>

            <div>
              <button type="submit" name="saveuser" id="signup-btn" >Sign up</button>
            </div>
          </form>
          <p>Have already an account? <button class="loginlink" id="login-link"><u>Login here</u></button></p>
        </div>
        <div class="login hide" id="login">
            <p class="title">Login Here</p>
            <form class="login-form" method="post" action="scripts.php">
                <div>
                  <label class="form-label">Your Username</label>
                  <input type="text" id="username1" name="usernamelog" placeholder="username"/>    
                </div>
                <div >
                 <label>Password</label>
                  <input type="password" id="pass1" name="passwordlog" placeholder="password"/>
                </div>
    
                <div>
                                                                                                                                                                                                                                                                                    
                  <button type="submit" name="loginuser" id="Login-btn"><a>Login</a></button>
                </div>
              </form>
              <p>D'ont have an account? <button class="signlink"  id="signup-link" ><u>Sign up here</u></button></p>
        </div>
    </div>
    <script src="sign.js"></script>
</body>
</html>