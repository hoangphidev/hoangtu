@extends('customer.layout.index')
@section('main')
	<div id="slider">
		<div id="demo" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<?php $i=0;?>
					@foreach($slide as $sl)
						@if($sl->status == 1)
							@if($sl->locate==1 && $i>0)
								<div class="carousel-item">
									<a href="{{route('bannerdetail', ['id'=>$sl['id'], 'unsigned_name'=>$sl['unsigned_name']])}}">
										<img style="width: 100%;" src="upload/banner/{{$sl->images}}" alt="{{$sl->unsigned_name}}" >
									</a>
								</div>	
							@endif
							@if($sl->locate==1 && $i==0)
								<div class="carousel-item active">
									<a href="{{route('bannerdetail', ['id'=>$sl['id'], 'unsigned_name'=>$sl['unsigned_name']])}}">
										<img style="width: 100%;" src="upload/banner/{{$sl->images}}" alt="{{$sl->unsigned_name}}" >
									</a>
								</div>	
								<?php $i++; ?>
							@endif
						@endif
					@endforeach
			</div>

			
			<a class="carousel-control-prev" href="#demo" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			</a>
			<a class="carousel-control-next" href="#demo" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			</a>
		</div>
	</div>

<div id="wrap-inner">
	<div class="products">
		<h3>sản phẩm nổi bật</h3>
		<div class="product-list row">
			@foreach($product as $sp)
				@if($sp->status == 1)
					<div class="product-item col-md-3 col-sm-6 col-xs-12">
						<img height="150px" src="upload/product/{{$sp->getCate['unsigned_name']}}/{{$sp->images}}" class="img-thumbnail">
						<p><a href="{{asset('detail/'.$sp->id.'/'.$sp->unsigned_name.'.html')}}">{{str_limit($sp->name, 30)}}</a></p>
						<?php if ($sp->percent_promotion == null): ?>
							<p class="price">{{number_format($sp->price,0,',','.')}} đ</p>
						<?php endif ?>
						<?php if ($sp->percent_promotion != null): ?>
							<?php $price = ($sp->price) - (($sp->price)*($sp->percent_promotion))/100 ?>
							<p class="price">{{number_format($price,0,',','.')}} đ</p>
						<?php endif ?> 
						<div class="marsk">
							<a href="{{asset('detail/'.$sp->id.'/'.$sp->unsigned_name.'.html')}}">Xem chi tiết</a>
						</div>                                    
					</div>
				@endif
			@endforeach
		</div>                	                	
	</div>

	<div id="banner-t" class="text-center">
		<div class="row">
			<?php $i=0; ?>
			@foreach($slide as $sl)
				@if($sl->status == 1)
					@if($sl->locate==3 && $i<2)
						<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
							<a href="{{route('bannerdetail', ['id'=>$sl['id'], 'unsigned_name'=>$sl['unsigned_name']])}}"><img src="upload/banner/{{$sl->images}}" alt="" class="img-thumbnail"></a>
						</div>
						<?php $i++; ?>
					@endif
				@endif
			@endforeach
		</div>					
	</div>

	<div class="products">
		<h3>sản phẩm mới</h3>
		<div class="product-list row">
			@foreach($product_new as $sp)
				@if($sp->status == 1)
					<div class="product-item col-md-3 col-sm-6 col-xs-12">
						<img height="150" src="upload/product/{{$sp->getCate['unsigned_name']}}/{{$sp->images}}" class="img-thumbnail">
						<div>
							<p>{{str_limit($sp->name, 30)}}</p>
							<?php if($sp->amount <= 0): ?>
								<p class="price">Tạm hết hàng</p>
							<?php endif ?>
							<?php if($sp->amount > 0): ?>
								<?php if ($sp->percent_promotion == null): ?>
									<p class="price">{{number_format($sp->price,0,',','.')}} đ</p>
								<?php endif ?>
								<?php if ($sp->percent_promotion != null): ?>
									<?php $price = ($sp->price) - (($sp->price)*($sp->percent_promotion))/100 ?>
									<p class="price">{{number_format($price,0,',','.')}} đ</p>
								<?php endif ?>
							<?php endif ?>
						</div>
						<div class="marsk">
							<a href="{{asset('detail/'.$sp->id.'/'.$sp->unsigned_name.'.html')}}">Xem chi tiết</a>
						</div>                                    
					</div>
				@endif
			@endforeach
		</div>    
	</div>
</div>
<div class="mt-5 mb-3 text text-center">
		<a class="p-3 rounded text-white bg-dark" href="{{asset('all')}}">Hiển Thị Tất Cả Sản Phẩm</a>
	</div>
@endsection

@section('title')
<title>Hoàng Tú - Phụ kiện máy tính</title>
@endsection