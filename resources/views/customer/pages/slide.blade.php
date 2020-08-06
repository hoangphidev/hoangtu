@extends('customer.layout.index')
@section('main')
<div id="wrap-inner">
	<div id="product-info">
		<div class="clearfix"></div>
		<h3>{{$sl->name}}</h3>
		<div class="row">
			<img src="upload/banner/{{$sl->images}}">
		</div>							
	</div>
	<div id="product-detail">
		<h3>Chi tiết khuyến mại</h3>
		<p class="text-justify" style="line-height: 28px;">{{$sl->description}}.</p>
	</div>

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
@endsection
@section('title')
<title>{{$sl->name}}</title>
@endsection