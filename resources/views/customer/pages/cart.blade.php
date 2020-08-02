@extends('customer.layout.index')
@section('main')
<script type="text/javascript">
	function UpDateCart(quantity,id){
		$.get('{{asset('cart/updatecart')}}',{quantity:quantity,id:id},function(){location.reload();});
	}
</script>
<div id="wrap-inner">
	<div id="list-cart">
		<h3 class="text-center mb-4">Giỏ hàng</h3>
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
				<div class="col-md-6 col-sm-12 col-xs-12 mb-4">
					<a style="width: 30%; border-color: #ebdac1; padding: 10px;" href="{{route('customer.home')}}" class="my-btn btn mr-4">Mua tiếp</a>
					<!-- <a style="width: 30%;border-color: #ebdac1;" href="#" class="my-btn btn">Cập nhật</a> -->
					<a style="width: 30%;border-color: #ebdac1; padding: 10px;" href="{{asset('cart/deletecart/DelAll')}}" class="my-btn btn">Xóa giỏ hàng</a>
				</div>
			</div>
		</form>             	                	
	</div>

	<hr>

	<div id="xac-nhan">
		<h3 class="text-center">Xác nhận mua hàng</h3>
		<form action="{{asset('cart/postcart')}}" method="post">
			@csrf
			<input type="text" name="total" value="<?php echo $test; ?>" hidden>
			
			<div class="form-group">
				<label for="name">Họ và tên:</label>
				<input required type="text" class="form-control" id="name" name="name" placeholder="Nhập họ tên của bạn">
			</div>

			<div class="form-group">
				<label for="email">Địa chỉ Email: </label>
				<input required type="email" class="form-control" id="email" name="email" placeholder="Nhập địa chỉ email của bạn">
			</div>

			<div class="form-group">
				<label for="phone">Số điện thoại:</label>
				<input required type="number" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại của bạn">
			</div>
			<label for="add">Địa chỉ:</label>
			<div class="form-group row">
				<div class="form-group col-md-4">
					<select class="form-control choose city" id="city" name="city">
                        <option>---Chọn tỉnh / thành phố---</option>
                        <?php foreach ($city as $value): ?>
                        	<option value="{{$value->matp}}">{{$value->name}}</option>
                        <?php endforeach ?>
                    </select>
				</div>

				<div class="form-group col-md-4">
					<select class="form-control choose district" id="district" name="district">
                        <option value="">---Chọn quận / huyện---</option>
                    </select>
				</div>

				<div class="fom-group col-md-4">
					<select class="form-control" id="wards" name="wards">
                        <option value="">---Chọn phường / xã---</option>
                    </select>
				</div>
			</div>

			<div class="form-group">
				<input required type="text" class="form-control" id="add" name="add" placeholder="Nhập số nhà, tên đường ...">
			</div>

			<div class="form-group text-right">
				<button type="submit" class="btn btn-default">Thực hiện đặt hàng</button>
			</div>
		</form>
	</div>
</div>
@endsection
@section('title')
<title>Hoàng Tú - Giỏ hàng</title>
@endsection