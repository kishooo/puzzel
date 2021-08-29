<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Home - Ufivada</title>

	<!-- Main Styles -->
	<link rel="stylesheet" href="{{ asset('assets/styles/style.min.css')}}">

	<!-- Material Design Icon -->
	<link rel="stylesheet" href="{{ asset('assets/fonts/material-design/css/materialdesignicons.css')}}">

	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="{{ asset('assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css')}}">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="{{ asset('assets/plugin/waves/waves.min.css')}}">

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="{{ asset('assets/plugin/sweet-alert/sweetalert.css')}}">

	<!-- Morris Chart -->
	<link rel="stylesheet" href="{{ asset('assets/plugin/chart/morris/morris.css')}}">

    <!-- Table Responsive -->
	<link rel="stylesheet" href="{{ asset('assets/plugin/RWD-table-pattern/css/rwd-table.min.css')}}">

	<!-- FullCalendar -->
	<link rel="stylesheet" href="{{ asset('assets/plugin/fullcalendar/fullcalendar.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/plugin/fullcalendar/fullcalendar.print.css')}}" media='print'>

	<!-- RTL -->
	<link rel="stylesheet" href="{{ asset('assets/styles/style-rtl.min.css')}}">
</head>

<body>
<div class="main-menu">
	<header class="header">
		<a href="index.html" class="logo"><i class="ico mdi mdi-cube-outline"></i>Ufivada</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
		<div class="user">
			<a href="#" class="avatar"><img src="assets/images/avatar-sm-5.jpg" alt=""><span class="status online"></span></a>
			<h5 class="name"><a href="profile.html">{{ Auth::user()->name }}</a></h5>
			<h5 class="position">Administrator</h5>
			<!-- /.name -->
			<div class="control-wrap js__drop_down">
				<i class="fa fa-caret-down js__drop_down_button"></i>
				<div class="control-list">
					<div class="control-item"><a href="#"><i class="fa fa-gear"></i> الاعدادات</a></div>
					<!--<div class="control-item"><a href="login"><i class="fa fa-sign-out"></i>  تسجيل الخروج</a></div>!-->
					<form class="control-item" action="/admin/logout" method="post">
						@csrf
						<button class="control-item" type="submit"><i class="fa fa-sign-out"></i>تسجيل الخروج</button>
					</form>
				</div>
				<!-- /.control-list -->
			</div>
			<!-- /.control-wrap -->
		</div>
		<!-- /.user -->
	</header>
	<!-- /.header -->
	<div class="content">

		<div class="navigation">
			<!-- /.title -->
			<ul class="menu js__accordion">
				<li>
					<a class="waves-effect" href="/admin/{{ Auth::user()->id }}"><i class="menu-icon mdi mdi-view-dashboard"></i><span>الرئيسية</span></a>
				</li>
				<li>
					<a class="waves-effect" href="/admin/ShowUsers/{{ Auth::user()->id }}"><i class="menu-icon mdi mdi-desktop-mac"></i><span>عرض المستخدمين</span></a>
				</li>
				<li>
					<a class="waves-effect" href="/admin/online/products/{{ Auth::user()->id }}"><i class="menu-icon mdi mdi-cube-outline"></i><span> عرض المنتجات</span></a>
				</li>
				<li>
					<a class="waves-effect" href="/admin/create/{{ Auth::user()->id }}"><i class="menu-icon mdi mdi-calendar"></i><span>إضافة منتجات جديدة</span></a>
				</li>
				<li>
					<a class="waves-effect" href="/admin/ShowReviewAdmin/{{ Auth::user()->id }}"><i class="menu-icon mdi mdi-fire"></i><span>عرض التقييمات</span></a>
				</li>
				<li>
					<a class="waves-effect" href="/admin/ShowOrders/{{ Auth::user()->id }}"><i class="menu-icon mdi mdi-email"></i><span>عرض الطلابات</span></a>
				</li>
				<li>
					<a class="waves-effect" href="/admin/online/outOfStock/{{ Auth::user()->id }}"><i class="menu-icon mdi mdi-chart-areaspline"></i><span>إنتهى من المخزن</span><span class="notice notice-danger">جديد</span></a>
				</li>
			</ul>
		</div>
		<!-- /.navigation -->
	</div>
	<!-- /.content -->
</div>
<!-- /.main-menu -->

<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">
		<div class="ico-item">
			<a href="#" class="ico-item mdi mdi-magnify js__toggle_open" data-target="#searchform-header"></a>
			<form action="#" id="searchform-header" class="searchform js__toggle"><input type="search" placeholder="Search..." class="input-search"><button class="mdi mdi-magnify button-search" type="submit"></button></form>
			<!-- /.searchform -->
		</div>
		<!-- /.ico-item -->
		<a href="#" class="ico-item pulse"><span class="ico-item mdi mdi-bell notice-alarm js__toggle_open" data-target="#notification-popup"></span></a>
	</div>
	<!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->

