var app = angular.module('myapp', []); //tao 1 module
app.controller('orderdetailcontroller', function($scope, $http) { //tao 1 controller

    $scope.order = JSON.parse(sessionStorage.getItem('order'));
    
    $scope.getTotal = function(){
        var total = 0;
        for(var i = 0; i < $scope.order.orderInfo.length; i++){
            var product = $scope.order.orderInfo[i];
            total += (product.price * product.qty);
        }
        // $scope.total = total;
        return total;
    }

    $scope.getDiscount = function(){
        var disc = $scope.getTotal()*0.2;
        return disc;
    }

    $scope.getVAT = function() {
        var VAT = $scope.getTotal()*0.1;
        return VAT;
    } 

    $scope.getFTotal = function() {
        var Ftotal = $scope.getTotal() + $scope.getDiscount() + $scope.getVAT();
        return Ftotal;
    }
});