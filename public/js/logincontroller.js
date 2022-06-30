
var app = angular.module('myapp', []); //tao 1 module
app.controller('logincontroller', function($scope, $http) { //tao 1 controller
    $scope.email_message = "";
    $scope.pass_message = "";

    if(!sessionStorage.getItem('path_login')) {
        $scope.path = "/";
    } else {
        $scope.path = sessionStorage.getItem('path_login');
    }

    $scope.Login = function(email, pass) {
        $http({
            method: "GET",
            url: "http://127.0.0.1:8000/api/accounts/login/" + email + "&" + pass
        }).then(function(response) {
            if(response.data != ""){
                location.href= $scope.path;
                // sessionStorage.setItem('customer_login', response.data.name);
                sessionStorage.setItem('customer', JSON.stringify(response.data));
            } else {
                alert('Tài khoản hoặc mật khẩu không chính xác!');
            }
        }, function() {
            // $scope.email_message = "Sai tài khoản";
            alert('Tài khoản hoặc mật khẩu không chính xác!');
        });
        // alert($scope.email+$scope.pass);
        // $scope.email_message = "Sai tài khoản";
    }
});