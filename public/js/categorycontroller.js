var app = angular.module('myapp', []); //tao 1 module
app.controller('categorycontroller', function($scope, $http) { //tao 1 controller
    $scope.timkiem = "";
    
    $http({
        method: "GET",
        url: "http://localhost:8000/api/categories"
    }).then(function(response) {
        console.log(response.data);
        $scope.categories = response.data;
    });
    $scope.showmodal = function(id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Add new category";
            $scope.category = null;
        } else {
            $scope.modalTitle = "Edit category";
            $http({
                method: "GET",
                url: "http://localhost:8000/api/categories/" + id
            }).then(function(response) {
                $scope.category = response.data;
            });
        }
        $('#modelId').modal('show');
    }

    $scope.delete = function(id) {
        
        $http({
            method: "DELETE",
            url: "http://localhost:8000/api/categories/" + id
        }).then(function(response) {
            let index = $scope.categories.map(function(e){
                return e.id;
            }).indexOf(id);
            $scope.categories.splice(index, 1);
            alert('Đã xoá!');
        }, function(error) {
            alert('Lỗi hệ thống, vui lòng thử lại sau khi đã tải trang');
            location.reload();
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
        if ($scope.id == 0) { //dang them moi sp
            $http({
                method: "POST",
                url: "http://localhost:8000/api/categories",
                data: $scope.category,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.new_id = response.data.id;
                $scope.category.created_at = new Date();
                alert('Đã thêm loại mới!');
                $scope.categories.push($scope.category);
            });
        } else { //sua san pham
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/categories/" + $scope.id,
                data: $scope.category,
                "content-Type": "application/json"
            }).then(function(response) {
                alert('Đã sửa!');
                let index = $scope.categories.map(function(e){
                    return e.id;
                }).indexOf($scope.id);
                $scope.categories.splice(index, 1, $scope.category);
            });
        }
        $('#modelId').modal('hide');
    }
});