@extends('_layout_admin')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Title</title>
</head>

<body>
    <main style="max-height: 500px; overflow-y:scroll" ng-controller="ordercontroller">
        <div class="container-fluid px-4">
            <h2 class="mt-2">Đơn hàng</h2>

            <table class="table table-hover table-bordered">
                <thead>
                    <tr align="center">
                        <th>No.</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Ngày đặt</th>
                        <th>Email</th>
                        <th>Trạng thái</th>
                        <th>Chi tiết</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <div class="row">
                        <!-- <div class="col-4 mb-3">
                            <span class="label">Tìm kiếm: </span>

                            <input type="text" class="form-control" ng-model="timkiem">
                        </div> -->
                        <!-- <div class="col-2">
                            <span class="label">Số dòng: </span>
                            <input type="number" min="1" max="100" class="form-control" ng-model="pageSize">
                        </div> -->
                        <div class="col-12 mt-4">
                            <p align="right">
                                <button ng-click="showSuccessToast()" class="btn btn-success">
                                    <i class="fa fa-save"></i>
                                    Lưu
                                </button>
                            </p>
                        </div>
                    </div>
                    <tr ng-repeat="sp in orders">
                        <td style="width:10px" align="center">@{{$index+1}}</td>
                        <td style="width:200px">@{{sp.customers.name}}</td>
                        <td>@{{sp.address}}</td>
                        <td>@{{sp.date_order | date: 'MM-dd-yyyy h:mm a'}}</td>
                        <td>@{{sp.customers.email}}</td>
                        <td>
                            <select name="status" ng-model="sp.status"  ng-change="switchStatus(sp.id)" class="form-control input-inline" style="width: 120px; margin: 0 10px">
                                <option value="@{{sp.status}}">@{{sp.status}}</option>
                                <option value="Chưa giao">Chưa giao</option>
                                <option value="Đang giao">Đang giao</option>
                                <option value="Đã giao">Đã giao</option>
                                <option value="Huỷ">Huỷ</option>
                            </select>
                        </td>
                        <td align="center"><button class="btn btn-info" ng-click="showmodal(sp.id_kh, sp.id)"><i
                                    class="fa-solid fa-eye"></i></button></td>
                        <td align="center"><button class="btn btn-danger" ng-click="deleteClick(sp.id)"><i
                                    class="fa fa-trash"></i></button></td>
                    </tr>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">@{{modalTitle}}</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                            @csrf
                            <div class="modal-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="col-md-4">Thông tin khách hàng</th>
                                        <th class="col-md-6"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Thông tin người đặt hàng</td>
                                        <td>@{{order.customerInfo.name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Ngày đặt hàng</td>
                                        <td>@{{order.customerInfo.date_order | date: 'MM-dd-yyyy h:mm a'}}</td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại</td>
                                        <td>@{{order.customerInfo.phone}}</td>
                                    </tr>
                                    <tr>
                                        <td>Địa chỉ</td>
                                        <td>@{{order.customerInfo.address}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>@{{order.customerInfo.email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Ghi chú</td>
                                        <td>@{{order.customerInfo.order_note}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting col-md-1" >STT</th>
                                        <th class="sorting_asc col-md-4">Tên sản phẩm</th>
                                        <th class="sorting col-md-2">Số lượng</th>
                                        <th class="sorting col-md-2">Giá tiền</th>
                                        <th class="sorting col-md-2">Thành tiền</th>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="sp in order.orderInfo">
                                            <td>@{{$index+1}}</td>
                                            <td>@{{sp.product_name}}</td>
                                            <td>@{{sp.qty}}</td>
                                            <td>@{{sp.price}}</td>
                                            <td>@{{sp.thanh_tien | number:0}}</td>
                                        </tr>
                                    <tr>
                                        <td colspan="4"><b>Tổng tiền</b></td>
                                        <!-- <td colspan="1"><b class="text-red" style="color:red">@{{order.customerInfo.order_total | number:0}}</b></td> -->
                                        <td colspan="1"><b class="text-red" style="color:red">@{{ getTotal() | number:0}}</b></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="col-12 form-inline" >
                                    <label>Trạng thái giao hàng: </label>
                                    <select name="status" ng-model="status" class="form-control input-inline" style="width: 200px; margin: 0 10px">
                                        <option value="@{{order.customerInfo.order_status}}" selected>@{{order.customerInfo.order_status}}</option>
                                        <option value="Chưa giao">Chưa giao</option>
                                        <option value="Đang giao">Đang giao</option>
                                        <option value="Đã giao">Đã giao</option>
                                        <option value="Huỷ">Huỷ</option>
                                    </select>

                                    <!-- <input type="submit" value="Xử lý" class="btn btn-primary"> -->
                                    
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" ng-click="saveData()">Xử lý</button>
                                    <input type="submit" class="btn btn-primary" ng-click="invoiceShow()" value="In hoá đơn">
                                </div>
                            </div>
                    </div>
                </div>
            </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM

    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.3/angular.min.js" integrity="sha512-KZmyTq3PLx9EZl0RHShHQuXtrvdJ+m35tuOiwlcZfs/rE7NZv29ygNA8SFCkMXTnYZQK2OX0Gm2qKGfvWEtRXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <scrpit src="/js/angular.min.js"></scrpit> -->
    <script src="/js/ordercontroller.js"></script>
</body>

</html>


@stop