<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>ufida</title>
	<link rel="stylesheet" href="../assets/styles/style.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="../assets/plugin/waves/waves.min.css">

	<!-- RTL -->
	<link rel="stylesheet" href="../assets/styles/style-rtl.min.css">
</head>

<body>

<div id="single-wrapper">
	<form action="/admin/login" method="post" class="frm-single">
		<?php echo csrf_field(); ?>
		<div class="inside">
			<div class="title"><strong>ufida</strong>Admin</div>
			<!-- /.title -->
			<div class="frm-title">Login</div>
			<!-- /.frm-title -->
			<div class="frm-input"><input name="email" type="text" placeholder="Username" class="frm-inp"><i class="fa fa-user frm-ico"></i></div>
			<!-- /.frm-input -->
			<div class="frm-input"><input name="Password"type="password" placeholder="Password" class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>
			<!-- /.frm-input -->

			<!-- /.clearfix -->
			<button type="submit" class="frm-submit">Login<i class="fa fa-arrow-circle-right"></i></button>

			<!-- /.row -->
			<div class="frm-footer">Puzzle © 2021.</div>
			<!-- /.footer -->
		</div>
		<!-- .inside -->
	</form>
	<!-- /.frm-single -->
</div><!--/#single-wrapper -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!--
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>

	<script src="assets/scripts/main.min.js"></script>
</body>
</html>
<?php /**PATH D:\laravel\htdocs\laravel\ufida\resources\views/login.blade.php ENDPATH**/ ?>