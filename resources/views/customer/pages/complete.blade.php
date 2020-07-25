@extends('customer.layout.index')
@section('main')

<div id="wrap-inner">
	<div id="complete">
		<p class="info">Quý khách đã đặt hàng thành công!</p>
		<p>• Hóa đơn mua hàng của Quý khách đã được chuyển đến Địa chỉ Email có trong phần Thông tin Khách hàng của chúng tôi</p>
		<p>• Sản phẩm của Quý khách sẽ được chuyển đến Địa có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.</p>
		<p>• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng</p>
		<p>• Địa chỉ: 162 Lê Thanh Nghị, Hà Nội</p>
		<p>Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</p>
	</div>
	<p class="text-right return"><a href="{{route('customer.home')}}">Quay lại trang chủ</a></p>
</div>
@endsection
@section('title')
<title>Đặt hàng thành công - Hoàng Tú | Phụ kiện máy tính, đổ mực máy in ...</title>
@endsection