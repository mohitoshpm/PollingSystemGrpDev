<?php
if($_COOKIE["IsLogin"]) {
    session_destroy();

    setcookie("IsLogin",false, time() - (86400 * 30), "/"); // 86400 = 1 day
    setcookie("Id",0, time() - (86400 * 30), "/"); // 86400 = 1 day
    setcookie("FullName","", time() - (86400 * 30), "/"); // 86400 = 1 day
    setcookie("Email","", time() - (86400 * 30), "/"); // 86400 = 1 day

    header("location: login.php");
}else{
    header("location: login.php");
}
?>