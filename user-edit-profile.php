
<?php
include_once("./framework/function.php");
include_once("./framework/user-profile-function.php");
$errorMessage="";
$isError=false;
$isSave=false;

$id=$_COOKIE["Id"];




if(isset($_POST['submit_button'])){
  $isError = !IsValidUserProfile($errorMessage,$id);

if( !$isError){


    $fullName = $_POST['fullName'];
    $genderEnumId = $_POST['gender'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $isAdmin = false;
    $userType = new UserTypeEnum();
    $userTypeEnumId = $userType->Hr;


$user=GetById("user_profile", $id);

  if(isset($user)){
    $isAdded=true;
    $sql = "UPDATE user_profile set FullName='$fullName', Email='$email', Mobile='$mobile'  , GenderEnumId='$genderEnumId', IsAdmin='$isAdmin',	UserTypeEnumId='$userTypeEnumId' where id = $id";
  }
    
    $db = GetDb();

    mysqli_query($db, $sql);

    $isSave=true;
    //header("location: success.php");
}

}
$user=GetById("user_profile", $id);
  if(isset($user)){
    $isAdded=true;
  }else{
    $isAdded=false;
  }
?>

<h2>Profile Edit</h2>
<div class="alert alert-danger" style="display: <?php echo ($isError? 'block':'none'); ?>;">
            <strong>Error!</strong> <?php echo $errorMessage?>
</div>

<div class="alert alert-success" style="display: <?php echo ($isSave? 'block':'none'); ?>;">
            <strong>Message:</strong> Successfully Save Data.
</div>

<form method="post" action="user-edit.php">
    <div class="row">     
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding-bottom: 20px; border-radius: 5px;">     
      
          <div class="form-group">
          <label for="fullName">Full Name:</label>
            <input type="text" name="fullName" value="<?php echo $user['FullName']; ?>" class="form-control" id="full-name">
          </div>

          <div class="form-group">
          <label for="gender">Gender:</label>                      
            <select name="gender" class="form-control">
            <option>Select One</option>
              <?php 
              $class_vars = GenderEnumList();
              foreach ($class_vars as $name => $value) {
                  echo "<option value=".$value ." ".($value==$user['GenderEnumId'] ? 'selected' : '').">$name</option>";
              }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" value="<?php echo $user['Email']; ?>" name="email" class="form-control" id="email">
          </div>

          <div class="form-group">
            <label for="mobile">Mobile:</label>
            <input type="tel" value="<?php echo $user['Mobile']; ?>" name="mobile" class="form-control" id="mobile">
          </div>

          <div style="text-align: center;">
            <button type="submit" name="submit_button" class="btn btn-default btn-success">Save</button>
          </div>

      </div>    
    </div>    

    
    </form>
  
