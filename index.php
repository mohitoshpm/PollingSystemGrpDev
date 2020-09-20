
<?php
include_once("./framework/function.php");
GetHeaderWithNav("Dashboard");
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
           <span style="font-size: 24px;">6</span>
          </div>
          </div>
        </div>

         <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
          <div class="alert-success" style="border-radius: 5px;text-align: center; padding: 10px; ">
            <h3>Total Active Poll</h3>
          <div style="height: 50px; ">
           <span style="font-size: 24px;">3</span>
          </div>
          </div>
        </div>

       </div>

       
       






<?php GetFooterWithNav(); ?>