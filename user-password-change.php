
<?php
include_once("./framework/function.php");
include_once("./framework/user-profile-function.php");
GetHeaderWithNav("Password Change");
$errorMessage="";
$isError=false;
$isSave=false;

$id=$_COOKIE["Id"];

if(isset($_POST['submit_button'])){
  //$isError = !IsValidUserProfile($errorMessage,$id);

  $currentPassword = md5($_POST['currentPassword']);
      
  $user=GetById("user_profile", $id);

  if(isset($user)){
    if($user["Password"]!==$currentPassword){
      $isError=true;
      $errorMessage="Invalid Current Password";
    }
    else if($_POST['password']!==$_POST['confirmPassword']){
      $isError=true;
      $errorMessage="Password & Confirm Password not match.";
    }
    else if(strlen($_POST['password'])<3){
      $isError=true;
      $errorMessage="Password give must 3 character..";


    }
  }

if( !$isError)
{

  if(isset($user)){

    $isAdded=true;
    $password = md5($_POST['password']);
      $sql = "UPDATE user_profile set  Password='$password'  where id = $id";
      
  }
    $db = GetDb();

    mysqli_query($db, $sql);

    $isSave=true;
    //header("location: success.php");
}

}
$user=GetById("user_profile",$_COOKIE["Id"]);
  if(isset($user)){
    $isAdded=true;
  }else{
    $isAdded=false;
  }
?>


<h2>Change Password</h2>
<div class="alert alert-danger" style="display: <?php echo ($isError? 'block':'none'); ?>;">
            <strong>Error!</strong> <?php echo $errorMessage?>
</div>

<div class="alert alert-success" style="display: <?php echo ($isSave? 'block':'none'); ?>;">
            <strong>Message:</strong> Successfully Save Data.
</div>

<form method="post" action="user-password-change.php">
    <div class="row">     
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding-bottom: 20px; border-radius: 5px;">     
          
      <div class="form-group">
            <label for="pwd">Current Password:</label>
            <input type="password"  name="currentPassword"  class="form-control" id="currentPassword">
          </div>

          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password"  name="password"  class="form-control" id="pwd">
          </div>

          <div class="form-group">
            <label for="con-pwd">Confirm Password:</label>
            <input type="password" name="confirmPassword" class="form-control" id="Confirm-Password">
          </div> 

          <div style="text-align: center;">
            <button type="submit" name="submit_button" class="btn btn-default btn-success">Save</button>
          </div>

      </div>    
    </div>    
    </form>
  
  <?php GetFooterWithNav(); ?>
