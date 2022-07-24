<?php
if(!isset($_SESSION)){//判斷session是否已啟動
    session_start();
}

//user的token存入session
if($_POST['type'] == "get_token"){
    $_SESSION['token'] = $_POST['token'];
}

//取得user名字
if($_POST['type'] == "get_user"){
    $_SESSION['user'] = $_POST['user']; 
}

//釋放session裡的token跟user
if($_POST['type'] == "escape_token"){
    echo $_SESSION['token'];
    unset($_SESSION['token']);
    unset($_SESSION['user']);
}

//取得admin的token跟account
if($_POST['type'] == "get_admin_token"){
    $_SESSION['token'] = $_POST['token'];
    $_SESSION['admin'] = $_POST['account'];
    //echo $_SESSION['admin'];
}
?>