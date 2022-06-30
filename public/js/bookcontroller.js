var app = angular.module('myapp', ['angularUtils.directives.dirPagination']); //tao 1 module
// var app = angular.module('myapp', []); //tao 1 module

app.config(function(paginationTemplateProvider) {
    paginationTemplateProvider.setPath('../pagination/customTemplate.html');
});

app.controller('bookcontroller', function($scope, $http) { //tao 1 controller
    
    $scope.timkiem = "";
    $scope.pageSize = 6;
    $scope.serial = 1;
    $scope.indexCount = function(newPageNumber){
        $scope.serial = newPageNumber * $scope.pageSize - ($scope.pageSize - 1);
    }

    if(location.pathname == "/admin") {
        if(!sessionStorage.getItem('customer')){
            sessionStorage.setItem('path_login', location.pathname);
            location.href = "/login";
        } 
    }


    $http({
        method: "GET",
        url: "http://localhost:8000/api/books"
    }).then(function(response) {
        $scope.books = response.data;
    });

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

    

    $scope.showmodal = function(id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Add new book";
            $scope.book = null;
        } else {
            $scope.modalTitle = "Edit book";
            $http({
                method: "GET",
                url: "http://localhost:8000/api/books/" + id
            }).then(function(response) {
                $scope.book = response.data;
                $scope.category_id = $scope.book.category_id;
                $scope.publisher = $scope.book.publisher;
            });

        }
        $('#modelId').modal('show');
    }

    $scope.delete = function(id) {
        $http({
            method: "DELETE",
            url: "http://localhost:8000/api/books/" + id
        }).then(function(response) {
            let index = $scope.books.map(function(e){
                return e.id;
            }).indexOf(id);
            $scope.books.splice(index, 1);
            alert('Đã xoá!');
        });
    }

    $scope.deleteClick = function(id) {
        var hoi = confirm("Bạn có muốn xoá không?");
        if (hoi) {
            if(!id) {
                $scope.delete($scope.new_id);
            } else {
                $scope.delete(id);
            }
            
        }
    }
    $scope.saveData = function() {
        $scope.book.image = document.getElementById("img").innerHTML;
        $scope.book.category_id = $scope.category_id;
        $scope.book.publisher = $scope.publisher;
        if ($scope.id == 0) { //dang them moi sp
            
            $http({
                method: "POST",
                url: "http://localhost:8000/api/books",
                data: $scope.book,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.new_id = response.data.id;
                $scope.book.created_at = new Date();
                alert('Đã thêm!');
                $scope.books.push(response.data);
            });
        } else { //sua san pham
            
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/books/" + $scope.id,
                data: $scope.book,
                "content-Type": "application/json"
            }).then(function(response) {
                let index = $scope.books.map(function(e){
                    return e.id;
                }).indexOf($scope.id);
                // alert(index);
                $scope.books.splice(index, 1, response.data);
                alert('Đã sửa!');
            });
        }
        $('#modelId').modal('hide');

    }

    $scope.addToCart = function(id) {
        $http({
            method: "Get",
            url: "http://127.0.0.1:8000/add-to-cart/" + id
        }).then(function(response) {
            alert('Thêm sản phẩm vào giỏ hàng');
        }, function(error) {
            alert('error');
        });
    }

    
});