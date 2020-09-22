
<?php

include_once("./framework/function.php");
GetHeaderWithNav("User List");

$userType = new UserTypeEnum();
 $userList=GetList("user_profile","");

 
if(isset($_POST['Delete'])){
  if($_POST['Delete']>0){

    $id = $_POST['Delete'];
    $sql="DELETE FROM user_profile WHERE Id = $id";
    $db = GetDb();
    mysqli_query($db, $sql);

  }
}



?>
  
<div class="row">    
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <h2>User List</h2>
      <?php if(mysqli_num_rows($userList)> 0):?>   
        <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Sn</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Gender</th>
                <!-- <th>Role</th> -->
                <!-- <th>Type</th> -->
                <!-- <th>Action</th> -->
            </tr>
        </thead>
      <tbody>
       <?php $sn=1;
        while($user = $userList->fetch_assoc()):?>
        <tr>
        <td style="text-align: center;"> <?php  echo $sn; ?></td>
          <td> <?php  echo $user["FullName"]; ?></td>
          <td> <?php  echo $user["Email"]; ?></td>
          <td style="text-align: center;"> <?php  echo $user["Mobile"]; ?></td>
          <td style="text-align: center;"> 
            <?php  
          $class_vars = GenderEnumList();
          foreach ($class_vars as $name => $value) {
            if ($user["GenderEnumId"]==$value){
              echo $name;
            break;
            }
          }
          ?>
          </td>
          <!-- <td style="text-align: center;"> 
            <?php  
            // if($user["IsAdmin"]){
            //     echo "Admin";
            // }else{
            //     echo "";
            // }
          ?>
          </td> -->
          <!-- <td style="text-align: center;"> 
            <?php  
          $class_vars = UserTypeEnumList();
          foreach ($class_vars as $name => $value) {
            if ($user["UserTypeEnumId"]==$value){
              echo $name;
            break;
            }
          }
          ?>
          </td> -->
          <!-- <td style="text-align: center;"> 
            <a href="./profile.php">
                <button class=" btn btn-default btn-xs btn-info">Profile</button>
            </a>
            <a href="./hr-edit.php?id=<?php echo $user["Id"];?>">
                <button class=" btn btn-default btn-xs btn-info">Edit</button>
            </a>
          
            <form method="post" style="display: inline-block;"> 
            <button type="submit" name="Delete" value="<?php echo $user["Id"];?>"  class=" btn btn-default btn-xs btn-danger" >Delete</button>
            </form> 
          </td> -->
        </tr>
       <?php $sn++;
       endwhile; ?>
      </tbody>
    </table>
    <?php else: ?>

    <?php endif; ?>
  </div>
  
</div>



<?php GetFooterWithNav(); ?>