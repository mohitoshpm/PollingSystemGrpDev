
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


$scope.GetVoteResult = function() {
    $scope.MessageClear();
    
    $http({
        
        method: 'GET',
        url: './api/vote/GetVoteResult.php'
        
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
    $scope.GetVoteResult();

};

});
