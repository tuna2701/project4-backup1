var app = angular.module('myapp', []); //tao 1 module
app.controller('publishercontroller', function($scope, $http) { //tao 1 controller
    $scope.timkiem = "";
    
    $http({
        method: "GET",
        url: "http://localhost:8000/api/publishers"
    }).then(function(response) {
        $scope.publishers = response.data;
    });
    $scope.showmodal = function(id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Add new publisher";
            $scope.publisher = null;
        } else {
            $scope.modalTitle = "Edit publisher";
            $http({
                method: "GET",
                url: "http://localhost:8000/api/publishers/" + id
            }).then(function(response) {
                $scope.publisher = response.data;
            });
        }
        $('#modelId').modal('show');
    }

    $scope.delete = function(id) {
        
        $http({
            method: "DELETE",
            url: "http://localhost:8000/api/publishers/" + id
        }).then(function(response) {
            let index = $scope.publishers.map(function(e){
                return e.id;
            }).indexOf(id);
            $scope.publishers.splice(index, 1);
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
                url: "http://localhost:8000/api/publishers",
                data: $scope.publisher,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.new_id = response.data.id;
                $scope.publisher.created_at = new Date();
                alert('Đã thêm loại mới!');
                $scope.publishers.push($scope.publisher);
            });
        } else { //sua san pham
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/publishers/" + $scope.id,
                data: $scope.publisher,
                "content-Type": "application/json"
            }).then(function(response) {
                alert('Đã sửa!');
                let index = $scope.publishers.map(function(e){
                    return e.id;
                }).indexOf($scope.id);
                $scope.publishers.splice(index, 1, $scope.publisher);
            });
        }
        $('#modelId').modal('hide');

    }
});