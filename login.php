

<?php
include_once("./framework/function.php");
GetHeader("login Page");
GoToHome();
if(isset($_POST['submit'])){
    
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql="SELECT * FROM user_profile WHERE email='$email' AND password='$password'";

    $db = GetDb();
    $result = mysqli_query($db, $sql);

    if(mysqli_num_rows($result)== 1){
      SetSession($result);
      
    }else {
        echo "incorrect email/password combination";
    }
}

?>
  <div class="container">   
    <div class="row">     
      <div class="col-md-4 col-md-offset-4" style="background: antiquewhite; padding-top: 20px; padding-bottom: 20px; border-radius: 5px;">
<h1 style="text-align: center; margin-bottom: 30px;">Polling System</h1>

        <form method="post" action="login.php">
          <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" name="email" class="form-control" id="email">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" name="password" class="form-control" id="pwd">
          </div>
          <div style="text-align: center;">
            <button type="submit" name="submit" class="btn btn-default btn-success">Login</button>
          </div>         
        </form>
        <div style="text-align: center;">
          <br>
          <a href="./createUser.php">
            <button class="btn btn-default btn-info">Create Account</button>
          </a>
        </div>
      </div>    
    </div>    
  </div>
<?php GetFooter(); ?>

