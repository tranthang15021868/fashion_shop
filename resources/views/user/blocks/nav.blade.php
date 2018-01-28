<section class="navbar main-menu">
	<div class="navbar-inner main-menu">				
		<a href="{!! url('/') !!}" class="logo pull-left"><img src="{!! url('public/user/themes/images/logo.png') !!}" class="site_logo" alt=""></a>
		<nav id="menu" class="pull-right">
			<ul>
				<?php
					$menu_level_1 = DB::table('cates') -> where('parent_id', 0) -> get();
				?>
				@foreach($menu_level_1 as $cate_level_1)
				<li><a href="">{!! $cate_level_1 -> name !!}</a>					
					<ul>
						<?php
							$menu_level_2 = DB::table('cates') -> where('parent_id', $cate_level_1 -> id) -> get();
						?>
						@foreach($menu_level_2 as $cate_level_2)
						<li><a href="{!! URL('category', [$cate_level_2 -> id, $cate_level_2 -> alias]) !!}">{!! $cate_level_2 -> name !!}</a></li>	
						@endforeach							
					</ul>
				</li>
				@endforeach																					
				<li><a href="{!! URL::route('getContact') !!}">Contact</a></li>
			</ul>
		</nav>
	</div>
</section>