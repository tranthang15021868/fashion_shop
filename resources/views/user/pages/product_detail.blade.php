@extends('user.master')
@section('content')
<section class="header_text sub">
	<h4><span>{!! $product_detail -> name !!}</span></h4>
</section>
<section class="main-content">				
	<div class="row">						
		<div class="span9">
			<div class="row">
				<div class="span4">
					<a href="{!! asset('resources/upload/'.$product_detail -> image) !!}" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="" src="{!! asset('resources/upload/'.$product_detail -> image) !!}"></a>												
					<ul class="thumbnails small">
					@if (!empty($image) && $image -> count())
						@foreach($image as $image)							
							<li class="span1">
								<a href="{!! asset('resources/upload/detail/'.$image -> image) !!}" class="thumbnail" data-fancybox-group="group1" title="Description 2"><img src="{!! asset('resources/upload/detail/'.$image -> image) !!}" alt=""></a>
							</li>	
						@endforeach
					@endif					
					</ul>
				</div>
				<div class="span5">
					<address>
						<strong>Brand:</strong> <span>Apple</span><br>
						<strong>Product Code:</strong> <span>Product {!! $product_detail -> id !!}</span><br>
						<strong>Reward Points:</strong> <span>0</span><br>
						<strong>Availability:</strong> <span>Out Of Stock</span><br>								
					</address>									
					<h4><strong>Price: ${!! $product_detail -> price !!}</strong></h4>
				</div>
				<div class="span5">
					<form class="form-inline" action="{!! url('shopping', [$product_detail -> id, $product_detail -> alias]) !!}" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{!! csrf_token() !!}">
							<p>&nbsp;</p>
							<label>Qty:</label>
							<input type="text" name="qt" class="span1" value="1">
							<button class="btn btn-inverse" type="submit">Add to cart</button>
					</form>
				</div>							
			</div>
			<div class="row">
				<div class="span12">
					<ul class="nav nav-tabs" id="myTab">
						<li class="active"><a href="#home">Description</a></li>
						<li class=""><a href="#profile">Additional Information</a></li>
					</ul>							 
					<div class="tab-content">
						<div class="tab-pane active" id="home">{!! $product_detail -> description !!}</div>
						<div class="tab-pane" id="profile">
							{!! $product_detail -> content !!}
						</div>
					</div>							
				</div>						
				<div class="span9">	
					<br>
					<h4 class="title">
						<span class="pull-left"><span class="text"><strong>Related</strong> Products</span></span>
						<span class="pull-right">
							<a class="left button" href="#myCarousel-1" data-slide="prev"></a><a class="right button" href="#myCarousel-1" data-slide="next"></a>
						</span>
					</h4>
					
				</div>
			</div>
		</div>
		<div class="span3 col">
			<div class="block">	
				<ul class="nav nav-list">
					<li class="nav-header">{!! $cat -> name !!}</li>
					@foreach($menu_cate as $menu_item)
						<li><a href="{!! URL('category', [$menu_item -> id, $menu_item -> alias]) !!}l">{!! $menu_item -> name !!}</a></li>
					@endforeach
				</ul>
				<br/>
				<ul class="nav nav-list below">
					<li class="nav-header">MANUFACTURES</li>
					<li><a href="#">Adidas</a></li>
					<li><a href="#">Nike</a></li>
					<li><a href="#">Dunlop</a></li>
					<li><a href="#">Yamaha</a></li>
				</ul>
			</div>
			<div class="block">
				<h4 class="title">
					<span class="pull-left"><span class="text">Randomize</span></span>
					<span class="pull-right">
						<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
					</span>
				</h4>
				
			</div>
			<div class="block">								
				<h4 class="title"><strong>Best</strong> Seller</h4>								
				<ul class="small-product">
					@foreach($product_sell as $product_sell_item)
						<li>
							<a href="{!! URL('product', [$product_sell_item -> id, $product_sell_item -> alias]) !!}" title="{!! $product_sell_item -> name !!}">
								<img src="{!! asset('resources/upload/'.$product_sell_item -> image) !!}" alt="{!! $product_sell_item -> name !!}">
							</a>
							<a href="{!! URL('product', [$product_sell_item -> id, $product_sell_item -> alias]) !!}" title="{!! $product_sell_item -> name !!}">{!! $product_sell_item -> name !!}</a>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</section>
@endsection