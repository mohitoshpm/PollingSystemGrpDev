
<?php
include_once("./framework/function.php");
GetHeaderWithNav("login Page");
?>
  

<div class="container">
  
  <div class="row">
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <?php

        if(isset($_SESSION['email'])){
            echo "Welcome <b>".$_SESSION['fullName']."</b> to the system";
            echo "<br>Your username is: <b>".$_SESSION['email']."</b>";
            
        } else{
            header("location: login.php");
        }

    ?>
    </div>
    
  </div>
  
</div>

        






<?php GetFooter(); ?>