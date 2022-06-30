var app = angular.module('myapp', ['angularUtils.directives.dirPagination']); //tao 1 module
// var app = angular.module('myapp', []); //tao 1 module

// app.config(function(paginationTemplateProvider) {
//     paginationTemplateProvider.setPath('../pagination/customTemplate.html');
// });

app.controller('homecontroller', function($scope, $http) { //tao 1 controller
    $scope.timkiem = "";
    $scope.pageSize = 8;
    if(!sessionStorage.getItem('customer')){
        $scope.login_info = " Tài khoản";
    } else {
        $scope.login_info = " " +JSON.parse(sessionStorage.getItem('customer')).name;
    }

    $scope.logOut = function() {
        sessionStorage.removeItem('customer');
        $scope.login_info = " Tài khoản";
    }

    $scope.search = function() {
        if(!$scope.searchText) {
            alert('Vui lòng nhập thông tin tìm kiếm');
        } else {
            sessionStorage.setItem('searchText', $scope.searchText);
            window.location.href = '/tim-kiem';
        }
    }
    $http({
        method: "GET",
        url: "http://localhost:8000/api/books/new/get-new"
    }).then(function(response) {
        $scope.new_book = response.data;
    });

    $scope.setDetail = function(id) {
        sessionStorage.setItem('detail_id', id);
        window.location.href = "/san-pham";
    };


    $scope.filter = function() {
        if($scope.cat_selected == 0 && $scope.pub_selected == 0){
            $http({
                method: "GET",
                url: "http://localhost:8000/api/books/new/get-new"
            }).then(function(response) {
                $scope.new_book = response.data;
            });
        } else if($scope.cat_selected == 0 || $scope.pub_selected == 0){
            if($scope.cat_selected == 0) {
                $http({
                    method: "GET",
                    url: "http://localhost:8000/api/books/new/get-new-book-filter2/" + $scope.pub_selected
                }).then(function(response) {
                    $scope.new_book = response.data;
                });
            } else if($scope.pub_selected == 0){
                $http({
                    method: "GET",
                    url: "http://localhost:8000/api/books/new/get-new-book-filter1/" + $scope.cat_selected
                }).then(function(response) {
                    $scope.new_book = response.data;
                });
            }
            
        } else {
            $http({
                method: "GET",
                url: "http://localhost:8000/api/books/new/get-new-book-filter/" + $scope.cat_selected + "&" + $scope.pub_selected
            }).then(function(response) {
                $scope.new_book = response.data;
            });
        }
        
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
            method: "Get",
            url: "http://127.0.0.1:8000/add-to-cart/" + id
        }).then(function(response) {
            alert('Thêm sản phẩm vào giỏ hàng');
            // sessionStorage.setItem('orderDetail',JSON.stringify(response.data));
        }, function() {
            alert('error');
        });
    }
    
});