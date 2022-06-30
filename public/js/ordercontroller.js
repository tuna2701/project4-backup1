var app = angular.module('myapp', []); //tao 1 module
app.controller('ordercontroller', function($scope, $http) { //tao 1 controller
    $scope.timkiem = "";
    $http({
        method: "GET",
        url: "http://localhost:8000/api/orders"
    }).then(function(response) {
        $scope.orders = response.data;
    });
    $scope.showmodal = function(id, id2) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Add new order";
            $scope.order = null;
        } else {

            $scope.modalTitle = "Chi tiết đơn hàng";
            $http({
                method: "GET",
                url: "http://localhost:8000/api/orders/get/order-detail/" + id + "&" + id2
            }).then(function(response) {
                $scope.order = response.data;
                $scope.status = $scope.order.customerInfo.order_status;
                sessionStorage.setItem('order', JSON.stringify($scope.order));
            });
        }
        $('#modelId').modal('show');
    }

    $scope.invoiceShow = function() {
        window.location.href ="/chi-tiet";
    }

    $scope.delete = function(id) {
        
        $http({
            method: "DELETE",
            url: "http://localhost:8000/api/orders/" + id
        }).then(function(response) {
            let index = $scope.orders.map(function(e){
                return e.id;
            }).indexOf(id);
            $scope.orders.splice(index, 1);
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
        $scope.order.status = $scope.status;
        if ($scope.id == 0) { //dang them moi sp
            $http({
                method: "POST",
                url: "http://localhost:8000/api/orders",
                data: $scope.order,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.new_id = response.data.id;
                $scope.order.created_at = new Date();
                alert('Đã thêm loại mới!');
                $scope.orders.push($scope.order);
            });
        } else { //sua san pham
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/orders/" + $scope.id,
                data: $scope.order,
                "content-Type": "application/json"
            }).then(function(response) {
                alert('Đã cập nhật!');
                let index = $scope.orders.map(function(e){
                    return e.id;
                }).indexOf($scope.id);
                $scope.orders[index-1].status = $scope.order.status;
            });
        }
        $('#modelId').modal('hide');

    }
    
    $scope.getTotal = function(){
        var total = 0;
        if(!$scope.order){
            return 0;
        } else {
            for(var i = 0; i < $scope.order.orderInfo.length; i++){
                var product = $scope.order.orderInfo[i];
                total += (product.price * product.qty);
            }
            return total;
        }
        
    }

    $scope.checkOut =function(){
        $http({
            method: "POST",
            url: "http://localhost:8000/api/orders",
            data: $scope.order,
            "content-Type": "application/json"
        }).then(function(response) {
            $scope.message = response.data;
            console.log(response.data);
            location.reload();

        });
    }
    
});