<?php

if ($_SERVER['REQUEST_METHOD'] == "GET" && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
  header('Location: ../index.php');
}
if (isset($_POST['login']) && !empty($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (!empty($email) or !empty($password)) {
    $email = $getFromU->checkInput($email);
    $password = $getFromU->checkInput($password);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errorMsg = "Invalid format";
    } else {
      if ($getFromU->login($email, $password) === false) {
        $errorMsg = "The email or password is incorrect!";
      }
    }
  } else {
    $errorMsg = "Please enter username and password!";
  }
}
?>

<div class="login-div">
  <form method="post">
    <ul>
      <li>
        <input type="text" name="email" placeholder="Nhập email của bạn" />
      </li>
      <li>
        <input type="password" name="password" placeholder="Mật khẩu" /><input type="submit" name="login" value="Đăng nhập" />
      </li>
      <li>
        <input type="checkbox" Value="Remember me">Ghi nhớ đăng nhập
      </li>
      <?php
      if (isset($errorMsg)) {
        echo '<li class="error-li">
        <div class="span-fp-error">' . $errorMsg . '</div>
        </li>';
      }
      ?>
    </ul>

  </form>
</div>