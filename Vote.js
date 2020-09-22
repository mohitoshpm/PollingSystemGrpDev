
pollingApp.controller('PollAddEditCtrl', function ($scope, $http,$filter) {

$scope.ErrorMsg = false;
$scope.HasError ="";
$scope.IsDataSave=false;
$scope.HasViewPermission = false;

$scope.SelectedPoll=[];


$scope.MessageClear = function(){
    $scope.ErrorMsg = false;
    $scope.HasError ="";
    $scope.IsDataSave=false;
}

$scope.SaveVoteById = function() {
    $scope.MessageClear();
    var selectedOption = $filter('filter')($scope.SelectedPoll.OptionList, {IsSelected: true })[0];
    if(selectedOption==undefined){
        return;
    }
    $http({
        
        method: 'GET',
        url: './api/vote/SaveVoteById.php?pollId='+$scope.SelectedPoll.Id+"&optionId="+selectedOption.Id
        
    }).then(function (response) {
        $scope.result = response.data;
        if(!$scope.result.hasError){
             // on success

             $scope.IsDataSave=true;

        }else{
            $scope.HasError= $scope.result.hasError;
            $scope.ErrorMsg= $scope.result.error;
        }
        
    }, function (response) {
        
        // on error
        console.log(response.data,response.status);
        
    });
};




$scope.GetActivePollList = function() {
    $scope.MessageClear();
    
    $http({
        
        method: 'GET',
        url: './api/vote/GetActivePollList.php'
        
    }).then(function (response) {
        
        // on success
        $scope.result = response.data;
        $scope.pollList= $scope.result.data;
        console.log($scope.pollList);
        
    }, function (response) {
        
        // on error
        console.log(response.data,response.status);
        
    });
};

$scope.EditPoll = function(row) {
    $scope.SelectedPoll=row;
    $scope.MessageClear();
};





$scope.Init = function ()
{
    $scope.GetActivePollList();

};

});
