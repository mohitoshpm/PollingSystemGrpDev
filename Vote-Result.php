
<?php
include_once("./framework/function.php");

include_once("./framework/pollAddEditFunction.php");


GetHeaderWithNav("Vote Result");

$errorMessage="";
$isError=false;
$isSave=false;

$id=0;
if(isset($_GET['id']) && $_GET['id']>0){
  $id=$_GET['id'];

}



?>

<div ng-controller="PollAddEditCtrl"   ng-init="Init()" >


<div class="row">
  
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 10px;">
    <div class="border-box">
      <h2>Vote Result</h2>
    </div>
  </div>
  
</div>


<div ng-show="HasError" class="alert alert-danger">
            <strong>Error!</strong> {{ErrorMsg}}
</div>

<div ng-show="IsDataSave" class="alert alert-success">
            <strong>Message:</strong> Successfully Save Data.
</div>

<div class="row">  
   
   <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
     <div class="border-box">
       <h4 style="text-align: center; font-weight: 500;">Poll List
        <button type="button" style="float: right;" ng-click="GetVoteResult()" class="btn btn-xs btn-primary">Refresh</button>
      </h4>
       
       
       
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
              
              <button type="button" ng-click="EditPoll(row)" class="btn btn-xs btn-info">Select</button>
              
            </td>
          </tr>
        </tbody>
      </table>
     </div>
   </div>
   
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="padding-bottom: 20px; border-radius: 5px;">     
      <div class="border-box">

        <h4 style="text-align: center; font-weight: 500;">Selected Poll</h4>
        
        <div style="font-weight: bold;">
           {{SelectedPoll.Name}}
        </div>
           <div>
           <table class=" table table-bordered">
             <thead>
               <tr>
                 <th>Option</th>
                 <th>Person</th>
               </tr>
             </thead>
             <tbody>
               <tr ng-repeat="row in SelectedPoll.OptionList">
                  <td >
                  {{row.Name}}
                  </td>
                  <td style="text-align: center; width: 50px;" >
                  {{row.PollCount}}
                  </td>
               </tr>
             </tbody>
           </table>
           
           </div>
      </div>
          

      </div>    
    </div>    


</div>




  
  <?php GetFooterWithNav("Vote-Result.js"); ?>
