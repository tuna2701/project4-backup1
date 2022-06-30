@extends('_layout_local')
@section('content')

    <div class="section">

            <div class="container" ng-controller="homecontroller">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Bán chạy</h3>
							<div class="section-nav" style="font-size:18px">
                                <label for="">Thể loại</label>
                                <select class="custom-select" ng-model="cat_selected">
                                    <option selected value="0">------------------</option>
                                    <option ng-repeat="cat in categories" value="@{{cat.id}}">@{{cat.name}}</option>
                                </select>
                                <label style="margin-left:20px" for="">Giá bán</label>
                                <select class="custom-select" ng-model="sortReverse">
                                    <option value="true">Từ thấp đến cao</option>
                                    <option value="false">Từ cao đến thấp</option>
                                </select>
                                <button ng-click="filter()" class="btn btn-success" style="">Lọc</button>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
                            <div class="col-md-3 col-xs-6" dir-paginate="book in books3|itemsPerPage: 8|orderBy:'disc_price':sortReverse">
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
                                    <h3 class="product-name" style="max-height: 15px; overflow-y:hidden"><a href="#">@{{book.name}}</a></h3>
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
		</div>
		<script src="/js/angular.min.js"></script>

    <script src="/js/local/best-sellercontroller.js"></script>
    <script src="/js/dirPagination.js"></script>


@stop