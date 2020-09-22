
pollingApp.controller('PollAddEditCtrl', function ($scope, $http) {

    $scope.ErrorMsg = false;
    $scope.HasError ="";
    $scope.IsDataSave=false;
    $scope.HasViewPermission = false;
    
    $scope.MessageClear = function(){
        $scope.ErrorMsg = false;
        $scope.HasError ="";
        $scope.IsDataSave=false;
    }

$scope.SelectedPoll=[];



$scope.GetPollById = function(id) {
    
    $http({
        
        method: 'GET',
        url: './api/poll/GetPoll.php?id='+id
        
    }).then(function (response) {
        $scope.result = response.data;
        if(!$scope.result.hasError){
          // on success
            $scope.SelectedPoll= $scope.result.data;
            $scope.SelectedPoll.OptionList.push($scope.GetNewPollOption());
          
       }else{
           $scope.HasError= $scope.result.hasError;
           $scope.ErrorMsg= $scope.result.error;
       }
        
    }, function (response) {
        
        // on error
        console.log(response.data,response.status);
        
    });
};


$scope.DeletePoll = function(id) {
    $scope.MessageClear();
    $http({
        
        method: 'GET',
        url: './api/poll/DeletePoll.php?id='+id
        
    }).then(function (response) {
        $scope.result = response.data;
        if(!$scope.result.hasError){
          // on success
          console.log($scope.result);
          $scope.GetPollListByUserId();
         
       }else{
           $scope.HasError= $scope.result.hasError;
           $scope.ErrorMsg= $scope.result.error;
       }
        
    }, function (response) {
        
        // on error
        console.log(response.data,response.status);
        
    });
};

$scope.DeletePollOption = function(id,index) {
    $scope.MessageClear();
    if(id<=0){
        $scope.SelectedPoll.OptionList.splice(index,1)
        return;
    }

    $http({
        
        method: 'GET',
        url: './api/poll/DeletePollOption.php?id='+id
        
    }).then(function (response) {
        $scope.result = response.data;
        if(!$scope.result.hasError){
          // on success
          console.log($scope.result);
          $scope.GetPollListByUserId();
         
       }else{
           $scope.HasError= $scope.result.hasError;
           $scope.ErrorMsg= $scope.result.error;
       }
        
    }, function (response) {
        
        // on error
        console.log(response.data,response.status);
        
    });
};


$scope.AddOption=function(){
    $scope.MessageClear();
    if($scope.SelectedPoll.OptionList!=undefined){
        $scope.SelectedPoll.OptionList.push($scope.GetNewPollOption());
    }
    
}

$scope.GetPollListByUserId = function() {
    $scope.MessageClear();
    $http({
        
        method: 'GET',
        url: './api/poll/GetPollListByUserId.php'
        
    }).then(function (response) {
        
        // on success
        $scope.result = response.data;
        $scope.pollList= $scope.result.data;
        
    }, function (response) {
        
        // on error
        console.log(response.data,response.status);
        
    });
};

$scope.EditPoll = function(row) {
    $scope.SelectedPoll=row;
    $scope.MessageClear();
};




$scope.SavePoll = function() {
    $scope.MessageClear();
    $http({
        
         method: 'POST',
         url:  './api/poll/SavePoll.php',
         data: $scope.SelectedPoll
         
    }).then(function (response) {// on success
      
        $scope.result = response.data;
        if(!$scope.result.hasError){
            // on success
            $scope.SelectedPoll.Id= $scope.result.data;
            $scope.GetPollListByUserId();
            $scope.IsDataSave=true;

       }else{

           $scope.HasError= $scope.result.hasError;
           $scope.ErrorMsg= $scope.result.error;
       }
      
    }, function (response) {
        
         console.log(response.data,response.status);
         
    });
};




 $scope.GetNewPollOption = function(){
     var pollOption ={
    "Id": 0,
    "PollId": 0,
    "Name": "",
    "OrderNo": 1,
    "ImageId": "null",
    "PollCount": 0
     };

     return pollOption;
  }


$scope.Init = function ()
{
    $scope.GetPollListByUserId();

};

});
