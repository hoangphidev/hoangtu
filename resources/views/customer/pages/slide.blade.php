@extends('customer.layout.index')
@section('main')
<div id="wrap-inner">
	<div id="product-info">
		<div class="clearfix"></div>
		<h3>{{$sl->name}}</h3>
		<div class="row"">
			<img src="upload/banner/{{$sl->images}}">
		</div>							
	</div>
	<div id="product-detail">
		<h3>Chi tiết khuyến mại</h3>
		<p class="text-justify" style="line-height: 28px;">{{$sl->description}}.</p>
	</div>
</div>
@endsection
@section('title')
<title>{{$sl->name}}</title>
@endsection