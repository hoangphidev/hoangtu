@extends('customer.layout.index')
@section('main')
<div id="wrap-inner">
	<div class="products">
		<h3>{{$cates->name}}</h3>
		<div class="product-list row">
			@foreach($products as $sp)
			<div class="product-item col-md-3 col-sm-6 col-xs-12">
				<img height="150px" src="upload/product/{{$sp->getCate['unsigned_name']}}/{{$sp->images}}" class="img-thumbnail">
				<p>{{str_limit($sp->name,30)}}</p>
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
				<div class="marsk">
					<a href="{{asset('detail/'.$sp->id.'/'.$sp->unsigned_name.'.html')}}">Xem chi tiết</a>
				</div>                                    
			</div>
			@endforeach
		</div>                	                	
	</div>

	<div id="pagination" class="pagination justify-content-center pagination-lg">
		{{$products->links()}}
	</div>
</div>
@endsection
@section('title')
<title>{{$cates->name}} - Hoàng Tú | Phụ kiện máy tính, đổ mực máy in ...</title>
@endsection