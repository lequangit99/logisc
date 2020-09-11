<?php
    $dsn = 'mysql:host=localhost; dbname=logisc';
    $user = 'root';
    $pass = 'lequang99';

    try {
        $pdo = new PDO($dsn,$user,$pass);
    } catch (PDOException $e) {
       echo 'Lỗi kết nối ' . $e->getMessage();
    }
?>