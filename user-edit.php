
<?php
include_once("./framework/function.php");

include_once("./framework/user-profile-function.php");

GetHeaderWithNav("Profile Edit");
$id=$_COOKIE["Id"];
?>


<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Personal Info</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <?php include_once("./user-edit-profile.php");?>
    </div>
  </div>
  
  <?php GetFooterWithNav(); ?>
