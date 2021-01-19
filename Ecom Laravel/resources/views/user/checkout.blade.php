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
					<li>Checkout</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- checkout page -->
	<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>C</span>heckout
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				<h4 class="mb-sm-4 mb-3">Your shopping cart contains:
				</h4>
				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<td>PRODUCT</td>
								<td>PRICE</td>
								<td>IMAGE</td>
								<td>QUANTITY</td>
								<td>ACTION</td>
							</tr>
						</thead>

						<tbody>
							<?php $total = 0 ?>
        					@if (session('cart'))
            
       						 @foreach (session('cart') as $id=> $details)
        					<?php $total += $details['price'] * $details['quantity'] ?>
							
							<tr class="rem1">
								
								<td class="invert">{{$details['name']}}</td>
								<td class="invert">{{$details['price']}}</td>
								
								<td class="invert-image">
									<a href="/viewproduct">
										<img src="{{url('uploads/'.$details['image']) }}" width="50" alt=" " class="img-responsive">
									</a>
								</td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											<div>
												<form method="post" action="{{ url('updatecart',$id)}}">
													@csrf 
												<input type="number" value="{{ $details['quantity']}}" name="qty" min="1" max="10" />
												<input type="submit" value="Update">
												</form>
											</div>
										</div>
									</div>
								</td>
								<td class="invert">
									<div class="rem">
										<div><a href="{{ url('/removecart') }}/{{$id}}">DELETE </div>
									</div>
								</td>
							</tr>
							@endforeach
        					@endif
						</tbody>
						<tfoot>
							<tr class="rem1">
								<div class="total">
								<td class="invert"><a href="{{ url('/productlist') }}">CONTINUE SHOPPING</a></td>
            					<td class="invert">TOTAL</td>
								<td class="invert" colspan="3"> <strong>{{$total}}</strong> </td>
								</div>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
			<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<form action="{{ url('placeorder')}}" method="post" class="creditly-card-form agileinfo_form">
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
							@if(session('cart'))
    						@csrf
							<button class="submit check_out btn">Delivery</button>
							@endif
							</div>
						</div>
					</form>
					<div class="checkout-right-basket">
						<a href="#">Make a Payment
							<span class="far fa-hand-point-right"></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection