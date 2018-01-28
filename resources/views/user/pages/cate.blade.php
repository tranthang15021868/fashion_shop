@extends('user.master')
@section('content')
<section class="header_text sub">
		<h4><span>{!! $cate -> name !!}</span></h4>
	</section>
	<section class="main-content">
		
		<div class="row">						
			<div class="span9">								
				<ul class="thumbnails listing-products">
					@foreach($product_cate as $product_cates)
						<li class="span3">
							<div class="product-box">
								<span class="sale_tag"></span>												
								<a href="{!! URL('product', [$product_cates -> id, $product_cates -> alias]) !!}"><img alt="" src="{!! asset('resources/upload/'.$product_cates -> image) !!}"></a><br/>
								<a href="product_detail.html" class="title">{!! $product_cates -> name !!}</a><br/>
								<a href="#" class="category">{!! $cate -> name !!}</a>
								<p class="price">${!! $product_cates -> price !!}</p>
							</div>
						</li>
					@endforeach
				</ul>								
				<hr>
				<div class="pagination pagination-small pagination-centered">
					{{ $product_cate->links() }}
				</div>
			</div>
			<div class="span3 col">
				<div class="block">	
					<ul class="nav nav-list">
						<li class="nav-header">{!! $parent_cate -> name !!}</li>
							@foreach($menu_cate as $menu_cate)
							<li
								@if($menu_cate -> id == $cat -> id)
									class="active" 
								@endif
							><a 	
									href="{!! URL('category', [$menu_cate -> id, $menu_cate -> alias]) !!}">{!! $menu_cate -> name !!}
								</a>
							</li>
							@endforeach
					</ul>
					<br/>
				</div>
				<div class="block">
					<h4 class="title">
						<span class="pull-left"><span class="text">Randomize</span></span>
						<span class="pull-right">
							<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
						</span>
					</h4>
					<div id="myCarousel" class="carousel slide">
						<div class="carousel-inner">
							<div class="active item">
								<ul class="thumbnails listing-products">
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>												
											<a href="{!! URL('product', [$product0 -> id, $product0 -> alias]) !!}"><img alt="" src="{!! asset('resources/upload/'.$product0 -> image) !!}"></a><br/>
											<a href="#" class="title">{!! $product0 -> name !!}</a><br/>
											<a href="#" class="category">{!! $cate -> name !!}</a>
											<p class="price">${!! $product0 -> price !!}</p>
										</div>
									</li>
								</ul>
							</div>
							<div class="item">
								<ul class="thumbnails listing-products">
									<li class="span3">
										<div class="product-box">												
											<a href="{!! URL('product', [$product1 -> id, $product1 -> alias]) !!}"><img alt="" src="{!! asset('resources/upload/'.$product1 -> image) !!}"></a><br/>
											<a href="" class="title">{!! $product1 -> name !!}</a><br/>
											<a href="" class="category">{!! $cate -> name !!}</a>
											<p class="price">${!! $product1 -> price !!}</p>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="block">								
					<h4 class="title"><strong>Best</strong> Seller</h4>								
					<ul class="small-product">
						@foreach($product_sell as $product_sell)
							<li>
								<a href="{!! URL('product', [$product_sell -> id, $product_sell -> alias]) !!}" title="{!! $product_sell -> name !!}">
									<img src="{!! asset('resources/upload/'.$product_sell -> image) !!}" alt="{!! $product_sell -> name !!}">
								</a>
								<a href="{!! URL('product', [$product_sell -> id, $product_sell -> alias]) !!}">{!! $product_sell -> name !!}</a>
							</li>  
						@endforeach
					</ul>
				</div>
			</div>
		</div>
</section>
@endsection