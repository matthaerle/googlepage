angular.module("myApp", []).
controller("myCtrl", function($scope,$http) {
    $scope.portfolio = null;
    $http({method: 'GET', url: '/db/data/portfolio.json'}).
    then(function(data) {
        $scope.portfolio=data.data;
    });
    $scope.about_me = null;
    $http({method: 'GET', url: '/db/data/about_me.json'}).
    then(function (value) {
        $scope.about_me=value.data;
    })
});
