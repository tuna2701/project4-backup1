var app = angular.module('myapp', []); //tao 1 module
app.controller('checkoutcontroller', function($scope, $http) { //tao 1 controller
    if(!sessionStorage.getItem('customer')){
        $scope.customer_info = null;
    } else {
        $scope.customer_info = JSON.parse(sessionStorage.getItem('customer'));

    }

    // $scope.order = JSON.parse(sessionStorage.getItem('orderDetail'));
    
    $scope.getTotal = function(){
        var total = 0;
        for(var i = 0; i < $scope.order.length; i++){
            var product = $scope.order[i];
            total += (product.price * product.qty);
        }
        $scope.total = total;
        return total;
    }

    $scope.addhang={
        // "id": 1,
        // "date_order": "",
        "tong_tien": "",
        "address":"",
        "id_kh":"",
        "bill_detail":[ ]
    }

    $scope.checkOut1 = function() {
        if(!sessionStorage.getItem('customer')) {
            alert('Bạn cần đăng nhập trước khi thực hiện thanh toán');
            sessionStorage.setItem('path_login', '/thanh-toan');
            window.location.href = '/login';
        } else {
            alert('Đặt hàng thành công');
            $scope.addhang.address=$scope.customer_info.address;
            $scope.addhang.total=$scope.total;
            $scope.addhang.id_kh=$scope.customer_info.id;
            // angular.forEach($scope.order, function(value, key){
            //     let CTDH={
            //         "id_sp":"",
            //         "qty":"",
            //         "thanh_tien":"",
            //     }
            //     // $scope.CTDH.MaCTDH=Math.floor(Date.now() * Math.random());
            //     CTDH.id_sp=value.id;
            //     CTDH.qty=value.qty;
            //     CTDH.thanh_tien=value.price * value.qty;
            //     $scope.addhang.bill_detail.push(CTDH);
            // })
            $scope.order.forEach(item=>{
                let CTDH={
                    "id_sp":"",
                    "qty":"",
                    "thanh_tien":"",
                }
                // $scope.CTDH.MaCTDH=Math.floor(Date.now() * Math.random());
                CTDH.id_sp=item.id;
                CTDH.qty=item.qty;
                CTDH.thanh_tien=item.thanh_tien;
                $scope.addhang.bill_detail.push(CTDH);
            })
            $http({
                method: "POST",
                url: "http://localhost:8000/api/orders",
                data: $scope.addhang
            }).then(function (response) {
                console.log(response.data);
                alert("Đơn hàng của bạn đã được lưu!");
                // document.location.href="/clien/trangchus";
            }, function(){
                alert('error');
            });
            window.location.href = '/';
        }
    }

    $scope.checkOut = function() {
        if(!sessionStorage.getItem('customer')) {
            alert('Bạn cần đăng nhập trước khi thực hiện thanh toán');
            sessionStorage.setItem('path_login', '/thanh-toan');
            window.location.href = '/login';
        } else {
            alert('Đặt hàng thành công');
            window.location.href = '/';
        }
    }
});