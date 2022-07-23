<!-- 主頁 -->
<?php 
//include_once "base_inc.php";
//require 'vendor/autoload.php';
//if(!isset($_SESSION))session_start();
//ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>online_shop</title>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="./js/js.js"></script>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="./css/css.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!--回首頁 | 最新消息 | 購物流程 | 購物車 | 會員登入 | 管理登入 -->
    <!-- 上半部 -->
    <div class="row py-2 px-5">
        <div class="d-flex justify-content-end px-5 gy-1">
            <a class="text-dark px-2" href="?do=login"><i class="bi bi-person-fill">會員登入</i></a>
            <a class="text-dark px-2" href="?do=buycart">
                <i class="bi bi-cart-check">購物車</i>
            </a>
        </div>
    </div>
   
    <div class="row py-2">
        <div class="d-lg-flex justify-content-center">
            <h1 class="text-dark">Online_shop</h1>
        </div>
    </div>
   
    <nav class="navbar navbar-expand-lg navbar-light bg-danger rounded">
        <div class="container-fluid">
            <div class="container-xxl">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="?">回首頁</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="?do=look">關於</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="?do=news">最新消息</a>
                    </li>
                    
                    <!-- <li class="nav-item"><a class="nav-link text-light" href="?do=check_order">查詢訂單</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="?do=logout">登出</a></li> -->
                   
                </ul>
            </div>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <!-- 左邊商品及右邊欄位 -->
    <div><h1></div>
    <div class="container-fluid mb-5 ">
        <div class="row border-top px-xl-5">
            <!-- 左邊商品欄位 -->
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-danger text-white w-100"   style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">全部商品</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-pink" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 100%;min-height:300px;">
                        
                    </div>
                </nav>
            </div>
            <!-- 右邊include -->
            <div class="col-lg-9">
                <div class="square" >
                <!-- 檔案引入 -->
                    <?php
                        $do = $_GET['do'] ?? 'main';
                        $file = 'front/' . $do . ".php";
                        if(file_exists($file)){
                            include $file;
                        }else{
                            include "front/main.php";
                        }
                    ?>
                <!-- 檔案引入 -->
                </div>
            </div>
        </div>
    </div>
    <!-- -->

    <!-- Footer Start --><!-- 底部資訊 -->
    <div class="container-fluid bg-grey text-dark mt-5 pt-5 ">
        <div class="row px-xl-5 ">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 col-md-12 mb-5 pr-3 pr-xl-5 text-center">
                <a class="text-dark" href="#top">返回頂部</a>
                <p class="mb-2 pt-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>地址</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>郵件</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>聯絡電話</p>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <p class="mb-md-0 text-center  text-dark">
                    <a class="text-dark font-weight-semi-bold" href="#">
                    <a class="text-dark font-weight-semi-bold" href="">版權所有</a><br>
                </p>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- <i class="bi bi-cart-check" style="font-size: 60px"></i> -->

    
</body>

</html>

<?php
//ob_end_flush();
?>