<?php
include_once("./framework/function.php");
$errorMessage="";
$isError=false;
$isSave=false;

$id=0;

if(isset($_GET['id']) && $_GET['id']>0){
  $id=$_GET['id'];
  //print_r($user);

}

$salaryId=0;

if(isset($_POST['salary-edit'])){
    if($_POST['Edit']>0){
  
      $salaryId = $_POST['Edit'];
    //   $sql="DELETE FROM user_profile WHERE Id = $id";
    //   $db = GetDb();
    //   mysqli_query($db, $sql);
  
    }
  }



if(isset($_POST['submit_salary'])){
  //$isError = !IsValidUserProfile($errorMessage,$id);


//if( !$isError)
{
    
    $amount = $_POST['amount'];
    $isActive = true;
    $workingHour = $_POST['workingHour'];
    
    $userType = new UserTypeEnum();
    $userTypeEnumId = $userType->Hr;

    $user=GetById("user_profile", $_SESSION['id']);

    $salary=GetById("user_salaryhistory", $salaryId);


  if(isset($salary)){
    $isAdded=true;
    $sql = "UPDATE user_salaryhistory set Amount='$amount', IsActive='$isActive', WorkingHour='$workingHour' where id = $salaryId";

  }else{
    $isAdded=false;
    $sql = "INSERT INTO user_salaryhistory(ProfileId, Amount, IsActive, WorkingHour) VALUE('$id','$amount', '$isActive','$workingHour')";
  }
    
    $db = GetDb();

    mysqli_query($db, $sql);

    $isSave=true;

   


    //header("location: success.php");
}

}


$salaryList=GetList("user_salaryhistory","ProfileId=$id");

$user=GetById("user_profile", $id);
  if(isset($user)){
    $isAdded=true;
  }else{
    $isAdded=false;
  }

?>



<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <h2>Salary List</h2>
        <div>
            
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Amount</th>
                        <th>Working Hour</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $sn=1;
                        while($salaryRow = $salaryList->fetch_assoc()):?>
                    <tr>
                    <td> <?php  echo $sn; ?></td>
                        <td> <?php  echo $salaryRow["Amount"]; ?></td>
                        <td><?php  echo $salaryRow["WorkingHour"]; ?></td>
                        <td><?php if($salaryRow["IsActive"]){
                                echo "Active";
                        }?></td>
                         <td> 
                         <button class=" btn btn-default btn-xs btn-info">Edit</button>
                         <button class=" btn btn-default btn-xs btn-danger" >Delete</button>
                         </td>
                    </tr>
                    <?php $sn++;
                        endwhile; ?>

                </tbody>
            </table>
            
        </div>
        
    </div>
    
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
        <h2 style="display:inline-block;">Add/Edit Salary</h2>
        <button class="btn btn-default btn-success btn-xs">Add new</button>
        <!-- action="hr-edit.php?id=<?php echo $id?>#salary-history" -->
        <form  method="POST" role="form" class="thumbnail">
            <div class="form-group">
                <label for="">Amount in TK</label>
                <input type="text" class="form-control" name="amount" id="" placeholder="Amount">
            </div>

            <div class="form-group">
                <label for="">Active</label>
                <input type="checkbox" id="" >
            </div>
            <div class="form-group">
                <label for="">Working Hour (Per Month)</label>
                <input type="text" name="workingHour" class="form-control" id="" placeholder="Working Hour">
            </div>
            
        <div style="text-align: center;">
            <button type="submit" name="submit_salary"  class="btn btn-primary">Save</button>
        </div>
            
        </form>
        
    </div>
    
</div>
