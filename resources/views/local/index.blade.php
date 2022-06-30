@extends('_layout_local')
@section('content')
	<!-- SECTION -->
    <div class="section">
	<div class="container" style="margin-top: 32px">
        <div class="col-md-8" >
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" >
            <div class="item active">
            <img src="/upload/banner/banner1.png" alt="Los Angeles">
            </div>

            <div class="item">
            <img src="/upload/banner/banner2.jpg" alt="Chicago">
            </div>

            <div class="item">
            <img src="/upload/banner/banner3.png" alt="New York">
            </div>
        </div>

        <!-- Left and right controls -->
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
                <img src="/upload/banner/banner2.jpg" class="d-block w-100" alt="Chicago">
            </div>
        </div>
        </div>
        
    </div>
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
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
                                <select class="custom-select" ng-model="cat_selected">
                                    <option value="0" selected>------------------</option>
                                    <option ng-repeat="cat in categories" value="@{{cat.id}}">@{{cat.name}}</option>
                                </select>
                                <label style="margin-left:20px" for="">Nhà xuất bản</label>
                                <select class="custom-select" ng-model="pub_selected">
                                    <option value="0" selected>------------------</option>
                                    <option ng-repeat="cat in publishers" value="@{{cat.id}}">@{{cat.name}}</option>
                                </select>
                                <button class="btn btn-success" ng-click="filter()" style="">Lọc</button>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
                            <div class="col-md-3 col-xs-6" dir-paginate="book in new_book|itemsPerPage: 8">
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
                                    <h3  class="product-name" style="max-height: 15px; overflow-y:hidden" ng-click="setDetail(book.id)"><a href="#">@{{book.name}}</a></h3>
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
                                    <button class="add-to-cart-btn" ng-click="addToCart(book.id)"><i class="fa fa-shopping-cart"></i> Đặt hàng</button>
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
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Ngày</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Giờ</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Phút</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Giây</span>
									</div>
								</li>
							</ul>
  
							<h2 style="color: #FBFBFC;" class="text-uppercase">bán chạy trong tuần</h2>
							<p>Những bộ sách giảm tới 50%</p>
							<a class="primary-btn cta-btn" href="/ban-chay">Xem ngay</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->


		<script src="/js/angular.min.js"></script>
		<script src="/js/local/homecontroller.js"></script>
		<script src="/js/dirPagination.js"></script>
@stop