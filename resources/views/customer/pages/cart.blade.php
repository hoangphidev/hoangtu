@extends('customer.layout.index')
@section('main')
<script type="text/javascript">
	function UpDateCart(quantity,id){
		$.get('{{asset('cart/updatecart')}}',{quantity:quantity,id:id},function(){location.reload();});
	}
</script>
<div id="wrap-inner">
	<div id="list-cart">
		<h3>Giỏ hàng</h3>
		<form>
			@if (\Session::has('errorcart'))
			    <div class="alert alert-success text-center">
					<h2>{!! \Session::get('errorcart') !!}</h2>
			    </div>
			@endif
			<table class="table table-bordered .table-responsive text-center">
				<tr class="active">
					<td width="11.111%">Ảnh mô tả</td>
					<td width="22.222%">Tên sản phẩm</td>
					<td width="22.222%">Số lượng</td>
					<td width="16.6665%">Đơn giá</td>
					<td width="16.6665%">Thành tiền</td>
					<td width="11.112%">Xóa</td>
				</tr>
				<?php $test = 0;?>
				@foreach(Cart::getContent() as $cart)
				<tr>
					<td ><img style="width: 100%;" class="img-responsive" src="upload/product/{{$cart->attributes->cate_name}}/{{$cart->attributes->images}}"></td>
					<td>{{$cart->name}}</td>
					<td>
						<div class="form-group">
							<input class="form-control" type="number" value="{{$cart->quantity}}" onchange="UpDateCart(this.value,'{{$cart->id}}')">
						</div>
					</td>
					<?php 
						//var_dump($cart->attributes->percent_promotion);
						$price = $cart->price - ($cart->price * $cart->attributes->percent_promotion)/100;
						$test +=$price * $cart->quantity;
						//var_dump($test);
					 ?>
					<td><span class="price">{{number_format($price)}} đ</span></td>
					<td><span class="price">{{number_format($price * $cart->quantity)}} đ</span></td>
					<td><a href="{{asset('cart/deletecart/'.$cart->id)}}">Xóa</a></td>
				</tr>
				@endforeach
			</table>
			<div class="row" id="total-price">
				<div class="col-md-6 col-sm-12 col-xs-12">										
						Tổng thanh toán: <span class="total-price">{{Number_format($test)}} đ</span>
																								
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<a style="width: 30%; border-color: #ebdac1; padding: 10px;" href="{{route('customer.home')}}" class="my-btn btn">Mua tiếp</a>
					<!-- <a style="width: 30%;border-color: #ebdac1;" href="#" class="my-btn btn">Cập nhật</a> -->
					<a style="width: 30%;border-color: #ebdac1; padding: 10px;" href="{{asset('cart/deletecart/DelAll')}}" class="my-btn btn">Xóa giỏ hàng</a>
				</div>
			</div>
		</form>             	                	
	</div>

	<div id="xac-nhan">
		<h3>Xác nhận mua hàng</h3>
		<form action="{{asset('cart/postcart')}}" method="post">
			@csrf
			<input type="text" name="total" value="<?php echo $test; ?>" hidden>
			<div class="form-group">
				<label for="email">Email address:</label>
				<input required type="email" class="form-control" id="email" name="email" placeholder="username@domain.com">
			</div>
			<div class="form-group">
				<label for="name">Họ và tên:</label>
				<input required type="text" class="form-control" id="name" name="name" placeholder="Nguyễn Thị C">
			</div>
			<div class="form-group">
				<label for="phone">Số điện thoại:</label>
				<input required type="number" class="form-control" id="phone" name="phone" placeholder="0988 666 999">
			</div>
			<div class="form-group">
				<label for="add">Địa chỉ:</label>
				<input required type="text" class="form-control" id="add" name="add" placeholder="xã A, huyện B, tỉnh C">
			</div>
			<div class="form-group text-right">
				<button type="submit" class="btn btn-default">Thực hiện đơn hàng</button>
			</div>
		</form>
	</div>
</div>
@endsection
@section('title')
<title>Hoàng Tú - Giỏ hàng</title>
@endsection