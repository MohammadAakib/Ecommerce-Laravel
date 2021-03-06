@extends('layouts.master1')
@section('home')
<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="/index">Home</a>
						<i>|</i>
					</li>
					<li>Product Details</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>D</span>etails
				<span>P</span>age</h3>
			<!-- //tittle heading -->
			<div class="row">
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">
								<li>
									<div class="thumb-image">
										<img src="{{url('uploads/'.$productarray->product_image) }}" width="300"  class="img-fluid" alt=""> </div>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3">{{$productarray->product_name}}</h3>
					<p class="mb-3">
						<span class="item_price">Rs.{{$productarray->product_price}}</span>
					</p>
					<div class="product-single-w3l">
						<p class="my-3">
							<i class="far fa-hand-point-right mr-2"></i>
							<label>1 Year</label>Manufacturer Warranty</p>
						<ul>
							<li class="mb-1">
								{{$productarray->product_details}}
							</li>
							<li class="mb-1">
								{{$productarray->product_details}}
							</li>
							<li class="mb-1">
								{{$productarray->product_details}}
							</li>
						</ul>
						<p class="my-sm-4 my-3">
							<i class="fas fa-retweet mr-3"></i>Net banking & Credit/ Debit/ ATM card
						</p>
					</div>
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
							<form action="{{url('cartprocess',$productarray->product_id) }}" method="post">
								@csrf
								<fieldset>
									<input type="hidden" name="pid" value="{{$productarray->product_id}}" min="1" max="10"/>
   		 							<input type="number" name="qty" value="1" min="1" max="10"/>
									<input type="hidden" name="item_name" value="{{$productarray->product_name}}" />
									<input type="hidden" name="amount" value="Rs.{{$productarray->product_price}}" />
									<input type="hidden" name="return" value=" " />
									<input type="hidden" name="cancel_return" value=" " />
									<input type="submit" value="Add to cart" class="button" />
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection