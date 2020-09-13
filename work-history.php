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

if(isset($_POST['work-edit'])){
    if($_POST['Edit']>0){
  
      $salaryId = $_POST['Edit'];
    //   $sql="DELETE FROM user_profile WHERE Id = $id";
    //   $db = GetDb();
    //   mysqli_query($db, $sql);
  
    }
  }



if(isset($_POST['submit_work'])){
  //$isError = !IsValidUserProfile($errorMessage,$id);


//if( !$isError)
{
    
    $workedHour = $_POST['workedHour'];
    $profileId = $id;
    $date = $_POST['date'];
    $createBy =$_SESSION['id'];


    
    $userType = new UserTypeEnum();
    $userTypeEnumId = $userType->Hr;

    $user=GetById("user_profile", $_SESSION['id']);

    $salary=GetById("work_history", $salaryId);


  if(isset($salary)){
    $isAdded=true;
    $sql = "UPDATE work_history set Amount='$amount', IsActive='$isActive', WorkingHour='$workingHour' where id = $salaryId";

  }else{
    $isAdded=false;
    $sql = "INSERT INTO work_history(WorkedHour, ProfileId, Date , CreateBy) VALUE('$workedHour','$profileId', '$date','$createBy')";
  }
    
    $db = GetDb();

    mysqli_query($db, $sql);

    $isSave=true;

   


    //header("location: success.php");
}

}


$workList=GetList("work_history","ProfileId=$id");

$user=GetById("user_profile", $id);
  if(isset($user)){
    $isAdded=true;
  }else{
    $isAdded=false;
  }

?>



<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <h2>Work List</h2>
        <div>
            
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Worked Hour</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $sn=1;
                        while($workRow = $workList->fetch_assoc()):?>
                    <tr>
                    <td class="text-center"> <?php  echo $sn; ?></td>
                        <td class="text-center"> <?php  echo $workRow["WorkedHour"]; ?></td>
                        <td class="text-center"><?php  echo $workRow["Date"]; ?></td>
                         <td class="text-center"> 
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
        <h2 style="display:inline-block;">Add/Edit Work</h2>
        <button class="btn btn-default btn-success btn-xs">Add new</button>
        <!-- action="hr-edit.php?id=<?php echo $id?>#salary-history" -->
        <form  method="POST" role="form" class="thumbnail">
            <div class="form-group">
                <label for="">Worked Hour </label>
                <input type="text" class="form-control" name="workedHour" id="" placeholder="Worked Hour">
            </div>

            <div class="form-group">
                <label for="">Worked Date</label>
                <input type="date" name="date" class="form-control" id="" placeholder="Worked Date">
            </div>
            
        <div style="text-align: center;">
            <button type="submit" name="submit_work"  class="btn btn-primary">Save</button>
        </div>
            
        </form>
        
    </div>
    
</div>
