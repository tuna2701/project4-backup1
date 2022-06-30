var app = angular.module('myapp', []);
app.controller('homecontroller', function($scope, $http) {

    $scope.qty = 1;
    $http({
        method: "GET",
        url: "http://localhost:8000/api/books/detail/" + sessionStorage.getItem('detail_id')
    }).then(function(response) {
        $scope.book = response.data;
    });

    $http({
        method: "GET",
        url: "http://localhost:8000/api/books/related/" + sessionStorage.getItem('detail_id')
    }).then(function(response) {
        $scope.related = response.data;
        // sessionStorage.removeItem('detail_id');
    });

    $scope.setDetail = function(id) {
        sessionStorage.setItem('detail_id', id);
        window.location.href = "/san-pham";
    };

    $scope.plus = function() {
        $scope.qty += 1;
    }

    $scope.minus = function() {
        $scope.qty -= 1;
    }
    
    $scope.addToCart = function() {
        $http({
            method: "Get",
            url: "http://127.0.0.1:8000/add-to-cart2/" + $scope.book.id + "&" + $scope.qty
        }).then(function(response) {
            alert('Thêm sản phẩm vào giỏ hàng');
            sessionStorage.setItem('orderDetail',JSON.stringify(response.data));
        }, function() {
            alert('error');
        });
    }
    
});