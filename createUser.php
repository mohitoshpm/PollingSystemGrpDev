
<?php
include_once("./framework/function.php");
include_once("./framework/user-profile-function.php");

GetHeader("Create New User");
GoToHome();

$errorMessage="";
$isError=false;


if(isset($_POST['submit_button'])){
  
  $isError = !IsValidUserProfile($errorMessage,0);

if( !$isError){

    $fullName = $_POST['fullName'];
    $genderEnumId = $_POST['gender'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = md5($_POST['password']);
    $isAdmin = false;
    $userType = new UserTypeEnum();
    $userTypeEnumId = $userType->Hr;



    $sql = "INSERT INTO user_profile(FullName, Email, Mobile, Password, GenderEnumId, IsAdmin,	UserTypeEnumId	 ) VALUE('$fullName', '$email','$mobile', '$password','$genderEnumId','$isAdmin','$userTypeEnumId')";
    
    $db = GetDb();
    mysqli_query($db, $sql);

    $sql="SELECT * FROM user_profile WHERE email='$email' AND password='$password'";

    $result = mysqli_query($db, $sql);

    if(mysqli_num_rows($result)== 1){
      SetSession($result);
     
    }
}

}

?>
  <div class="container">   
    
    <div class="row">     
      <div class="col-md-4 col-md-offset-4" style="background: antiquewhite; padding-top: 20px; padding-bottom: 20px; border-radius: 5px;">     
      <h1>Create User Account</h1>

      <div class="alert alert-danger" style="display: <?php echo ($isError? 'block':'none'); ?>;">
            <strong>Error!</strong> <?php echo $errorMessage?>
        </div>
        <form method="post" action="createUser.php">
          <div class="form-group">
          <label for="fullName">Full Name:</label>
            <input type="text" name="fullName" class="form-control" id="full-name">
          </div>

          <div class="form-group">
          <label for="gender">Gender:</label>                      
            <select name="gender" class="form-control">
            <option>Select One</option>
              <?php 
              $class_vars = GenderEnumList();
              foreach ($class_vars as $name => $value) {
                  echo "<option value=".$value.">$name</option>";
              }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" name="email" class="form-control" id="email">
          </div>

          <div class="form-group">
            <label for="mobile">Mobile:</label>
            <input type="tel" name="mobile" class="form-control" id="mobile">
          </div>


          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" name="password"  class="form-control" id="pwd">
          </div>

          <div class="form-group">
            <label for="con-pwd">Confirm Password:</label>
            <input type="password" name="confirmPassword" class="form-control" id="Confirm-Password">
          </div>

          <div style="text-align: center;">
            <button type="submit" name="submit_button" class="btn btn-default btn-success">Submit</button>
          </div>         
        </form>

        <br>
        <div style="text-align: center;">
        <a href="./login.php">
            <button class="btn btn-default btn-info">Login</button>
        </a>
           
          </div>  
      </div>    
    </div>    
  </div>
  
<?php GetFooter(); ?>
