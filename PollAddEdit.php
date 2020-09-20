
<?php
include_once("./framework/function.php");

include_once("./framework/pollAddEditFunction.php");


GetHeaderWithNav("Poll Add/Edit");

$errorMessage="";
$isError=false;
$isSave=false;

$id=0;
if(isset($_GET['id']) && $_GET['id']>0){
  $id=$_GET['id'];

}



?>

<div ng-controller="PollAddEditCtrl"   ng-init="Init()" >
<h2>Employee Add/Edit</h2>
<div class="alert alert-danger" style="display: <?php echo ($isError? 'block':'none'); ?>;">
            <strong>Error!</strong> <?php echo $errorMessage?>
</div>

<div class="alert alert-success" style="display: <?php echo ($isSave? 'block':'none'); ?>;">
            <strong>Message:</strong> Successfully Save Data.
</div>

<div class="row">  
   
   <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
     
     <table class="table table-bordered table-hover">
       <thead>
         <tr>
           <th>SN</th>
           <th>Name</th>
           <th>Action</th>
         </tr>
       </thead>
       <tbody>
         <tr  ng-repeat="row in pollList">
           <td>{{$index+1}}</td>
           <td>{{row.Name}}</td>
           <td style="text-align: center; width: 110px;">
             
             <button type="button" class="btn btn-xs btn-info">Edit</button>
             
             <button type="button" class="btn btn-xs  btn-danger">Delete</button>
             
           </td>
         </tr>
       </tbody>
     </table>
     
   </div>
   
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding-bottom: 20px; border-radius: 5px;">     
      
          <div class="form-group">
          <label for="Name">Name:</label>
            <input type="text" ng-model="poll.Name"  class="form-control" id="Name">
          </div>

          <div class="form-group">
          <label for="StatusEnumId">Status:</label>                      
            <select name="StatusEnumId" class="form-control">
            <option>Select One</option>
              <?php 
              $class_vars = PollStatusEnumList();
              foreach ($class_vars as $name => $value) {
                  echo "<option value=".$value ." ".($value==$user['StatusEnumId'] ? 'selected' : '').">$name</option>";
              }
              ?>
            </select>
          </div>


          <div style="text-align: center;">
            <button ng-click="GetPollById(<?php echo $id; ?>)" class="btn btn-default btn-success">Save</button>
          </div>

      </div>    
    </div>    


</div>




  
  <?php GetFooterWithNav("PollAddEdit.js"); ?>
