<?php
    session_start();
    $USER = $_POST['username'];
    $_SESSION['login_user'] = $USER;
    header('Location: products.php');
    exit();
?>