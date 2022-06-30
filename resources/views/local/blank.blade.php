@extends('_layout_local')
@section('content')

    <!-- <div class="container" style="margin-top: 32px">
        <div class="col-md-8" >
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner" >
            <div class="item active">
            <img src="/upload/banner/banner1.png" alt="Los Angeles">
            </div>

            <div class="item">
            <img src="/upload/banner/banner1.png" alt="Chicago">
            </div>

            <div class="item">
            <img src="/upload/banner/banner1.png" alt="New York">
            </div>
        </div>

        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
        </div>
        <div class="col-md-4">
        <div class="carousel-inner" >
            <div style="max-heigh:40%" class="item active">
                <img src="/upload/banner/banner1.png"  class="img-fluid" alt="Los Angeles">
            </div>

            <div style="max-heigh:40%; margin-top:5%" class="item active">
                <img src="/upload/banner/banner1.png" class="d-block w-100" alt="Chicago">
            </div>
        </div>
        </div>
        
    </div> -->

    <div class="section">
			<!-- container -->
			<div class="container" ng-controller="homecontroller">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Sản phẩm mới</h3>
							<div class="section-nav" style="font-size:18px">
                                <label for="">Thể loại</label>
                                <select class="custom-select">
                                    <option selected>------------------</option>
                                    <option ng-repeat="cat in categories1" value="@{{cat.id}}">@{{cat.name}}</option>
                                </select>
                                <label style="margin-left:20px" for="">Nhà xuất bản</label>
                                <select class="custom-select">
                                    <option selected>------------------</option>
                                    <option ng-repeat="cat in categories1" value="@{{cat.id}}">@{{cat.name}}</option>
                                </select>
                                <button class="btn btn-success" style="">Lọc</button>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
                            <div class="col-md-3 col-xs-6" dir-paginate="book in new_book|itemsPerPage: 4">
                                <div class="product" >
                                <div class="product-img">
                                    <img src="/upload/book/@{{book.image}}" alt="">
                                    <div class="product-label">
                                        <!-- <span class="sale">-30%</span> -->
                                        <span class="new">MỚI</span>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <p class="product-category">@{{book.category.name}}</p>
                                    <h3 class="product-name"><a href="#">@{{book.name}}</a></h3>
                                    <h4 class="product-price">@{{book.disc_price | number:0}}đ <del class="product-old-price">@{{book.unit_price | number:0}}</del></h4>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product-btns">
                                        <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Yêu thích</span></button>
                                        <button class="quick-view" ng-click="setDetail(book.id)"><i class="fa fa-eye"></i><span class="tooltipp">Chi tiết</span></button>
                                    </div>
                                </div>
                                <div class="add-to-cart">
                                    <button class="add-to-cart-btn" ng-click="addToCart(sp.id)"><i class="fa fa-shopping-cart"></i> Đặt hàng</button>
                                </div>
                            </div>
                            </div>

                            
						</div>
                        <div style="display: flex; justify-content: center; ">
                            <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true"
                                on-page-change='indexCount(newPageNumber)'>
                            </dir-pagination-controls>
                        </div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->

            <div class="container" ng-controller="homecontroller">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Bán chạy</h3>
							<div class="section-nav" style="font-size:18px">
                                <label for="">Thể loại</label>
                                <select class="custom-select">
                                    <option selected>------------------</option>
                                    <option ng-repeat="cat in categories1" value="@{{cat.id}}">@{{cat.name}}</option>
                                </select>
                                <label style="margin-left:20px" for="">Giá bán</label>
                                <select class="custom-select">
                                    <option selected>------------------</option>
                                    <option value="1">Từ thấp đến cao</option>
                                    <option value="1">Từ cao đến thấp</option>
                                </select>
                                <button class="btn btn-success" style="">Lọc</button>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
                            <div class="col-md-3 col-xs-6" dir-paginate="book in books3|itemsPerPage: 4">
                                <div class="product" >
                                <div class="product-img">
                                    <img src="/upload/book/@{{book.image}}" alt="">
                                    <div class="product-label">
                                        <!-- <span class="sale">-30%</span> -->
                                        <span class="new">MỚI</span>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <p class="product-category">@{{book.category.name}}</p>
                                    <h3 class="product-name"><a href="#">@{{book.name}}</a></h3>
                                    <h4 class="product-price">@{{book.disc_price | number:0}}đ <del class="product-old-price">@{{book.unit_price | number:0}}</del></h4>
                                    <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product-btns">
                                        <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Yêu thích</span></button>
                                        <button class="quick-view" ng-click="setDetail(book.id)"><i class="fa fa-eye"></i><span class="tooltipp">Chi tiết</span></button>
                                    </div>
                                </div>
                                <div class="add-to-cart">
                                    <button class="add-to-cart-btn" ng-click="addToCart(sp.id)"><i class="fa fa-shopping-cart"></i> Đặt hàng</button>
                                </div>
                            </div>
                            </div>

                            
						</div>
                        <div style="display: flex; justify-content: center; ">
                            <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true"
                                on-page-change='indexCount(newPageNumber)'>
                            </dir-pagination-controls>
                        </div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
		</div>
    <script src="/js/angular.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular-cookies.js"></script>

    <script src="/js/local/homecontroller.js"></script>
    <script src="/js/dirPagination.js"></script>


@stop