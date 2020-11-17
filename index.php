<?php
include 'core/init.php';
if ($getFromU->loggedIn() === true) {
	header('Location: home.php');
}

?>
<html>

<head>
	<title>Logisc</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" />
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<link rel="stylesheet" href="assets/css/style-complete.css" />
</head>
<!--Helvetica Neue-->

<body>
	<div class="front-img">
		<img src="assets/images/background.jpg"></img>
	</div>

	<div class="wrapper">
		<!-- header wrapper -->
		<div class="header-wrapper">

			<div class="nav-container">
				<!-- Nav -->
				<div class="nav">

					<div class="nav-left">
						<ul>
							<li><i class="fa fa-logisc" aria-hidden="true"></i><a href="#">Trang chủ</a></li>
							<li><a href="#">Về chúng tôi</a></li>
						</ul>
					</div><!-- nav left ends-->

					<div class="nav-right">
						<ul>
							<li><a href="#">Ngôn ngữ</a></li>
						</ul>
					</div><!-- nav right ends-->

				</div><!-- nav ends -->

			</div><!-- nav container ends -->

		</div><!-- header wrapper end -->

		<!---Inner wrapper-->
		<div class="inner-wrapper">
			<!-- main container -->
			<div class="main-container">
				<!-- content left-->
				<div class="content-left">
					<h1>Bài tập lớn CĐ Công nghệ phần mềm</h1>
					<br />
					<p>Lê Nguyễn Duy Quang - Trần Văn Toàn</p>
				</div><!-- content left ends -->

				<!-- content right ends -->
				<div class="content-right">
					<!-- Log In Section -->
					<div class="login-wrapper">
						<?php include 'includes/login.php'; ?>
					</div><!-- log in wrapper end -->

					<!-- SignUp Section -->
					<div class="signup-wrapper">
						<?php include 'includes/signup-form.php'; ?>
					</div>
					<!-- SIGN UP wrapper end -->

				</div><!-- content right ends -->

			</div><!-- main container end -->

		</div><!-- inner wrapper ends-->
	</div><!-- ends wrapper -->
</body>

</html>