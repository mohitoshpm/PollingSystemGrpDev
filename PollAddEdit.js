
pollingApp.controller('PollAddEditCtrl', function ($scope, $http) {

$scope.ErrorMsg = "";
$scope.HasError = false;
$scope.HasViewPermission = false;

// $scope.GetPollById = function () {

//     $http.get('PollAddEdit.php?action=GetPollByIdFun').then(function(response) {
//         console.log(response.data);
//     })
    
//     // $http.get('http://localhost/wt/PollingSystemGrpDev/framework/pollAddEditFunction.php').then(function(response) {
//     //     console.log(response.data);
//     // })
// };


$scope.GetPollById = function(id) {
    console.log("Id="+id);
    $http({
        
        method: 'GET',
        url: './api/poll/GetPoll.php?id='+id
        
    }).then(function (response) {
        
        // on success
        $scope.result = response.data;
        $scope.poll= $scope.result.data;
        console.log($scope.result);
        
    }, function (response) {
        
        // on error
        console.log(response.data,response.status);
        
    });
};


$scope.GetPollListByUserId = function() {
    $http({
        
        method: 'GET',
        url: './api/poll/GetPollListByUserId.php'
        
    }).then(function (response) {
        
        // on success
        $scope.result = response.data;
        $scope.pollList= $scope.result.data;
        console.log($scope.result);
        
    }, function (response) {
        
        // on error
        console.log(response.data,response.status);
        
    });
};


$scope.Init = function ()
{
    $scope.GetPollListByUserId();

};

});
