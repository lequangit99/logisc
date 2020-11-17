<?php

if (isset($_POST['signup'])) {
	$screenName = $_POST['screenName'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$error = '';

	if (empty($screenName) or empty($password) or empty($email)) {
		$error = 'Điền đầy đủ thông tin';
	} else {
		$email = $getFromU->checkInput($email);
		$screenName = $getFromU->checkInput($screenName);
		$password = $getFromU->checkInput($password);

		if (!filter_var($email)) {
			$error = 'Sai định dạng email!';
		} else if (strlen($screenName) > 20) {
			$error = 'Tên không được quá 20 ký tự';
		} else if (strlen($password) < 5) {
			$error = 'Mật khẩu quá ngắn';
		} else {
			if ($getFromU->checkEmail($email) === true) {
				$error = 'Email này đã được sử dụng';
			} else {
				$password = md5($password);
				$user_id = $getFromU->create('users', array('email' => $email, 'password' => $password, 'screenName' => $screenName, 'profileImage' => 'assets/images/defaultprofileimage.png', 'profileCover' => 'assets/images/defaultCoverImage.png'));
				$_SESSION['user_id'] = $user_id;
				header('Location: includes/signup.php?step=1');
			}
		}
	}
}
?>
<form method="post">
	<div class="signup-div">
		<h3>Đăng ký ngay </h3>
		<ul>
			<li>
				<input type="text" name="screenName" placeholder="Họ tên" />
			</li>
			<li>
				<input type="email" name="email" placeholder="Email" />
			</li>
			<li>
				<input type="password" name="password" placeholder="Mật khẩu" />
			</li>
			<li>
				<input type="submit" name="signup" Value="Đăng ký">
			</li>
			<?php
			if (isset($error)) {
				echo '<li class="error-li">
                <div class="span-fp-error">' . $error . '</div>
                </li>';
			}
			?>
		</ul>

	</div>
</form>