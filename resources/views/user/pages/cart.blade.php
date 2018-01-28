@extends('user.master')
@section('content')
<script type="text/javascript" charset="utf-8" async defer>
	function xacNhanXoa(msg) {
	if(window.confirm(msg)) {
		return true;
	}
	return false;
};
</script>
<section class="header_text sub">
		<h4><span>Shopping Cart</span></h4>
	</section>
	<section class="main-content">				
		<div class="row">
			<div class="span12">					
				<h4 class="title"><span class="text"><strong>Your</strong> Cart</span></h4>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Image</th>
							<th>Product Name</th>
							<th>Quantity</th>
							<th class="text-center">Action</th>
							<th>Unit Price</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<form method="POST", action="">
						<input type="hidden" name="_token" value="{!! csrf_token() !!}">
						@foreach($content as $item)
							<tr>
								<td><a href="{!! URL('product', [$item -> id, $item -> options -> alias]) !!}"><img width="80" height="40"alt="" src="{!! asset('resources/upload/'.$item -> options -> img) !!}"></a></td>
								<td><h5>{!! $item -> name !!}</h5></td>
								<td ><input type="text" placeholder="1" class="input-mini qty" value="{!! $item -> qty !!}"></td>
								<td class="text-center">
									<a href="" title="" class="updatecart" id="{!! $item -> rowId !!}"><img data-original-title = "Update" src="{!! asset('resources/upload/images/refresh_icon.png') !!}" alt="Update"></a>
									<a href="{!! route('deleteproduct', ['id' => $item -> rowId]) !!}" title=""><img onclick = "return xacNhanXoa('Are you agree delete product?')" class="tooltip-test" data-original-title = "Delete" src="{!! asset('resources/upload/images/delete_icon.png') !!}" alt="Delete"></a>
								</td>
								<td><h5>${!! $item -> price !!}</h5></td>
								<td><h5>${!! ($item ->qty) * ($item -> price) !!}</h5></td>
							</tr>
						@endforeach
						</form>		  
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td><strong><h5>${!! $total !!}</h5></strong></td>
						</tr>		  
					</tbody>
				</table>
				<hr>
				<h3><p class="cart-total text-center">
					<!-- <strong>Sub-Total</strong>:	${!! $total !!}<br>
					<strong>Eco Tax (-2.00)</strong>: $2.00<br>
					<strong>VAT (17.5%)</strong>: $17.50<br> -->
					<strong>Total</strong>: ${!! $total !!}<br>
				</p></h3>
				<hr/>
				<p class="buttons center">				
					<button class="btn" type="button">Update</button>
					<button class="btn" type="button">Continue</button>
					<button class="btn btn-inverse" type="submit" id="checkout">Checkout</button>
				</p>					
			</div>
		</div>
</section>
@endsection