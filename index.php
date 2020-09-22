
<?php
include_once("./framework/function.php");
GetHeaderWithNav("Dashboard");

$id=$_COOKIE["Id"];
?>
  

        <h1>Welcome  <?php  
          echo $_COOKIE["FullName"]; 
          ?> </h1>
  
          <?php 
          GenderEnumList();
          ?>


       
       <div class="row">
         

         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
          <div class="alert-danger" style="border-radius: 5px;text-align: center; padding: 10px; ">
            <h3>Total User</h3>
          <div style="height: 50px; ">
           <span style="font-size: 24px;"><?php echo  mysqli_num_rows(GetList("user_profile",""));?></span>
          </div>
          </div>
        </div>

         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
          <div class="alert-success" style="border-radius: 5px;text-align: center; padding: 10px; ">
            <h3>Total Active Poll</h3>
          <div style="height: 50px; ">
           <span style="font-size: 24px;"><?php echo  mysqli_num_rows(GetList("poll",""));?></span>
          </div>
          </div>
        </div>

        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
          <div class="alert-info" style="border-radius: 5px;text-align: center; padding: 10px; ">
            <h3>Total My Poll</h3>
          <div style="height: 50px; ">
           <span style="font-size: 24px;"><?php echo  mysqli_num_rows(GetList("poll","	CreateBy=$id"));?></span>
          </div>
          </div>
        </div>

       </div>

       
       






<?php GetFooterWithNav(); ?>