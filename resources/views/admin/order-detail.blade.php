<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
    
</head>
<body ng-app="myapp" ng-controller="orderdetailcontroller">
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
    <div class="card">
    <div class="card-header p-4">
        <a class="pt-2 d-inline-block" href="/" data-abc="true">StoreBook.com</a>
        <div class="float-right"> 
            <h3 class="mb-0">Hoá đơn #@{{order.customerInfo.order_id}}</h3>
            Ngày đặt: @{{order.customerInfo.date_order | date: 'MM-dd-yyyy h:mm a'}}
        </div>  
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h5 class="mb-3">Người gửi:</h5>
                <h3 class="text-dark mb-1">StoreBook</h3>
                <div>Trung Hưng, Yên Mỹ, Hưng Yên</div>
                <div>Email: storebook.official@gmail.com</div>
                <div>Phone: 0999.999.999</div>
            </div>
            <div class="col-sm-6 ">
                <h5 class="mb-3">Người nhận:</h5>
                <h3 class="text-dark mb-1">@{{order.customerInfo.name}}</h3>
                <div>@{{order.customerInfo.address}}</div>
                <div>Email: @{{order.customerInfo.email}}</div>
                <div>Phone: @{{order.customerInfo.phone}}</div>
            </div>
        </div>
        <div class="table-responsive-sm">
            <table class="table table-striped">
            <thead>
                <tr>
                    <th class="center">STT</th>
                    <th>Tên sản phẩm</th>
                    <th class="center">Số lượng</th>
                    <th class="right">Giá bán</th>
                    <th class="right">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="sp in order.orderInfo">
                    <td>@{{$index+1}}</td>
                    <td>@{{sp.product_name}}</td>
                    <td>@{{sp.qty}}</td>
                    <td align="right">@{{sp.price | number:0}}đ</td>
                    <td align="right">@{{sp.thanh_tien | number:0}}đ</td>
                </tr>
                <tr>
                    <td colspan="4"><b>Tạm tính</b></td>
                    <!-- <td colspan="1"><b class="text-red" style="color:red">@{{order.customerInfo.order_total | number:0}}</b></td> -->
                    <td colspan="1" align="right"><b class="text-red" style="color:red">@{{ getTotal() | number:0}}đ</b></td>
                </tr>
            </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-5">
            </div>
            <div class="col-lg-4 col-sm-5 ml-auto">
                <table class="table table-clear">
                <tbody>
                    <tr>
                        <td class="left">
                        <strong class="text-dark">Tạm tính</strong>
                        </td>
                        <td align="right" class="right">@{{ getTotal() | number:0}}đ</td>
                    </tr>
                    <tr>
                        <td class="left">
                        <strong class="text-dark">Khuyến mại (20%)</strong>
                        </td>
                        <td align="right" class="right">@{{ getDiscount() | number:0}}đ</td>
                    </tr>
                    <tr>
                        <td class="left">
                        <strong class="text-dark">VAT (10%)</strong>
                        </td>
                        <td align="right" class="right">@{{ getVAT() | number:0}}đ</td>
                    </tr>
                    <tr>
                        <td class="left">
                        <strong class="text-dark">Tổng tiền</strong>
                        </td>
                        <td align="right" class="right">
                        <strong class="text-dark">@{{ getFTotal() | number:0}}đ</strong>
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
        <div class="card-footer bg-white">
        <p class="mb-0">StoreBook.com, Trung Hưng, Yên Mỹ, Hưng Yên</p>
    </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.3/angular.min.js" integrity="sha512-KZmyTq3PLx9EZl0RHShHQuXtrvdJ+m35tuOiwlcZfs/rE7NZv29ygNA8SFCkMXTnYZQK2OX0Gm2qKGfvWEtRXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <scrpit src="/js/angular.min.js"></scrpit>
    <script src="/js/order-detailcontroller.js"></script>
</body>
</html>
