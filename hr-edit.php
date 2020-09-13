
<?php
include_once("./framework/function.php");

include_once("./framework/user-profile-function.php");

GetHeaderWithNav("Hr Edit");
?>


<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Personal Info</a></li>
    <li><a data-toggle="tab" href="#salary-history">Increment & Salary History</a></li>
    <li><a data-toggle="tab" href="#menu2">Working History</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <?php 
    include_once("./hr-edit-profile.php");
    ?>
    </div>
    <div id="salary-history" class="tab-pane fade">
        <?php 
            include_once("./salary-history.php");
        ?>
    </div>
    <div id="menu2" class="tab-pane fade">
        <?php 
            include_once("./work-history.php");
        ?>

    </div>
    
  </div>
  
  <?php GetFooterWithNav(); ?>
