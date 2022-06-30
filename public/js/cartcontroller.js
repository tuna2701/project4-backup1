var app = angular.module('myapp', []); //tao 1 module
app.controller('cartcontroller', function($scope, $http) { //tao 1 controller

    // $scope.carts = sessionStorage.getItem('cart');
    // console.log($scope.carts);

    $scope.deleteFromCart = function(id) {
        $http({
            method: "Get",
            url: "http://127.0.0.1:8000/delete-from-cart/" + id
        }).then(function(response) {
            alert('Xoá sản phẩm thành công');
            location.reload();
        }, function() {
            alert('error');
        });
    }

    $scope.checkOut = function(){
        // sessionStorage.removeItem('customer_login');
        if(!sessionStorage.getItem('customer')) {
            alert('Bạn cần đăng nhập trước khi thực hiện thanh toán');
            sessionStorage.setItem('path_login', '/thanh-toan');
            window.location.href = '/login';
        } else {
            window.location.href = '/thanh-toan';
        }
        // $http({
        //     method: "POST",
        //     url: "http://localhost:8000/api/orders",
        //     data: $scope.order,
        //     "content-Type": "application/json"
        // }).then(function(response) {
        //     $scope.message = response.data;
        //     console.log(response.data);
        //     location.reload();

        // });
    }
});