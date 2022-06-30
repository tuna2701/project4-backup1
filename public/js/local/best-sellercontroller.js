var app = angular.module('myapp', ['angularUtils.directives.dirPagination']); //tao 1 module
// var app = angular.module('myapp', []); //tao 1 module

// app.config(function(paginationTemplateProvider) {
//     paginationTemplateProvider.setPath('../pagination/customTemplate.html');
// });

app.controller('homecontroller', function($scope, $http) { //tao 1 controller
    $scope.timkiem = "";
    $scope.pageSize = 6;

    $scope.sortReverse = true;

    $http({
        method: "GET",
        url: "http://localhost:8000/api/books/get/get-book-topseller"
    }).then(function(response) {
        console.log(response.data);
        $scope.books3 = response.data;
    });

    $scope.filter = function() {
        // alert($scope.cat_selected + "/" + $scope.reverse)
        if($scope.sortReverse = true) {
            $scope.sortReverse = false;
        } else {
            $scope.sortReverse = true;
        }
        // if($scope.cat_selected == 0 && $scope.pub_selected == 0){
        //     $http({
        //         method: "GET",
        //         url: "http://localhost:8000/api/books/new/get-new"
        //     }).then(function(response) {
        //         $scope.new_book = response.data;
        //     });
        // } else {
        //     $http({
        //         method: "GET",
        //         url: "http://localhost:8000/api/books/new/get-new-book-filter/" + $scope.cat_selected + "&" + $scope.pub_selected
        //     }).then(function(response) {
        //         $scope.new_book = response.data;
        //     });
        // }
        
    }

    $http({
        method: "GET",
        url: "http://localhost:8000/api/categories"
    }).then(function(response) {
        $scope.categories = response.data;
    });
    
    $http({
        method: "GET",
        url: "http://localhost:8000/api/publishers"
    }).then(function(response) {
        $scope.publishers = response.data;
    });

    $scope.addToCart = function(id) {
        $http({
            method: "GET",
            url: "http://localhost:8000/add-to-cart/" + id
        }).then(function(response) {
            alert('Thêm sản phẩm vào giỏ hàng');
        }, function() {
            // alert('error');
            alert('Thêm sản phẩm vào giỏ hàng');

        });
    }
    
});