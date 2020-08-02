<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<base href="{{asset('')}}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	@yield('title')
	<link rel="icon" type="image/ico" href="assets\images\fav.ico" />
	<link rel="stylesheet" href="{{asset('customer/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('customer/css/home.css')}}">
	<link rel="stylesheet" href="{{asset('customer/css/details.css')}}">
	@include('customer.layout.css')
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">
		$(function() {
			var pull        = $('#pull');
			menu        = $('nav ul');
			menuHeight  = menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
		});

		$(window).resize(function(){
			var w = $(window).width();
			if(w > 320 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});
	</script>
</head>
<body>    
	<!-- header -->
	<header id="header">
		<div class="container">
			<div class="row">
				<div id="logo" class="col-md-3 col-sm-12 col-xs-12">
					<h1>
						<a href="{{route('customer.home')}}"><img width="70%" src="assets\images\logo_light_ui.png"></a>						
						<nav><a id="pull" class="btn btn-danger" href="#">
							<i class="fa fa-bars"></i>
						</a></nav>			
					</h1>
				</div>
				<div id="search" class="col-md-7 col-sm-12 col-xs-12">
					<form action="{{asset('seach')}}" method="get">
						@csrf
						<input type="text" id="search-box" name="seach" style="border-radius: 8px; margin-right: 8px;" placeholder="Nhập từ khóa tìm kiếm">
						<input type="submit" name="submit" style="border-radius: 8px; font-size: 15px; color: #000;" value="Tìm Kiếm">
					</form>
				</div>
				<div id="cart" class="col-md-2 col-sm-12 col-xs-12">
					<a href="{{asset('cart/showcart')}}">{{ Cart::getContent()->count()}}</a>				    
				</div>
			</div>			
		</div>
	</header><!-- /header -->
	<!-- endheader -->

	<!-- main -->
	<section id="body">
		<div class="container">
			<div class="row">
				<div id="sidebar" class="col-md-3">
					<nav id="menu">
						<ul>
							<li class="menu-item">danh mục sản phẩm</li>
							@foreach($cate as $ct)
								@if($ct->status == 1)
								<li class="menu-item">
									<a href="{{asset('category/'.$ct->id.'/'.$ct->unsigned_name.'')}}" title="">{{$ct->name}}</a>
								</li>
								@endif
							@endforeach			
						</ul>
					</nav>

					<div id="banner-l" class="text-center">
						@foreach($slide as $sl)
							@if($sl->locate==2)
								<div class="banner-l-item">
									<a href="{{route('bannerdetail', ['id'=>$sl['id'], 'unsigned_name'=>$sl['unsigned_name']])}}"><img src="upload/banner/{{$sl->images}}" alt="{{$sl->unsigned_name}}" class="img-thumbnail"></a>
								</div>
							@endif
						@endforeach
					</div>
				</div>

				<div id="main" class="col-md-9">
					@yield('main')
				</div>
			</div>
		</div>
	</section>
	<!-- endmain -->

	<!-- footer -->
	<footer id="footer">			
		<div id="footer-t">
			<div class="container">
				<div class="row" style="margin-bottom: 15px;">				
					<div id="about" class="col-md-4 col-sm-12 col-xs-12">
						<h3>Thông tin hỗ trợ</h3>
						<div>
							<a href="{{route('customer.home')}}" class="non-textdecoration">
								<span class="text-white">Trang chủ</span>
							</a>
						</div>
						<div>	
							<a href="{{route('customer.about')}}" class="non-textdecoration">
								<span class="text-white">Giới thiệu</span>
							</a>
						</div>
						<div>
							<a href="{{route('customer.ship')}}" class="non-textdecoration">
								<span class="text-white">Chính sách mua hàng</span>
							</a>
						</div>
					</div>
					<div id="hotline" class="col-md-4 col-sm-12 col-xs-12">
						<h3>Thông tin liên lạc</h3>
						<div>
							Hotline: 
							<a href="tel:0965650455" class="non-textdecoration">
								<span class="text-white">(+84) 965 650 455</span>
							</a>
						</div>
						<div>
							Email: 
							<a href="mailto:contact@hoangtu.com" class="non-textdecoration">
								<span class="text-white">contact@hoangtu.com</span>
							</a>
						</div>
					</div>
					<div id="contact" class="col-md-4 col-sm-12 col-xs-12">
						<h3>Khu vực phía Bắc</h3>
						<p>Trụ sở chính: 162 Lê Thanh Nghị, Hà Nội</p>
					</div>
				</div>				
			</div>
			<div id="footer-b">				
				<div class="container">
					<div class="row">
						<div id="footer-b-l" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>Hoàng Tú - Phụ kiện máy tính số một Việt Nam</p>
						</div>
						<div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>© 2020 <a href="{{route('customer.home')}}" class="non-textdecoration"><span class="text-white font-weight-bold">Hoàng Tú</span></a>. All Rights Reserved</p>
						</div>
					</div>
				</div>
				<div id="scroll">
					<a href="{{route('customer.home')}}"><img src="customer/img/home/scroll.png"></a>
				</div>	
			</div>
		</div>
	</footer>
	<!-- endfooter -->

	<div class="zalo-chat-widget mb-5" data-oaid="3927420380731793348" data-welcome-message="Chào bạn ! Rất vui khi được hỗ trợ bạn !" data-autopopup="20" data-width="400" data-height="400"></div>

	<script src="https://sp.zalo.me/plugins/sdk.js"></script>

	<!-- Load Facebook SDK for JavaScript -->
	<div id="fb-root"></div>
	<script>
		window.fbAsyncInit = function() {
			FB.init({
				xfbml            : true,
				version          : 'v7.0'
			});
		};

		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
  	</script>
  	
	<div class="fb-customerchat"
		attribution=setup_tool
		page_id="101000914811077"
		theme_color="#fa3c4c"
		logged_in_greeting="Chào bạn, chúng tôi có thể giúp gì cho bạn ?"
		logged_out_greeting="Chào bạn, chúng tôi có thể giúp gì cho bạn ?">
	</div>
	<script type="text/javascript" src="{{asset('customer/js/jquery-3.2.1.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script type="text/javascript" src="{{asset('customer/js/bootstrap.min.js')}}"></script>
	@include('customer.layout.ajax')
</body>
</html>