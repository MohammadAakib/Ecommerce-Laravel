@extends('layouts.master1')
@section('home')
<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="/">Home</a>
						<i>|</i>
					</li>
					<li>PRODUCTS</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>M</span>obiles
				<span>&</span>
				<span>C</span>omputers</h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<div class="row">
								<div class="col-md-4 product-men">
									@foreach ($productarray as $product)
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img src="{{url('uploads/'.$product->product_image) }}" alt="" width="100">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="{{url('viewproduct',$product->product_id) }}" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="/viewproduct">{{$product->product_name}}</a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price">{{$product->product_price}}</span>
												
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
						<!-- //first section -->
					</div>
					
				</div>
				<!-- product right -->
				<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
					<div class="side-bar p-sm-4 p-3">
						<div class="search-hotel border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Brand</h3>
							<form action="#" method="post">
								<input type="search" placeholder="Search Brand..." name="search" required="">
								<input type="submit" value=" ">
							</form>
							<div class="left-side py-2">
								<ul>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">Samsung</span>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">Apple</span>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">One Plus</span>
									</li>
								</ul>
							</div>
						</div>
						<!-- ram -->
					</div>
					<!-- //product right -->
				</div>
			</div>
		</div>
	</div>
@endsection