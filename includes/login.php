<?php
    if (isset($_POST['login']) && !empty($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

    if (!empty($email) or !empty($password)) {
        $email = $getFromU->checkInput($email);
        $password = $getFromU->checkInput($password);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Sai định dạng email";
        }else{
            if($getFromU->login($email, $password)===false){
                $error = "Sai tài khoản hoặc mật khẩu";
            }
        }
    }else{
        $error = "Nhập vào tài khoản và mật khẩu";
    }
}
?>

<div class="login-div">
    <form method="post">
    <h3>Đăng nhập </h3>
        <ul>
            <li>
                <input type="text" name="email" placeholder="Email" />
            </li>
            <li>
                <input type="password" name="password" placeholder="Mật khẩu" /><input type="submit" name="login"
                    value="Đăng nhập" />
            </li>
            <li>
                <input type="checkbox" Value="Remember me">Ghi nhớ đăng nhập
            </li>
        </ul>
        <?php
            if(isset($error)){
                echo '<li class="error-li">
                <div class="span-fp-error">'.$error.'</div>
            </li>';
            }
        ?>
    </form>
</div>