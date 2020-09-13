
<?php
$errorMessage="";
$isError=false;
$isSave=false;

$id=0;

if(isset($_GET['id']) && $_GET['id']>0){
  $id=$_GET['id'];
  //print_r($user);

}

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
    if($_SESSION['id']==$id){
      $password = md5($_POST['password']);
      $sql = "UPDATE user_profile set FullName='$fullName', Email='$email', Mobile='$mobile' , Password='$password' , GenderEnumId='$genderEnumId', IsAdmin='$isAdmin',	UserTypeEnumId='$userTypeEnumId' where id = $id";
    }else{

      $sql = "UPDATE user_profile set FullName='$fullName', Email='$email', Mobile='$mobile'  , GenderEnumId='$genderEnumId', IsAdmin='$isAdmin',	UserTypeEnumId='$userTypeEnumId' where id = $id";
    }
  }else{

    $password = md5($_POST['password']);
    $isAdded=false;
    $sql = "INSERT INTO user_profile(FullName, Email, Mobile, Password, GenderEnumId, IsAdmin,	UserTypeEnumId	 ) VALUE('$fullName', '$email','$mobile', '$password','$genderEnumId','$isAdmin','$userTypeEnumId')";
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
<h2>Hr Edit</h2>
<div class="alert alert-danger" style="display: <?php echo ($isError? 'block':'none'); ?>;">
            <strong>Error!</strong> <?php echo $errorMessage?>
</div>

<div class="alert alert-success" style="display: <?php echo ($isSave? 'block':'none'); ?>;">
            <strong>Message:</strong> Successfully Save Data.
</div>

<form method="post" action="hr-edit-profile.php?id=<?php echo $id ?>">
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

          <?php if(!$isAdded || $_SESSION['id']==$id): ?>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password"  name="password"  class="form-control" id="pwd">
          </div>

          <div class="form-group">
            <label for="con-pwd">Confirm Password:</label>
            <input type="password" name="confirmPassword" class="form-control" id="Confirm-Password">
          </div> 
          <?php endif; ?>

          <div style="text-align: center;">
            <button type="submit" name="submit_button" class="btn btn-default btn-success">Save</button>
          </div>

      </div>    
    </div>    

    
    </form>
  
