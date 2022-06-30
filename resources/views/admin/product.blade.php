@extends('_layout_admin')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="/assets/admin/css/style.css"> -->
    <title>Title</title>
</head>

<body>
    <main style="max-height: 500px; overflow-y:scroll" ng-controller="bookcontroller">
        <div class="container-fluid px-4">
            <h2 class="mt-2">PRODUCT</h2>


            <!-- <table id="datatablesSimple" class="table table-hover table-border"> -->

            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Author</th>
                        <th>Disc Price</th>
                        <th>Publisher</th>
                        <th>Edition</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <div class="row">
                        <div class="col-4 mb-3">
                            <span class="label">Tìm kiếm: </span>

                            <input type="text" class="form-control" ng-model="timkiem">
                        </div>
                        <div class="col-2">
                            <span class="label">Số dòng: </span>
                            <input type="number" min="1" max="100" class="form-control" ng-model="pageSize">
                        </div>
                        <div class="col-6 mt-4">
                            <p align="right">
                                <button class="btn btn-primary" ng-click="showmodal(0)">
                                    <i class="fa fa-plus"></i>
                                    Thêm
                                </button>
                            </p>
                        </div>
                    </div>
                    <tr dir-paginate="sp in books|filter: {name: timkiem}|itemsPerPage: pageSize">
                        <td style="width:10px">@{{$index+1}}</td>
                        <td style="width:250px">@{{sp.name}}</td>
                        <td><img src="/upload/book/@{{sp.image}}" style='width:100px' alt=""></td>
                        <td>@{{sp.author}}</td>
                        <td align="right" style="width:100px">@{{sp.disc_price |number:0}}</td>
                        <td style="width:100px">@{{sp.publisher.name}}</td>
                        <td align="right" style="width:100px">@{{sp.edition}}</td>
                        <td><button class="btn btn-info" ng-click="showmodal(sp.id)"><i
                                    class="fa-solid fa-pencil"></i></button></td>
                        <td><button class="btn btn-danger" ng-click="deleteClick(sp.id)"><i
                                    class="fa fa-trash"></i></button></td>
                    </tr>
            </table>
            <div style="display: flex; justify-content: center; ">
                <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true"
                    on-page-change='indexCount(newPageNumber)'>
                </dir-pagination-controls>
            </div>

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
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="name">Tên:</label>
                                            <div>
                                                <input type="text" class="form-control" ng-model="book.name">
                                            </div>

                                        </div>

                                        <div class="col-6">
                                            <label for="name">Mã loại:</label>
                                            <div>
                                                <select class="form-control" ng-change="unitChanged()"
                                                    ng-model="category_id" >
                                                    <option  ng-repeat="cat in categories"
                                                        ng-value="cat.id">@{{cat.name}}</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-6">
                                            <label for="name">Author:</label>
                                            <div>
                                                <input type="text" class="form-control" ng-model="book.author">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label for="name">Translator:</label>
                                            <div>
                                                <input type="text" class="form-control" ng-model="book.translator">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label for="name">Giá bán:</label>
                                            <div>
                                                <input type="text" class="form-control" ng-model="book.unit_price">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="name">Giá khuyến mại:</label>
                                            <div>
                                                <input type="text" class="form-control" ng-model="book.disc_price">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="name">Quantity:</label>
                                            <div>
                                                <input type="number" class="form-control" ng-model="book.qty">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label for="name">Nhà xuất bản:</label>
                                            <div>
                                                <select class="form-control" ng-change="unitChanged()"
                                                    ng-model="publisher">
                                                    <option  ng-repeat="p in publishers"
                                                        ng-value="p.id">@{{p.name}}</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <label for="name">Page:</label>
                                            <div>
                                                <input type="text" class="form-control" ng-model="book.page">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="name">Edition:</label>
                                            <div>
                                                <input type="text" class="form-control" ng-model="book.edition">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="name">Format:</label>
                                            <div>
                                                <input type="text" class="form-control" ng-model="book.format">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="name">Weight:</label>
                                            <div>
                                                <input type="text" class="form-control" ng-model="book.weight">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="name">New:</label>
                                            <div>
                                                <input type="text" class="form-control" ng-model="book.new_flag">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">Image:</label>
                                                <div class="custom-file mb-3">
                                                    <input type="file" class="custom-file-input" id="customFile"
                                                        name="filename" ng-model="product.image">
                                                    <label class="custom-file-label" id='img'
                                                        for="customFile">@{{book.image}}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="name">Desc:</label>
                                            <textarea class="form-control" id="description" name="description"
                                                ng-model="book.desc" rows="5"></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" ng-click="saveData()" value="Save">
                                </div>
                            </div>
                    </div>
                </div>
            </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="/js/angular.min.js"></script>
    <script src="/js/bookcontroller.js"></script>
    <script src="/js/dirPagination.js"></script>
    <script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
    });
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>
</body>

</html>


@stop