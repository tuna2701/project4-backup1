<?php session_start()?>
<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="/assets/local/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/local/css/cart.css" rel="stylesheet" />
</head>
<body ng-app="myapp">
    <div class="container" ng-controller="checkoutcontroller">
        <article class="card">
            <div class="card-body">
                <div class="track">
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"><a style="text-decoration: none; color: #000" href="/gio-hang">Giỏ hàng</a></span> </div>
                    <!-- @*<div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> </span> </div>*@ -->
                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Vận chuyển và thanh toán </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Xác nhận</span> </div>
                </div>
            </div>
            <!-- @*<div class="cart-title">Shopping Cart</div>*@ -->
            <ul class="shopping-cart" >
                <li class="card-address-details" style="width:47%">
                    <div style="margin:30px 20px"><h3><b>Thông tin thanh toán</b></h3></div>
                    <form>
                        <div class="form-group col-md-12">
                            <label for="inputAddress">Họ và tên</label>
                            <input type="text" class="form-control" id="inputAddress" ng-model="customer_info.name" placeholder="Nhập họ và tên">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress">Số điện thoại</label>
                            <input type="text" class="form-control" id="inputAddress" ng-model="customer_info.phone" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress2">Địa chỉ email</label>
                            <input type="text" class="form-control" id="inputAddress2" ng-model="customer_info.email" placeholder="Nhập email của bạn">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputAddress">Địa chỉ</label>
                            <input type="text" class="form-control" id="inputAddress" ng-model="customer_info.address" placeholder="Ví dụ: Đội 4, Thôn Đạo Khê,...">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="inputAddress">Ghi chú đơn hàng</label>
                            <textarea class="form-control" id="" rows="3" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn."></textarea>
                        </div>
                    </form>
                </li>
                <li class="card-list" style="width:45%; overflow-y: scroll;">
                    <div style="margin:30px 20px; color: #000;">
                        <h4>
                            <b>Đơn hàng của bạn</b> 
                            <button type="button" onclick="window.location.href='/'" style="float:right" class="btn btn-primary">Tiếp tục mua hàng</button>
                        </h4>
                    </div>
                    <table class="table table-bordered" style="font-size:18px;">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Tạm tính</th>
                            </tr>
                        </thead>
                        <tbody >
                            @php
                                $carts = session()->get('cart');
                                $total = 0;
                                $delivery = 35000;
                            @endphp
                            @if($carts != null)  
                                
                                @foreach($carts as $cartItem)
                                    @php
                                        $total += $cartItem['price'] * $cartItem['qty'];
                                    @endphp
                                    <tr>
                                        <td>{{$cartItem['name']}} <b>x {{$cartItem['qty']}}</b></td>
                                        <td align="right" style="color:#F86F53">{{number_format($cartItem['price'] * $cartItem['qty'])}}đ</td>
                                    </tr>
                                @endforeach
                            @else
                                <!-- <tr>
                                    <td>Chưa có sản phẩm</td>
                                </tr>         -->
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Thành tiền</th>
                                <th style="color:#F86F53; text-align:right;">{{number_format($total)}}đ</th>
                            </tr>
                            <tr>
                                <th>Phí vận chuyển</th>
                                <th style="color:#F86F53; text-align:right;">{{number_format($delivery)}}đ</th>
                            </tr>
                            <tr>
                                <th>Tổng</th>
                                <th style="color:#F86F53; text-align:right;">{{number_format($total + $delivery)}}đ</th>
                            </tr>
                        </tfoot>
                    </table>

                    <button type="button" class="btn btn-danger" ng-click="checkOut()" style="width: 100%; font-size: 20px">Đặt hàng</button>
                </li>
                
                
            </ul>

        </article>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/js/angular.min.js"></script>
    <script src="/js/dirPagination.js"></script>
    <script src="/js/checkoutcontroller.js"></script>
</body>
</html>