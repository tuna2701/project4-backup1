var app = angular.module('myapp', []); //tao 1 module
app.controller('customercontroller', function($scope, $http) { //tao 1 controller
    $scope.timkiem = "";
    
    $http({
        method: "GET",
        url: "http://localhost:8000/api/customers"
    }).then(function(response) {
        $scope.customers = response.data;
    });
    $scope.showmodal = function(id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Add new customer";
            $scope.customer = null;
        } else {
            $scope.modalTitle = "Edit customer";
            $http({
                method: "GET",
                url: "http://localhost:8000/api/customers/" + id
            }).then(function(response) {
                $scope.customer = response.data;
            });
        }
        $('#modelId').modal('show');
    }
    
    $scope.delete = function(id) {
        
        $http({
            method: "DELETE",
            url: "http://localhost:8000/api/customers/" + id
        }).then(function(response) {
            let index = $scope.customers.map(function(e){
                return e.id;
            }).indexOf(id);
            $scope.customers.splice(index, 1);
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
                url: "http://localhost:8000/api/customers",
                data: $scope.customer,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.new_id = response.data.id;
                $scope.customer.created_at = new Date();
                alert('Đã thêm loại mới!');
                $scope.customers.push($scope.customer);

            });
        } else { //sua san pham
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/customers/" + $scope.id,
                data: $scope.customer,
                "content-Type": "application/json"
            }).then(function(response) {
                alert('Đã sửa!');
                let index = $scope.customers.map(function(e){
                    return e.id;
                }).indexOf($scope.id);
                $scope.customers.splice(index, 1, $scope.customer);
            });
        }
        $('#modelId').modal('hide');

    }
});