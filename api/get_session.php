<?php
if(!isset($_SESSION)){//判斷session是否已啟動
    session_start();
}

if($_POST['type'] == "get_login"){
    $_SESSION['token'] = $_POST['token'];
    //$_SESSION['token_type'] = $_POST['token_type'];
    //echo $_POST['token'];
}

if($_POST['type'] == "get_token"){
    echo $_SESSION['token'];
    unset($_SESSION['token']);
    unset($_SESSION['user']);
}
?>