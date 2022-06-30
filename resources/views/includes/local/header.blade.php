<!-- HEADER -->
<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> 0966-555-171</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> storebook.official@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> Yên Mỹ, Hưng Yên</a></li>
					</ul>
					<!-- <ul class="header-links pull-right" >
						<li>
							<a href="/login"><i class="fa fa-user-o"></i> Đăng nhập /</a>
							<a href="/register"> Đăng ký</a>
						</li>
					</ul> -->
					<ul class="header-links pull-right">
						<li>
						<div class="dropdown" ng-controller="homecontroller">
							<button style="color: #FFF" class="btn btn-link dropdown-toggle" type="button" data-toggle="dropdown">
							<i style="color: #FFF" class="fa fa-user-o">@{{login_info}}</i>
							<span class="caret"></span></button>
							<ul class="dropdown-menu" >
								<li><a style="color: #000" href="/login">Đăng nhập</a></li>
								<li><a style="color: #000" href="/register">Đăng ký</a></li>
								<li><a style="color: #000" ng-click="logOut()" href="#">Đăng xuất</a></li>
							</ul>
						</div>
						</li>
						
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="/" class="logo">
									<!-- <img src="./img/logo.png" alt=""> -->
									<h1  style="color:#FFF; margin-top:16px">STOREBOOK</h1>
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search" ng-controller="homecontroller">
								<form>
									<input style="border-radius: 40px 0px 0px 40px;width: 400px;" class="input" ng-model="searchText" placeholder="Tìm kiếm...">
									<button class="search-btn" ng-click="search()">Tìm kiếm</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Yêu thích</span>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									@php
										$carts = session()->get('cart');
										$total = 0;
									@endphp
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Giỏ hàng</span>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											
											@if($carts != null)  
											@php
												$carts = session()->get('cart');
												$count = count($carts);
											@endphp
												@foreach($carts as $cartItem)
													@php
														$total += $cartItem['price'] * $cartItem['qty'];
													@endphp
													<div class="product-widget">
														<div class="product-img">
															<img src="/upload/book/{{$cartItem['image']}}" alt="">
														</div>
														<div class="product-body">
															<h3 class="product-name"><a href="#">{{$cartItem['name']}}</a></h3>
															<h4 class="product-price"><span class="qty">{{$cartItem['qty']}}x</span>{{number_format($cartItem['price'])}}đ</h4>
														</div>
														<button class="delete"><i class="fa fa-close"></i></button>
													</div>
													
												@endforeach
												</div>
													<div class="cart-summary">
														<small>{{$count}} sản phẩm được chọn</small>
														<h5>Tạm tính: {{number_format($total)}}đ</h5>
													</div>
											@else
												</div>
												<div class="cart-summary">
													<small>0 sản phẩm được chọn</small>
													<h5>Tạm tính: 0đ</h5>
												</div>
											@endif
											
										
										<div class="cart-btns">
											<a href="/gio-hang">Xem giỏ hàng</a>
											<a href="/thanh-toan">Thanh toán  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
