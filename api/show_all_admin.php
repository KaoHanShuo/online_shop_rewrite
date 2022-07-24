<?php
if(!isset($_SESSION)){//判斷session是否已啟動
    session_start();
}

$_SESSION['show_admin_all'][$_POST['key']] = $_POST['account'];
?>