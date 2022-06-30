var app = angular.module('myapp', ['angularUtils.directives.dirPagination']); //tao 1 module
// var app = angular.module('myapp', []); //tao 1 module

// app.config(function(paginationTemplateProvider) {
//     paginationTemplateProvider.setPath('../pagination/customTemplate.html');
// });

app.controller('homecontroller', function($scope, $http) { //tao 1 controller
    $scope.timkiem = "";
    $scope.pageSize = 6;

    $scope.sortReverse = true;

    $scope.searchText = sessionStorage.getItem('searchText');

    $http({
        method: "GET",
        url: "http://localhost:8000/api/books/get/get-book-search/" + $scope.searchText
    }).then(function(response) {
        $scope.books = response.data;
    });

    $http({
        method: "GET",
        url: "http://localhost:8000/api/categories/cat/get-6-count"
    }).then(function(response) {
        $scope.categories2 = response.data;
    });

    $scope.filter = function() {
        alert( $scope.sortReverse)
        if($scope.sortReverse = true) {
            $scope.sortReverse = false;
        } else {
            $scope.sortReverse = true;
        }
        
    }

    
    $scope.addToCart = function(id) {
        $http({
            method: "Get",
            url: "http://127.0.0.1:8000/add-to-cart/" + id
        }).then(function(response) {
            alert('Thêm sản phẩm vào giỏ hàng');
        }, function() {
            alert('error');
        });
    }
    
});