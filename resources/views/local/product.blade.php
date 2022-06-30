@extends('_layout_local')
@section('content')
	<!-- SECTION -->
    <div class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Thể loại</h3>
							<div class="checkbox-filter">

								<div class="input-checkbox" ng-controller="homecontroller" dir-paginate="cat in categories2|itemsPerPage:6">
									<input type="checkbox" id="@{{cat.name}}">
									<label for="category-1">
										<span></span>
										@{{cat.name}}
										<small>(@{{cat.total}})</small>
									</label>
								</div>

							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Bán chạy</h3>
							<div class="product-widget" ng-controller="homecontroller" dir-paginate="sp in books3|itemsPerPage:4">
								<div class="product-img">
									<img src="/upload/book/@{{sp.image}}" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">@{{sp.category.name}}</p>
									<h3 class="product-name"><a href="">@{{sp.name}}</a></h3>
									<h4 class="product-price">@{{sp.disc_price | number:0}}đ <del class="product-old-price">@{{sp.unit_price | number:0}}</del></h4>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9" ng-controller="homecontroller">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Xếp theo:
									<select class="form-control">
										<option value="0">Giá bán: giảm dần</option>
										<option value="1">Giá bán: tăng dần</option>
									</select>
								</label>

								<label>
									Hiển thị:
									<input type="number" min="1" max="100" class="form-control" ng-model="pageSize">
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row" >
							<!-- product -->
							<div class="col-md-4 col-xs-6" dir-paginate="sp in books|itemsPerPage: pageSize|orderBy:'disc_price':sortReverse">
								<div class="product">
									<div class="product-img">
										<img style="cursor:pointer;" src="/upload/book/@{{sp.image}}" alt="" ng-click="setDetail(sp.id)">
										<div class="product-label">
											<!-- <span class="sale">-30%</span> -->
											<span class="new">MỚI</span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category" >@{{sp.category.name}}</p>
										<h3 class="product-name" style="max-height:15px; overflow-y:hidden"><a href="#">@{{sp.name}}</a></h3>
										<h4 class="product-price">@{{sp.disc_price | number:0}}đ <del class="product-old-price">@{{sp.unit_price | number:0}}đ</del></h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Thêm vào yêu thích</span></button>
											<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Thêm vào so sánh</span></button>
											<button class="quick-view" ng-click="setDetail(sp.id)"><i class="fa fa-eye"></i><span class="tooltipp">Chi tiết</span></button>
										</div>
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn" ng-click="addToCart(sp.id)"><i class="fa fa-shopping-cart"></i> Đặt hàng</button>
									</div>
								</div>
							</div>
							<!-- /product -->
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div style="display: flex; justify-content: center; ">
                            <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true"
                                on-page-change='indexCount(newPageNumber)'>
                            </dir-pagination-controls>
                        </div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

    <script src="/js/angular.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular-cookies.js"></script>
    <script src="/js/local/productcontroller.js"></script>
    <script src="/js/dirPagination.js"></script>

@stop