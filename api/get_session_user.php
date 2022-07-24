<?php
if(!isset($_SESSION)){//判斷session是否已啟動
    session_start();
}
    $_SESSION['user'] = $_POST['user']; 
?>