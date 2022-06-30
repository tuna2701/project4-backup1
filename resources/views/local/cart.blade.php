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
    <div class="container" ng-controller="cartcontroller">
        <article class="card">
            <div class="card-body">
                <div class="track">
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"><a style="text-decoration: none; color: #000" href="/gio-hang">Giỏ hàng</a></span> </div>
                    <!-- @*<div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> </span> </div>*@ -->
                    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Vận chuyển và thanh toán </span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Xác nhận</span> </div>
                </div>
            </div>
            <!-- @*<div class="cart-title">Shopping Cart</div>*@ -->
            <ul class="shopping-cart">
                <li class="card-list">
                    <div style="margin:30px 20px; color: #000;"><h4><b>Shopping Cart</b><button type="button" onclick="window.location.href='/'" style="float:right" class="btn btn-primary">Tiếp tục mua hàng</button></h4></div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th></th>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $index = 1;
                                $total = 0;
                            @endphp
                            @if($carts != null)         
                                @foreach($carts as $cartItem)
                                    @php
                                        $total += $cartItem['price'] * $cartItem['qty'];
                                    @endphp
                                <tr>
                                    <td style="text-align:center; padding-top:40px">{{$index++}}</td>
                                    <td style="width: 100px; height: 100px"><img style="width: 90px; height: 100px" src="upload/book/{{$cartItem['image']}}" /></td>
                                    <td>
                                        <h4 style="margin-top: 20px"><label>{{$cartItem['name']}}</label></h4>
                                    </td>
                                    <td>
                                        <h4 style="color:#F78027; padding-top: 32px" class="product-price" id="price"><label>{{number_format($cartItem['price'])}}đ</label></h4> 
                                    </td>
                                    <td style="padding-top: 45px"><input style="width: 50px" type="number" id="n" value="{{$cartItem['qty']}}"/></td>
                                    <td>
                                        <h4 style="color:#F78027; padding-top: 32px" class="product-price"><label id="total">{{number_format($cartItem['price'] * $cartItem['qty'])}}đ</label></h4> 
                                    </td>
                                    <td><i style="text-align:center; font-size: 20px; padding-top:40px" class="far fa-trash-alt" ng-click="deleteFromCart({{$cartItem['id']}})"></i></td>
                                </tr>
                                @endforeach         
                            @else
                                <tr>
                                    <td>Chưa có sản phẩm</td>
                                </tr>        
                            @endif
                            

            
                        </tbody>
                    </table>
                </li>
                <li class="card-details">
                    <div style="margin:40px 20px"><h3><b>Tổng đơn hàng</b></h3></div>

                    <h4 class="col-md-12">Tổng tiền: <span style="float:right" id="total1">{{number_format($total)}}đ</span></h4>
                    <h4 class="col-md-12">Phí vận chuyển: <span style="float:right">35,000đ</span></h4>
                    <h4 class="col-md-12">Khuyến mại: <span style="float:right">0đ</span></h4>
                    <div class="form-group col-md-12">
                        <label for="discount" style="margin-top:10px">Mã khuyến mại</label>
                        <input type="text" class="form-control" id="discount">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="col-md-12" style="text-align:center; margin-bottom:10px">Phương thức thanh toán</label>
                        <div class="col-md-4"><img src="/assets/local/img/installment.svg" alt="Installment"></div>
                        <div class="col-md-4"><img src="/assets/local/img/jcb.svg" alt="SHB"></div>
                        <div class="col-md-4"><img src="/assets/local/img/mastercard.svg" alt="Mastercard"></div>
                        <div class="col-md-4"><img src="/assets/local/img/visa.svg" alt="VISA"></div>
                        <div class="col-md-4"><img src="/assets/local/img/internet-banking.svg" alt="Internet Banking"></div>
                        <div class="col-md-4"><img src="/assets/local/img/cash.svg" alt="Cash"></div>
                    </div>
                    <button type="button" class="btn btn-primary col-md-11 btn-checkout" 
                        ng-click="checkOut()">Checkout</button>
                </li>
            </ul>

        </article>
    </div>	
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $("#n").bind('keyup mouseup', function () {
                // alert($(this).$("#n").val());            
                // alert(parseFloat($("#price").text().slice(0, -1)));  
                $("#total").text((parseFloat($("#price").text().slice(0, -1)) * $("#n").val())+",000đ");          
                $("#total1").text((parseFloat($("#price").text().slice(0, -1)) * $("#n").val())+",000đ");          
            });
    </script>
    <script src="/js/angular.min.js"></script>
    <script src="/js/dirPagination.js"></script>
    <script src="/js/cartcontroller.js"></script>
</body>
</html>