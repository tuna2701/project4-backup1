var app = angular.module('myapp', []); //tao 1 module

app.controller('maincontroller', function($scope, $http, $compile) { //tao 1 controller
    if(!sessionStorage.getItem('customer_login')){
        $scope.login = " Đăng nhập /";
        // alert(sessionStorage.getItem('customer_login'));
    } else {
        $scope.login = sessionStorage.getItem('customer_login') + " /";
        // alert(sessionStorage.getItem('customer_login'));
    }
});