<div id="notification-popup" class="notice-popup js__toggle" data-space="75">
	<h2 class="popup-title">Your Notifications</h2>
	<!-- /.popup-title -->
	<div class="content">
		<ul class="notice-list">
			<li>
				<a href="#">
					<span class="avatar"><img src="assets/images/avatar-sm-1.jpg" alt=""></span>
					<span class="name">John Doe</span>
					<span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
					<span class="time">10 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="assets/images/avatar-sm-2.jpg" alt=""></span>
					<span class="name">Anna William</span>
					<span class="desc">Like your post: “Facebook Messenger”</span>
					<span class="time">15 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar bg-warning"><i class="fa fa-warning"></i></span>
					<span class="name">Update Status</span>
					<span class="desc">Failed to get available update data. To ensure the please contact us.</span>
					<span class="time">30 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="assets/images/avatar-1.jpg" alt=""></span>
					<span class="name">Jennifer</span>
					<span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
					<span class="time">45 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="assets/images/avatar-sm-6.jpg" alt=""></span>
					<span class="name">Michael Zenaty</span>
					<span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
					<span class="time">50 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="assets/images/avatar-sm-4.jpg" alt=""></span>
					<span class="name">Simon</span>
					<span class="desc">Like your post: “Facebook Messenger”</span>
					<span class="time">1 hour</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar bg-violet"><i class="fa fa-flag"></i></span>
					<span class="name">Account Contact Change</span>
					<span class="desc">A contact detail associated with your account has been changed.</span>
					<span class="time">2 hours</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="assets/images/avatar-sm-7.jpg" alt=""></span>
					<span class="name">Helen 987</span>
					<span class="desc">Like your post: “Facebook Messenger”</span>
					<span class="time">Yesterday</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="assets/images/avatar-2.jpg" alt=""></span>
					<span class="name">Denise Jenny</span>
					<span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
					<span class="time">Oct, 28</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="assets/images/avatar-sm-8.jpg" alt=""></span>
					<span class="name">Thomas William</span>
					<span class="desc">Like your post: “Facebook Messenger”</span>
					<span class="time">Oct, 27</span>
				</a>
			</li>
		</ul>
		<!-- /.notice-list -->

	</div>
	<!-- /.content -->
</div>
<!-- /#notification-popup -->


@yield('content')


<footer class="footer">
    <ul class="list-inline">
        <li>2021 © PUZZLE</li>
    </ul>
</footer>
</div>
<!-- /.main-content -->
</div><!--/#wrapper -->
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="assets/script/html5shiv.min.js"></script>
<script src="assets/script/respond.min.js"></script>
<![endif]-->
<!--
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../../../../../assets/scripts/jquery.min.js"></script>
<script src="../../../../../assets/scripts/modernizr.min.js"></script>
<script src="../../../../../assets/plugin/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../../../assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="../../../../../assets/plugin/nprogress/nprogress.js"></script>
<script src="../../../../../assets/plugin/sweet-alert/sweetalert.min.js"></script>
<script src="../../../../../assets/plugin/waves/waves.min.js"></script>

<!-- Morris Chart -->
<script src="../../../../assets/plugin/chart/morris/morris.min.js"></script>
<script src="../../../../assets/plugin/chart/morris/raphael-min.js"></script>
<script src="../../../../assets/scripts/chart.morris.init.min.js"></script>

<!-- Flot Chart -->
<script src="../../../assets/plugin/chart/plot/jquery.flot.min.js"></script>
<script src="../../../assets/plugin/chart/plot/jquery.flot.tooltip.min.js"></script>
<script src="../../../assets/plugin/chart/plot/jquery.flot.categories.min.js"></script>
<script src="../../../assets/plugin/chart/plot/jquery.flot.pie.min.js"></script>
<script src="../../../assets/plugin/chart/plot/jquery.flot.stack.min.js"></script>
<script src="../../../assets/scripts/chart.flot.init.min.js"></script>

<!-- Sparkline Chart -->
<script src="../../../assets/plugin/chart/sparkline/jquery.sparkline.min.js"></script>
<script src="../../../assets/scripts/chart.sparkline.init.min.js"></script>

<!-- FullCalendar -->
<script src="../../../assets/plugin/moment/moment.js"></script>
<script src="../../../assets/plugin/fullcalendar/fullcalendar.min.js"></script>
<script src="../../../assets/scripts/fullcalendar.init.js"></script>

<!-- Responsive Table -->
<script src="../../../assets/plugin/RWD-table-pattern/js/rwd-table.min.js"></script>
<script src="../../../assets/scripts/rwd.demo.min.js"></script>

<!-- Jquery UI -->
<script src="../../../assets/plugin/jquery-ui/jquery-ui.min.js"></script>
<script src="../../../assets/plugin/jquery-ui/jquery.ui.touch-punch.min.js"></script>

<script src="../../../assets/scripts/main.min.js"></script>
</body>
</html>
