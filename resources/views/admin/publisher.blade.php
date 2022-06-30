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
    <main style="max-height: 500px; overflow-y:scroll" ng-controller="publishercontroller">
        <div class="container-fluid px-4">
            <h2 class="mt-2">Nhà cung cấp</h2>
            


            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
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
                        <!-- <div class="col-2">
                            <span class="label">Số dòng: </span>
                            <input type="number" min="1" max="100" class="form-control" ng-model="pageSize">
                        </div> -->
                        <div class="col-8 mt-4">
                            <p align="right">
                                <button class="btn btn-primary" ng-click="showmodal(0)">
                                    <i class="fa fa-plus"></i>
                                    Thêm
                                </button>
                            </p>
                        </div>
                    </div>
                    <tr ng-repeat="sp in publishers|filter: {name:timkiem}">
                        <td style="width:10px">@{{$index+1}}</td>
                        <td style="width:200px">@{{sp.name}}</td>
                        <td>@{{sp.phone}}</td>
                        <td>@{{sp.email}}</td>
                        <td>@{{sp.address}}</td>
                        <td><button class="btn btn-info" ng-click="showmodal(sp.id)"><i
                                    class="fa-solid fa-pencil"></i></button></td>
                        <td><button class="btn btn-danger" ng-click="deleteClick(sp.id)"><i
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
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="name">Name:</label>
                                            <div>
                                                <input type="text" class="form-control" ng-model="publisher.name" placeholder="VD: Kim đồng">
                                            </div>

                                        </div>

                                        <div class="col-6">
                                            <label for="name">Phone:</label>
                                            <div>
                                                <input type="text" class="form-control" ng-model="publisher.phone">
                                            </div>

                                        </div>

                                        <div class="col-6">
                                            <label for="name">Email:</label>
                                            <div>
                                                <input type="text" class="form-control" ng-model="publisher.email">
                                            </div>

                                        </div>
                                        <div class="col-12">
                                            <label for="name">Address:</label>
                                            <!-- <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script> -->
                                            <textarea class="form-control" id="description" name="description"
                                                ng-model="publisher.address" rows="5"></textarea>
                                            <!-- <script>
                                        CKEDITOR.replace('description');
                                        </script> -->
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
    <script src="/js/angular.min.js"></script>
    <script src="/js/publishercontroller.js"></script>
</body>

</html>


@stop