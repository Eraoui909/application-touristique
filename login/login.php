
<?php 

  require_once "../connect.php";
  require_once "../include/functions.php";
  session_start();


  global  $errors,$success ;

  //register form
  if(isset($_POST['passRepeat'])){

    
    
    $username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
    $email    = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $pass     = filter_var($_POST['pass'],FILTER_SANITIZE_STRING);
    $Rpass    = filter_var($_POST['passRepeat'],FILTER_SANITIZE_STRING);

    if($Rpass == $pass){

      $stmt = $connect->prepare("SELECT * FROM users WHERE user_email=:email");
      $stmt->bindParam(':email' , $email);
      $stmt->execute();
      if($stmt->rowCount()> 0){
        $errors[] = "this email alreay exist";
      }else{

          $sql = $connect->prepare("
                            INSERT INTO users(user_name,user_email,user_pass,user_inscri_date)
                            VALUES(:username,:email,:pass,sysdate())
                            ");

          $sql->bindParam(':username' , $username);
          $sql->bindParam(':email' , $email);
          $sql->bindParam(':pass' , $pass);
          $sql->execute();

          if($sql->rowCount() > 0){
            $success[] = "you have sign up with success";
            header( "refresh:2;url=login.php" );
          }else{
            $errors[] = "There is an error, please try again";
          }

      }

      
      

    }else{
      $errors[] = "You must enter passwords correct, try again pleas!!!";
    }
    
  }

  //log in form

  if(isset($_POST['in_email']) && !empty($_POST['in_email']))
  {
    $email    = filter_var($_POST['in_email'],FILTER_SANITIZE_EMAIL);
    $pass     = filter_var($_POST['in_pass'],FILTER_SANITIZE_STRING);

    $stmt = $connect->prepare("SELECT * FROM users WHERE user_email=:email AND user_pass=:pass");
    $stmt->bindParam(':email' , $email);
    $stmt->bindParam(':pass' , $pass);
    $stmt->execute();
    $result = $stmt->fetch();
    if($stmt->rowCount()>0){
      $_SESSION['user_id'] = $result['user_id'];
      $_SESSION['user_name'] = $result['user_name'];
      $_SESSION['user_email'] = $result['user_email'];
      $success[] = "Welcome Mr(s) ".$_SESSION['user_name'];
      header( "refresh:2;url=../index.php" );
    }else{
      $errors[] = "your email or password is incorrect";
    }
  }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="http://localhost/mini%20projet/svgs/mysvgs/log2.png">
    <link rel="stylesheet" href="../css/bootstrap4.css">
    <link rel="stylesheet" href="http://localhost/mini%20projet/css/style.css">
    <link rel="stylesheet" href="login.css">
    

</head>
<body class="body">

    <!-- <div class="ha-title">
        <a class="navbar-brand ha-navbar-title" href="../index.php"> <span>R</span> inho<strong>.</strong> </a>
    </div> -->
    <div >
    <?php include_once "../include/navbar.php"; ?>
    <hr>
    </div>

    <div class="container">
      <?php 
        if(!empty($errors)){
          foreach( $errors as $error ){
            errorMsg($error);
          }
        }
        if(!empty($success)){
          foreach( $success as $succ){
            successMsg($succ);
          }
        }
      ?>
    </div>


    
    <div class="custom-control custom-switch login-choic">
        <input type="checkbox" class="custom-control-input ha-switch-btn" id="customSwitch1">
        <label class="custom-control-label" for="customSwitch1"><span class="ha-switch">Sign in</span></label>
      </div>
    <div class="login-container text-center" cz-shortcut-listen="true">
        <!-- sign-in -->
        <form class="form-signin ha-form-sign" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <img class="mb-4" src="../svgs/user-alt.svg" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input name="in_email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
            <label for="inputPassword" class="sr-only">Password</label>
            <input name="in_pass" type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
            <div class="checkbox mb-3">
              <label style="display: flex; justify-content: space-between;">
                <span><input type="checkbox" value="remember-me"> Remember me</span>
                <a href="#">forget password</a>
              </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">© 2020-2021</p>
          </form>
          <!-- sign-up -->

          <form class="form-signin ha-form-sign active" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

              <img class="mb-4" src="../svgs/user-alt.svg" alt="" width="72" height="72">
              <h1 class="h3 mb-3 font-weight-normal">Please sign Up</h1>
              <label for="inputUser" class="sr-only">Username</label>
              <input name="username" type="text" id="inputUser" class="form-control" placeholder="Username" required="" autofocus="">
              <label for="inputEmail" class="sr-only">Email address</label>
              <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
              <label for="inputPassword" class="sr-only">Password</label>
              <input name="pass" type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
              <label for="inputRPassword" class="sr-only">Repeat Password</label>
              <input name="passRepeat" type="password" id="inputRPassword" class="form-control" placeholder="Password" required="">
              <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" value="remember-me"> Remember me
                </label>
              </div>

              <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

            <p class="mt-5 mb-3 text-muted">© 2020-2021</p>

          </form>
    </div>
    

      <script src="../js/jquery.comjquery-3.5.1.min.js"></script>
      <script src="../js/bootstrap.js"></script>
      <script src="login.js"></script>
  </body>
  </html>