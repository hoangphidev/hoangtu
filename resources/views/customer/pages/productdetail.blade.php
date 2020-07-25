@extends('customer.layout.index')
@section('main')
<div id="wrap-inner">
	<div id="product-info">
		<div class="clearfix"></div>
		<h3>{{$product->name}}</h3>
		<div class="row"">
			<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center mb-3">
				<img style="margin-top:10px;margin-bottom:10px;" height="100%"  width="100%" src="upload/product/{{$product->getCate['unsigned_name']}}/{{$product->images}}">
			</div>
			<div id="product-details" class="col-xs-12 col-sm-12 col-md-9" style="padding-left: 0%;">
				<?php if ($product->percent_promotion == null): ?>
					<p style="margin-top: 30px;padding-bottom: 0px; margin-bottom: 0px;">Giá: <span class="price">{{number_format($product->price)}} đ</span></p>

					<?php if($product->amount > 0): ?>
						<p style="">Trạng thái: <b style="color: #00AE03">Còn hàng</b></p>
						<p class="add-cart text-center" style="width: 50%; border-radius: 8px;"><a href="{{asset('cart/addcart/'.$product->id)}}">Đặt hàng online</a></p>
					<?php endif ?>
					<?php if($product->amount <= 0): ?>
						<p style="">Trạng thái: <b style="color: #A12222">Tạm hết hàng</b></p>
						<p class="add-cart text-center" style="width: 50%; border-radius: 8px;" hidden><a href="{{asset('cart/addcart/'.$product->id)}}">Thêm vào giỏ hàng</a></p>
					<?php endif ?>
				<?php endif ?>

				<?php if ($product->percent_promotion != null): ?>
					<?php $price = ($product->price) - (($product->price)*($product->percent_promotion))/100 ?>
					<p style="margin-top: 15px;">Khuyến mại: <span class="price">{{number_format($price)}} đ</span></p>
					
					<p>Giá cũ: 
						<s>
							<span>{{number_format($product->price)}} đ</span>
						</s>
					</p>

					<p>
						Thời gian: Từ {{$product->start_promotion->format('d/m/Y')}} đến {{$product->end_promotion->format('d/m/Y')}}
					</p>

					<?php if($product->amount > 0): ?>
						<p style="">Trạng thái: <b style="color: #00AE03">Còn hàng</b></p>
						<p class="add-cart text-center" style="width: 50%; border-radius: 8px;"><a href="{{asset('cart/addcart/'.$product->id)}}">Đặt hàng online</a></p>
					<?php endif ?>
					<?php if($product->amount <= 0): ?>
						<p style="">Trạng thái: <b style="color: #A12222">Tạm hết hàng</b></p>
						<p class="add-cart text-center" style="width: 50%; border-radius: 8px;" hidden><a href="{{asset('cart/addcart/'.$product->id)}}">Thêm vào giỏ hàng</a></p>
					<?php endif ?>
				<?php endif ?>

			</div>
		</div>							
	</div>
	<div id="product-detail">
		<h3>Chi tiết sản phẩm</h3>
		<p class="text-justify" style="line-height: 28px;">{{$product->description}}.</p>
	</div>

	<div id="comment">
		<h3>Bình luận</h3>
		<div class="col-md-9 comment mt-2">
			<form action="{{asset('detail/'.$product->id.'/'.$product->unsigned_name.'.html')}}" method="post">
				@csrf
				<div class="form-group row">
					<div class="form-group col-6">
						<label for="name">Họ Tên:</label>
						<input required type="text" class="form-control" id="name" name="name">
					</div>
					<div class="form-group col-6">
						<label for="email">Email:</label>
						<input required type="email" class="form-control" id="email" name="email">
					</div>
				</div>
				<div class="form-group">
					<label for="cm">Nội dung ý kiến:</label>
					<textarea required rows="3" id="cm" class="form-control" name="content"></textarea>
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-default">Đánh giá sản phẩm</button>
				</div>
			</form>
		</div>
	</div>
	<div id="comment-list">
		@foreach($comments as $cmt)
		<ul>
			<li class="com-title">
				{{$cmt->name}}
				<br>
				<span>{{date_format($cmt->created_at,"d/m/Y H:i:s")}}</span>	
			</li>
			<li class="com-details">
				{{$cmt->body}}
			</li>
		</ul>
		@endforeach
	</div>
</div>
@endsection
@section('title')
<title>{{$product->name}}</title>
@endsection