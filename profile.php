
<?php
include_once("./framework/function.php");
GetHeaderWithNav("Profile");

 $user=GetById("user_profile", $_SESSION['id'])


?>
  
<div class="row">    
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   
  <h2>Profile</h2>
    <table class="table table-bordered table-hover">
      <tbody>
        <tr>
          <td style="width: 70px;">Name:</td>
          <td> <?php  echo $user["FullName"]; ?></td>
        </tr>
        <tr>
          <td>Email:</td>
          <td> <?php  echo $user["Email"]; ?></td>
        </tr>
        <tr>
          <td>Mobile:</td>
          <td> <?php  echo $user["Mobile"]; ?></td>
        </tr>
      </tbody>
    </table>

    <div class="text-center">
      <button type="button" class="btn btn-info">Edit</button>
    </div>
    
    
  </div>
  
</div>


<?php GetFooterWithNav(); ?>