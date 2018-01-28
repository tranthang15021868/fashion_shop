@extends('user.master')
@section('content')
<section class="main-content">
	<div class="row">
		<div class="span12">
			<div class="row feature_box">						
				<div class="span4">
					<div class="service">
						<div class="responsive">	
							<img src="{!! url('public/user/themes/images/feature_img_2.png') !!}" alt="" />
							<h4>MODERN <strong>DESIGN</strong></h4>
							<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>									
						</div>
					</div>
				</div>
				<div class="span4">	
					<div class="service">
						<div class="customize">			
							<img src="{!! url('public/user/themes/images/feature_img_1.png') !!}" alt="" />
							<h4>FREE <strong>SHIPPING</strong></h4>
							<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
						</div>
					</div>
				</div>
				<div class="span4">
					<div class="service">
						<div class="support">	
							<img src="{!! url('public/user/themes/images/feature_img_3.png') !!}" alt="" />
							<h4>24/7 LIVE <strong>SUPPORT</strong></h4>
							<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
						</div>
					</div>
				</div>	
			</div>													
			<div class="row">
				<div class="span12">
					<h4 class="title">
						<span class="pull-left"><span class="text"><span class="line">Feature <strong>Products</strong></span></span></span>
						<span class="pull-right">
							<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
						</span>
					</h4>
					<div id="myCarousel" class="myCarousel carousel slide">
						<div class="carousel-inner">
							<div class="active item">
								<ul class="thumbnails">
									@foreach($product_feature as $product_feature)
									<?php
											$cate = DB::table('cates') -> select('name', 'alias') -> where('id', $product_feature -> cate_id) -> first();
										?>
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>
											<p><a href="{!! URL('product', [$product_feature -> id, $product_feature -> alias]) !!}"><img src="{!! asset('resources/upload/'.$product_feature -> image) !!}" alt="" /></a></p>
											<a href="" class="title">{!! $product_feature -> name !!}</a><br/>
											<a href="" class="category">{!! $cate -> name !!}</a>
											<p class="price">${!! $product_feature -> price !!}</p>
										</div>
									</li>
									@endforeach
								</ul>
							</div>
							<div class="item">
								<ul class="thumbnails">
									@foreach($product_feature1 as $product_feature1)
									<?php
											$cate = DB::table('cates') -> select('name', 'alias') -> where('id', $product_feature1 -> cate_id) -> first();
										?>
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>
											<p><a href="{!! URL('product', [$product_feature -> id, $product_feature1 -> alias]) !!}"><img src="{!! asset('resources/upload/'.$product_feature1 -> image) !!}" alt="" /></a></p>
											<a href="" class="title">{!! $product_feature1 -> name !!}</a><br/>
											<a href="" class="category">{!! $cate -> name !!}</a>
											<p class="price">${!! $product_feature1 -> price !!}</p>
										</div>
									</li>
									@endforeach												
								</ul>
							</div>
						</div>							
					</div>
				</div>						
			</div>
			<br/>
			<div class="row">
				<div class="span12">
					<h4 class="title">
						<span class="pull-left"><span class="text"><span class="line">Latest <strong>Products</strong></span></span></span>
						<span class="pull-right">
							<a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button" href="#myCarousel-2" data-slide="next"></a>
						</span>
					</h4>
					<div id="myCarousel-2" class="myCarousel carousel slide">
						<div class="carousel-inner">
							<div class="active item">
								<ul class="thumbnails">
									@foreach($product_latest as $product_latest)
										<?php
											$cate = DB::table('cates') -> select('name', 'alias') -> where('id', $product_latest -> cate_id) -> first();
										?>
										<li class="span3">
											<div class="product-box">
												<span class="sale_tag"></span>
												<p><a href="{!! URL('product', [$product_latest -> id, $product_latest -> alias]) !!}"><img src="{!! asset('resources/upload/'.$product_latest -> image) !!}" alt="" /></a></p>
												<a href="" class="title">{!! $product_latest -> name !!}</a><br/>
												<a href="" class="category">{!! $cate -> name !!}</a>
												<p class="price">${!! $product_latest -> price !!}</p>
											</div>
										</li>
									@endforeach
								</ul>
							</div>
							<div class="item">
								<ul class="thumbnails">
									@foreach($product_latest1 as $product_latest1)
										<?php
											$cate = DB::table('cates') -> select('name', 'alias') -> where('id', $product_latest1 -> cate_id) -> first();
										?>
										<li class="span3">
											<div class="product-box">
												<span class="sale_tag"></span>
												<p><a href="{!! URL('product', [$product_latest -> id, $product_latest1 -> alias]) !!}"><img src="{!! asset('resources/upload/'.$product_latest -> image) !!}" alt="" /></a></p>
												<a href="" class="title">{!! $product_latest1 -> name !!}</a><br/>
												<a href="" class="category">{!! $cate -> name !!}</a>
												<p class="price">${!! $product_latest1 -> price !!}</p>
											</div>
										</li>
									@endforeach																															
								</ul>
							</div>
						</div>							
					</div>
				</div>						
			</div>	
		</div>				
	</div>
</section>
<section class="our_client">
	<h4 class="title"><span class="text">Manufactures</span></h4>
	<div class="row">					
		<div class="span2">
			<a href="#"><img alt="" src="{!! url('public/user/themes/images/clients/14.png') !!}"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="{!! url('public/user/themes/images/clients/35.png') !!}"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="{!! url('public/user/themes/images/clients/1.png') !!}"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="{!! url('public/user/themes/images/clients/2.png') !!}"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="{!! url('public/user/themes/images/clients/3.png') !!}"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="{!! url('public/user/themes/images/clients/4.png') !!}"></a>
		</div>
	</div>
</section>
@endsection