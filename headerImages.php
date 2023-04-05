<!DOCTYPE html>
<html lang="vi-VN">
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <title>Trang chủ</title>
    <meta name="keywords" content="Thế giới di động, Thegioididong, điện thoại di động, dtdd, smartphone, tablet, máy tính bảng, laptop, máy tính xách tay, phụ kiện, smartwatch, đồng hồ, tin công nghệ" />
    <meta name="description" content="Hệ thống bán lẻ điện thoại di động, smartphone, máy tính bảng, tablet, laptop, phụ kiện, smartwatch, đồng hồ chính hãng mới nhất, giá tốt, dịch vụ khách hàng được yêu thích nhất VN" />
    <meta property="og:title" content="Thegioididong.com - Điện thoại, Laptop, Phụ kiện, Đồng hồ chính hãng" />
    <meta property="og:description" content="Hệ thống bán lẻ điện thoại di động, smartphone, máy tính bảng, tablet, laptop, phụ kiện, smartwatch, đồng hồ chính hãng mới nhất, giá tốt, dịch vụ khách hàng được yêu thích nhất VN" />
    <link rel="canonical" href="Index.php" />
    <meta property="og:image" content="https://cdn.tgdd.vn/2023/03/banner/Thumb-1200x628-3.jpg" />

    <meta content="INDEX,FOLLOW" name="robots" />
    <meta name="viewport" content="width=device-width" />
    <meta name="copyright" content="Công ty Cổ phần Thế Giới Di Động" />
    <meta name="author" content="Công ty Cổ phần Thế Giới Di Động" />
    <meta http-equiv="audience" content="General" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />
    <meta name="revisit-after" content="1 days" />
    <meta name="GENERATOR" content="Công ty Cổ phần Thế Giới Di Động" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link href="/favicon_TGDD.ico" rel="shortcut icon" type="image/x-icon" />
    <link href="/favicon_TGDD.ico" rel="apple-touch-icon" />
    <link href="/favicon_TGDD.ico" rel="apple-touch-icon-precomposed" />
    <meta property="og:site_name" content="Thegioididong.com" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="fb:pages" content="214993791879039" />
    <meta http-equiv="x-dns-prefetch-control" content="on">

    <style>
    <?php require 'styleHeaderImages.php'; ?> 
    </style>
     
    <link href="site.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

</head>


<?php 
require_once('entities/tour.class.php');
require_once('entities/phuongtien.class.php');
?>

<link href="site.css" rel="stylesheet" />

<?php 
// $prods là biến khởi tạo đối tượng từ class Product, function list_product()        //Tạo danh mục từ mã phương tiện xuất ra tên phương tiện
if (!isset($_GET["phuongtienID"])){
    $tours = Tour::list_tour();
}
else{
    $maPhuongTien = $_GET["phuongtienID"];
    $tours = Tour::list_tour_by_maPhuongTien($maPhuongTien);
}
$phuongtiens = PhuongTien::list_phuongtien();
?>


<?php 
if(isset($_POST["btnsubmit"])){
    //Lấy giá trị từ form
 
    $tenTour = $_POST["txttentour"];

    $timkiemtour = Tour::list_tour_search($tenTour);         //Hàm tìm kiếm
}
else {
    $timkiemtour = Tour::list_tour();
}

?>


<body class="theme-womendaywatch">


    
<div class="header-top-bar">
       <!-- <div class="banner-media">
                <div class="media-slider" data-size="2">
            <div class="nav">
                <div class="prev">
                    <div class="arrow-left"></div>
                </div>
                <div class="next">
                    <div class="arrow-right"></div>
                </div>
            </div>
                <div class="item" data-background-color="#FFC602" data-order="1">
                    <a aria-label="slide" data-cate="0" data-place="1612" href="Index.php" onclick="jQuery.ajax({ url: '/bannertracking?bid=71002&r='+ (new Date).getTime(), async: true, cache: false });"><img width='1200' height='44' src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/2023/02/banner/Big-chung-1200-44-1200x44.png" alt="Free Women"></a>
                </div>
                <div class="item" data-background-color="#FEF42C" data-order="3">
                    <a aria-label="slide" data-cate="0" data-place="1612" rel="nofollow" href="Index.php" onclick="jQuery.ajax({ url: '/bannertracking?bid=71831&r='+ (new Date).getTime(), async: true, cache: false });"><img width='1200' height='44' loading="lazy" class="lazyload owl-lazy" data-src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/2023/03/banner/topbar-1200-44-1200x44.png" alt="Laptop"></a>
                </div>
    </div> -->
    <style>
        .banner-media{
            background-color: #FFC602;
        }
    </style>

        </div>
</div>
<header class="header    " data-sub="0">
    <div class="header__top">
        <div>
            <a href="/" class="header__logo">
                <i class="" ></i>                      <!-- Đường dẫn logo iconnewglobal-logo-->   
                <img src="uploads/Logo Infinity.png" alt="" style="width: 100%"> 
            </a>
             <style>
        .header__top{
            background-color: skyblue;
        }
    </style>
            
    <!--<a href="Index.php" class="header__address" onclick="OpenLocation()">
        Xem giá, tồn kho tại:
        <span data-province="3" data-district="0" data-ward="0">Hồ Chí Minh</span>
    </a> --> 
<!--<form action="Index.php" onsubmit="return suggestSearch(event);" class="header__search">
    <input id="skw" type="text"  class="input-search" onkeyup="suggestSearch(event);" placeholder="Bạn tìm gì..." name="key" autocomplete="off" maxlength="100">
    <button type="submit">
        <i class="icon-search"></i>
    </button>
    <div id="search-result"></div>
    
</form> -->

<form method="post" class="header__search">

    <input id="skw" type="text"  class="input-search"  placeholder="Bạn tìm gì..." name="txttentour" autocomplete="off" maxlength="100"value="<?php echo isset($_POST["txttentour"]) ? $_POST["txttentour"] : "" ?>">

    <button type="submit" name="btnsubmit"> <i class="icon-search"></i></button>
    
</form>



<a href="Index.php" class="name-order">
    Lịch sử đơn tour
</a>

<style>
        .name-order{
            background-color: #FFC602;
        }
    </style>

<a href="tour_cart.php" class="header__cart menu-info">  <!-- Đường dẫn giỏ tour -->
    <div class="box-cart">
        <i class="iconnewglobal-cart"></i>
        <span class="cart-number"></span>
    </div>
    <span>Giỏ tour</span>
</a>

<style>
        .header__cart{
            background-color: #FFC602;
        }
    </style>

<div class="header__listtop">
    <!--<div class="divitem">
        <a href="Index.php">24h<br>Công nghệ</a>
    </div>
    <div class="bordercol"></div>
    <div class="divitem">
        <a href="Index.php">Hỏi Đáp</a>
    </div>
    <div class="bordercol"></div>
    <div class="divitem">
        <a href="Index.php">Game App</a>
    </div> -->
    
    <div class="bordercol"></div>              <!-- Dấu cách dọc -->

    <div class="divitem">
    
    <!-- Hiển thị thông tin đăng nhập tài khoản, code như phần header.php -->
    <?php
    //session_start(); //Lỗi xung đột styleHeaderImages.php
    if(isset($_SESSION['user'])!="")
    {
        echo "<h3> <b> Xin chào! </b> ".$_SESSION['user']."<a href='logout.php'> - <b> Đăng xuất </b> </a></h3>";  
    }
    else {
        echo "<h3> <a href='login.php'> <b> Đăng nhập </b> </a></h3>";  
    }
    ?>
    </div>

    <div class="bordercol"></div>              <!-- Dấu cách dọc -->
    <div class="divitem">
    <?php
    //session_start();
    if(isset($_SESSION['user'])!="")
    {
         
    }
    else {
        echo "<h3> <a href='register.php'> <b> Đăng ký </b> </a></h3>";  
    }
    ?>
    </div>

</div>

  
        </div>
    </div>
    <div class="header__main">
        <div>
                <ul class="main-menu">
                <style>
        .header__main{
            background-color: #FFC602;
        }
    </style>
                        <li class="">
                            <a href="/">
                                <span class="">Trang chủ</span>
                            </a>
                        </li>

                        <li class="has-list">
                            <a href="/">
                                <span class="has-child">Phương tiện</span>
                            </a>
                                <div class="navmwg ">
                                        <div class="item-child ">
                                                <strong>
                                                    Phương tiện Tour
                                                </strong>
                                                        <a href="danhmuc_phuongtien.php"><h3>Tất cả</h3></a>
                                                       <!-- <a href="list_tourID1.php"><h3>Ô tô</h3></a>
                                                        <a href="list_tourID2.php"><h3>Xe buýt</h3></a>
                                                        <a href="list_tourID3.php"><h3>Máy bay</h3></a> -->
                                                                                
                <?php
                foreach($phuongtiens as $item) {
                    echo "<div class='item-child'><a href=/danhmuc_phuongtien.php?phuongtienID=".$item["MaPhuongTien"]."><h3>".$item["TenPhuongTien"]."</h3></a></div>" ;
                }?>
                 
                                        </div>
                                      
                                </div>

                        </li>
                        <li class="">
                           <!-- <a href="/list_productSmartPhone.php">
                                    <i>
                                        <img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn//content/icon-phone-96x96-2.png" alt="&#x110;i&#x1EC7;n tho&#x1EA1;i" />
                                    </i>
                                <span class="">&#x110;i&#x1EC7;n tho&#x1EA1;i</span>
                            </a>
                        </li> -->
                        <!--
                        <li class="">
                            <a href="/list_productLaptop.php">
                                    <i>
                                        <img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn//content/icon-laptop-96x96-1.png" alt="Laptop" />
                                    </i>
                                <span class="">Laptop</span>
                            </a>
                        </li> -->
                        <li class="">
                        <!--<a href="/may-tinh-bang">
                                    <i>
                                        <img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn//content/icon-tablet-96x96-1.png" alt="Tablet" />
                                    </i>
                                <span class="">Tablet</span> 
                            </a> 
                        </li> -->
                       <li class="has-list">
                        <!--   <a href="/phu-kien">
                                    <i>
                                        <img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn//content/icon-phu-kien-96x96-1.png" alt="Ph&#x1EE5; ki&#x1EC7;n" />
                                    </i>
                                <span class="has-child">Ph&#x1EE5; ki&#x1EC7;n</span>
                            </a> 
                                <div class="navmwg ">
                                         <div class="item-child ">
                                                <strong>
                                                    Ph&#x1EE5; ki&#x1EC7;n di &#x111;&#x1ED9;ng
                                                </strong>
                                                        <a href="/sac-dtdd"><h3>S&#x1EA1;c d&#x1EF1; ph&#xF2;ng</h3></a>
                                                        <a href="/sac-cap"><h3>S&#x1EA1;c, c&#xE1;p</h3></a>
                                                        <a href="/op-lung-flipcover"><h3>&#x1ED0;p l&#x1B0;ng &#x111;i&#x1EC7;n tho&#x1EA1;i</h3></a>
                                                        <a href="/op-lung-may-tinh-bang"><h3>&#x1ED0;p l&#x1B0;ng m&#xE1;y t&#xED;nh b&#x1EA3;ng</h3></a>
                                                        <a href="/mieng-dan-man-hinh"><h3>Mi&#x1EBF;ng d&#xE1;n m&#xE0;n h&#xEC;nh</h3></a>
                                                        <a href="/gay-tu-suong"><h3>G&#x1EAD;y ch&#x1EE5;p &#x1EA3;nh, Gimbal</h3></a>
                                                        <a href="/gia-do-dien-thoai"><h3>Gi&#xE1; &#x111;&#x1EE1; &#x111;i&#x1EC7;n tho&#x1EA1;i</h3></a>
                                                        <a href="/de-moc-dien-thoai"><h3>&#x110;&#x1EBF;, m&#xF3;c &#x111;i&#x1EC7;n tho&#x1EA1;i</h3></a>
                                                        <a href="/tui-chong-nuoc"><h3>T&#xFA;i ch&#x1ED1;ng n&#x1B0;&#x1EDB;c</h3></a>
                                                        <a href="/tui-dung-airpods"><h3>T&#xFA;i &#x111;&#x1EF1;ng AirPods</h3></a>
                                                        <a href="/airtag"><h3>AirTag, V&#x1ECF; b&#x1EA3;o v&#x1EC7; AirTag</h3></a>
                                                        <a href="/phu-kien-thong-minh"><h3>Ph&#x1EE5; ki&#x1EC7;n Tablet</h3></a>
                                        </div>
                                        <div class="item-child ">
                                                <strong>
                                                    Ph&#x1EE5; ki&#x1EC7;n laptop
                                                </strong>
                                                        <a href="/chuot-ban-phim"><h3>Chu&#x1ED9;t, b&#xE0;n ph&#xED;m</h3></a>
                                                        <a href="/thiet-bi-mang"><h3>Thi&#x1EBF;t b&#x1ECB; m&#x1EA1;ng</h3></a>
                                                        <a href="/tui-chong-soc"><h3>Balo, t&#xFA;i ch&#x1ED1;ng s&#x1ED1;c</h3></a>
                                                        <a href="/gia-do-dien-thoai?g=de-laptop-macbook"><h3>Gi&#xE1; &#x111;&#x1EE1; laptop</h3></a>
                                                        <a href="/phan-mem"><h3>Ph&#x1EA7;n m&#x1EC1;m</h3></a>
                                        </div>
                                        <div class="item-child ">
                                                <strong>
                                                    Thi&#x1EBF;t b&#x1ECB; nh&#xE0; th&#xF4;ng minh
                                                </strong>
                                                        <a href="/khoa-dien-tu"><h3>Kh&#xF3;a &#x111;i&#x1EC7;n t&#x1EED;</h3></a>
                                                        <a href="/camera-giam-sat"><h3>Camera, webcam</h3></a>
                                                        <a href="/may-chieu"><h3>M&#xE1;y chi&#x1EBF;u</h3></a>
                                                        <a href="/android-tv-box"><h3>TV Box</h3></a>
                                                        <a href="/o-cam-thong-minh"><h3>&#x1ED4; c&#x1EAF;m, b&#xF3;ng &#x111;&#xE8;n th&#xF4;ng minh</h3></a>
                                        </div>
                                        <div class="item-child ">
                                                <strong>
                                                    Th&#x1B0;&#x1A1;ng hi&#x1EC7;u h&#xE0;ng &#x111;&#x1EA7;u
                                                </strong>
                                                        <a href="/phu-kien/apple"><h3>Apple</h3></a>
                                                        <a href="/phu-kien/samsung"><h3>Samsung</h3></a>
                                                        <a href="/phu-kien/sony"><h3>Sony</h3></a>
                                                        <a href="/phu-kien/jbl"><h3>JBL</h3></a>
                                                        <a href="/phu-kien/anker"><h3>Anker</h3></a>
                                        </div>
                                        <div class="item-child ">
                                                <strong>
                                                    Thi&#x1EBF;t b&#x1ECB; &#xE2;m thanh
                                                </strong>
                                                        <a href="/tai-nghe"><h3>Tai nghe</h3></a>
                                                        <a href="/loa-laptop"><h3>Loa</h3></a>
                                                        <a href="/micro-thu-am"><h3>Micro thu &#xE2;m &#x111;i&#x1EC7;n tho&#x1EA1;i</h3></a>
                                                        <a href="/micro"><h3>Micro</h3></a>
                                        </div>
                                        <div class="item-child ">
                                                <strong>
                                                    Thi&#x1EBF;t b&#x1ECB; l&#x1B0;u tr&#x1EEF;
                                                </strong>
                                                        <a href="/o-cung-di-dong"><h3>&#x1ED4; c&#x1EE9;ng di &#x111;&#x1ED9;ng</h3></a>
                                                        <a href="/the-nho-dien-thoai"><h3>Th&#x1EBB; nh&#x1EDB;</h3></a>
                                                        <a href="/usb"><h3>USB</h3></a>
                                        </div>
                                        <div class="item-child ">
                                                <strong>
                                                    Ph&#x1EE5; ki&#x1EC7;n kh&#xE1;c
                                                </strong>
                                                        <a href="/phu-kien-oto"><h3>Ph&#x1EE5; ki&#x1EC7;n &#xF4; t&#xF4;</h3></a>
                                                        <a href="/may-tinh-cam-tay"><h3>M&#xE1;y t&#xED;nh c&#x1EA7;m tay</h3></a>
                                                        <a href="/quat-mini"><h3>Qu&#x1EA1;t mini</h3></a>
                                                        <a href="/pin"><h3>Pin ti&#x1EC3;u</h3></a>
                                        </div> 
                                </div>
                        </li> -->
                       <li class="">
                        <!--   <a href="/dong-ho-thong-minh-ldp">
                                    <i>
                                        <img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn//content/icon-smartwatch-96x96-1.png" alt="Smartwatch" />
                                    </i>
                                <span class="">Smartwatch</span>
                            </a> 
                        </li>
                        <li class="">
                            <a href="/dong-ho">
                                    <i>
                                        <img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn//content/watch-icon-96x96.png" alt="&#x110;&#x1ED3;ng h&#x1ED3;" />
                                    </i>
                                <span class="">&#x110;&#x1ED3;ng h&#x1ED3;</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="/may-doi-tra">
                                    <i>
                                        <img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn//content/icon-header-may-cu-30x30.png" alt="M&#xE1;y c&#x169; gi&#xE1; r&#x1EBB;" />
                                    </i>
                                <span class="">M&#xE1;y c&#x169; gi&#xE1; r&#x1EBB;</span>
                            </a>
                        </li>
                        <li class="has-list">
                            <a href="/pc-may-in">
                                    <i>
                                        <img src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn//content/icon-pc-96x96.png" alt="PC, M&#xE1;y in" />
                                    </i>
                                <span class="has-child">PC, M&#xE1;y in</span>
                            </a>
                                <div class="navmwg limit-width">
                                        <div class="item-child no-child-final">
                                                <a href="/may-in"><h3>M&#xE1;y in</h3></a>
                                        </div>
                                        <div class="item-child no-child-final">
                                                <a href="/muc-in"><h3>M&#x1EF1;c in</h3></a>
                                        </div>
                                        <div class="item-child no-child-final">
                                                <a href="/man-hinh-may-tinh"><h3>M&#xE0;n h&#xEC;nh m&#xE1;y t&#xED;nh</h3></a>
                                        </div>
                                        <div class="item-child no-child-final">
                                                <a href="/may-tinh-de-ban"><h3>M&#xE1;y t&#xED;nh &#x111;&#x1EC3; b&#xE0;n</h3></a>
                                        </div>
                                </div>
                        </li> -->
                   <li class="">
                       <!--    <a href="/sim-so-dep">
                                <span class="">Sim, Th&#x1EBB; c&#xE0;o</span>
                            </a>
                        </li>
                        <li class="has-list">
                            <a href="/tien-ich/thanh-toan-tra-gop">
                                <span class="has-child">D&#x1ECB;ch v&#x1EE5; ti&#x1EC7;n &#xED;ch</span>
                            </a>
                                <div class="navmwg ">
                                        <div class="item-child ">
                                                <strong>
                                                    Thanh to&#xE1;n h&#xF3;a &#x111;&#x1A1;n
                                                </strong>
                                                        <a href="/tien-ich/thanh-toan-tra-gop"><h3>&#x110;&#xF3;ng ti&#x1EC1;n tr&#x1EA3; g&#xF3;p</h3></a>
                                                        <a href="/tien-ich/thanh-toan-tien-dien"><h3>&#x110;&#xF3;ng ti&#x1EC1;n &#x111;i&#x1EC7;n</h3></a>
                                                        <a href="/tien-ich/thanh-toan-tien-nuoc"><h3>&#x110;&#xF3;ng ti&#x1EC1;n n&#x1B0;&#x1EDB;c</h3></a>
                                                        <a href="/tien-ich/thanh-toan-internet-fpt"><h3>&#x110;&#xF3;ng ti&#x1EC1;n NET FPT</h3></a>
                                                        <a href="/tien-ich/thanh-toan-internet-vnpt"><h3>&#x110;&#xF3;ng ti&#x1EC1;n net, c&#xE1;p VNPT</h3></a>
                                                        <a href="/tien-ich/goi-cuoc-truyen-hinh"><h3>Mua g&#xF3;i truy&#x1EC1;n h&#xEC;nh</h3></a>
                                                        <a href="/tien-ich/thanh-toan-ve-tau-xe"><h3>V&#xE9; t&#xE0;u, xe, m&#xE1;y bay</h3></a>
                                                        <a href="/tien-ich/thanh-toan-vien-phi"><h3>Vi&#x1EC7;n ph&#xED; &#x110;H Y D&#x1AF;&#x1EE2;C TPHCM</h3></a>
                                        </div>
                                        <div class="item-child ">
                                                <strong>
                                                    T&#xE0;i ch&#xED;nh - B&#x1EA3;o hi&#x1EC3;m
                                                </strong>
                                                        <a href="/tien-ich/bao-hiem-o-to-xe-may"><h3>Mua b&#x1EA3;o hi&#x1EC3;m xe m&#xE1;y, &#xF4; t&#xF4;</h3></a>
                                                        <a href="/tien-ich/thanh-toan-bao-hiem"><h3>&#x110;&#xF3;ng ti&#x1EC1;n b&#x1EA3;o hi&#x1EC3;m</h3></a>
                                        </div>
                                        <div class="item-child ">
                                                <strong>
                                                    Ti&#x1EC7;n &#xED;ch vi&#x1EC5;n th&#xF4;ng
                                                </strong>
                                                        <a href="/tien-ich/goi-cuoc-lap-dat-internet-truyen-hinh"><h3>L&#x1EAF;p &#x111;&#x1EB7;t Internet, truy&#x1EC1;n h&#xEC;nh</h3></a>
                                                        <a href="/tien-ich/goi-cuoc-data"><h3>Mua g&#xF3;i data 3G, 4G</h3></a>
                                                        <a href="/tien-ich/nap-tien-dien-thoai"><h3>N&#x1EA1;p ti&#x1EC1;n tr&#x1EA3; tr&#x1B0;&#x1EDB;c</h3></a>
                                                        <a href="/tien-ich/nap-tien-dien-thoai-tra-sau"><h3>N&#x1EA1;p ti&#x1EC1;n tr&#x1EA3; sau</h3></a>
                                                        <a href="/tien-ich/the-cao-game"><h3>Th&#x1EBB; c&#xE0;o game</h3></a>
                                                        <a href="/tien-ich/the-cao-dien-thoai"><h3>Th&#x1EBB; c&#xE0;o &#x111;i&#x1EC7;n tho&#x1EA1;i</h3></a>
                                        </div>
                                </div>
                        </li> -->

    
                        <li class="has-list">
                            <a href="/">
                                <span class="has-child">Quản trị web</span>
                            </a>
                                <div class="navmwg ">
                                        <div class="item-child ">
                                                <strong>
                                                    Quản lý Tour
                                                </strong>
                                                        <a href="uploads_tour.php"><h3>Uploads hình</h3></a>
                                                        <a href="add_tour.php"><h3>Thêm tour mới</h3></a>
                                                        <a href="list_tour.php"><h3>Danh sách tour</h3></a>

                                                         <!--<div class="container text-center"> -->         
                                        </div>
                                        <div class="item-child ">
                                                <strong>
                                                    Quản lý phương tiện
                                                </strong>
                                                        <a href="add_phuongtien.php"><h3>Thêm phương tiện</h3></a>
                                                        <a href="list_phuongtien.php"><h3>Danh sách phương tiện</h3></a>

                                                
                                        </div>

                                        <div class="item-child ">
                                                <strong>
                                                    Quản lý users
                                                </strong>
                                                        
                                                        <a href="list_user.php"><h3>Danh sách users</h3></a>

                                                
                                                
                                        </div>
                                      

                                        
                                </div>
                        </li>


                </ul>
        </div>
    </div>

 

</header>

<div class="locationbox__popup new-popup hide" id="lc_pop--sugg">
    <div class="locationbox__popup--cnt locationbox__popup--suggestion new-locale">
        <div class="flex-block">
            <i class="icon-location"></i>
            <p>Hãy chọn <b>địa chỉ cụ thể</b> để chúng tôi cung cấp <b>chính xác</b> gi&#xE1; v&#xE0; khuy&#x1EBF;n m&#xE3;i</p>
        </div>
        <div class="btn-block">
            <a href="javascript:;" class="btn-location" onclick="OpenLocation()"><b>Chọn địa chỉ</b></a>
            <a href="javascript:;" class="btn-location gray" onclick="SkipLocation()"><b>Đóng</b></a>
        </div>
    </div>
</div>




<!-- Máy đổi trả, tiện ích không lấy script gtm -->
  

    <div class="big-banner home-top owl-carousel">
        <a aria-label="slide" data-cate="0" data-place="1996" href="Index.php" onclick="jQuery.ajax({ url: '/bannertracking?bid=56276&r='+ (new Date).getTime(), async: true, cache: false });"><img width='500' height='500' src="uploads/BiaChinh.png" alt="Banner Big Campaign"  style="width: 100%"></a>  <!-- 1920 x 920 -->
        <a aria-label="slide" data-cate="1" data-place="1997" href="Index.php" onclick="jQuery.ajax({ url: '/bannertracking?bid=56276&r='+ (new Date).getTime(), async: true, cache: false });"><img width='500' height='500' src="uploads/MuaHeDenRoiThoaSucDatTourThoi.png" alt="Banner Big Campaign"  style="width: 100%"></a>
    </div>


    <!--
    <div class="big-banner">
        <a aria-label="slide" data-cate="0" data-place="1998" href="Index.php" onclick="jQuery.ajax({ url: '/bannertracking?bid=56276&r='+ (new Date).getTime(), async: true, cache: false });"><img width='1920' height='920' src="uploads/BiaChinh.png" alt="Banner Big Campaign"  style="width: 100%"></a>
    </div> -->

    

    <section class="main-container">
    <div class="bg-tophome">
        <div class="home-slider " id="owl-home">                  <!-- home-slider big-campaign -->
                <div class="slider-banner home-top owl-carousel">
        <a aria-label="slide" data-cate="0" data-place="2053" href="Index.php" onclick="jQuery.ajax({ url: '/bannertracking?bid=72423&r='+ (new Date).getTime(), async: true, cache: false });"><img width='600' height='180' src="Uploads/BiaTour1.png" alt="mi"></a><a aria-label="slide" data-cate="0" data-place="2053" href="Index.php" onclick="jQuery.ajax({ url: '/bannertracking?bid=72297&r='+ (new Date).getTime(), async: true, cache: false });"><img width='600' height='180' src="Uploads/BiaTour2.png" alt="Flip"></a><a aria-label="slide" data-cate="0" data-place="2053" href="Index.php" onclick="jQuery.ajax({ url: '/bannertracking?bid=72419&r='+ (new Date).getTime(), async: true, cache: false });"><img width='600' height='180' loading="lazy" class="lazyload owl-lazy" data-src="Uploads/BiaTour3.png" alt="ip 11"></a><a aria-label="slide" data-cate="0" data-place="2053" href="Index.php" onclick="jQuery.ajax({ url: '/bannertracking?bid=72292&r='+ (new Date).getTime(), async: true, cache: false });"><img width='600' height='180' loading="lazy" class="lazyload owl-lazy" data-src="Uploads/BiaTour4.png" alt="S23"></a><a aria-label="slide" data-cate="0" data-place="2053" href='Index.php ' onclick="jQuery.ajax({ url: '/bannertracking?bid=71775&r='+ (new Date).getTime(), async: true, cache: false });"><img width='600' height='180' loading="lazy" class="lazyload owl-lazy" data-src="Uploads/BiaTour5.png" alt="Laptop"></a><a aria-label="slide" data-cate="0" data-place="2053" rel="nofollow" href="Index.php" onclick="jQuery.ajax({ url: '/bannertracking?bid=72245&r='+ (new Date).getTime(), async: true, cache: false });"><img width='600' height='180' loading="lazy" class="lazyload owl-lazy" data-src="Uploads/BiaTour6.png" alt="apple watch xả kho"></a>
       <!-- <a aria-label="slide" data-cate="0" data-place="2053" href="Index.php" onclick="jQuery.ajax({ url: '/bannertracking?bid=71738&r='+ (new Date).getTime(), async: true, cache: false });"><img width='600' height='180' loading="lazy" class="lazyload owl-lazy" data-src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/2023/03/banner/720x220-720x220-9.jpg" alt="PK PSDP Tainghe"></a>
        <a aria-label="slide" data-cate="0" data-place="2053" rel="nofollow" href="Index.php" onclick="jQuery.ajax({ url: '/bannertracking?bid=71087&r='+ (new Date).getTime(), async: true, cache: false });"><img width='600' height='180' loading="lazy" class="lazyload owl-lazy" data-src="https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_100/https://cdn.tgdd.vn/2023/02/banner/vivo-720-220-720x220.png" alt="Vivo"></a>    </div>
    -->
        </div>
    </div>









    <!-- End -->
 
    <script src="//cdn.tgdd.vn/mwgcart/mwgcore/js/bundle/globalTGDD_V2.min.v202303170950.js" type="text/javascript"></script>
    <script async="async" defer="defer" src="//cdn.tgdd.vn/mwgcart/mwgcore/js/bundle/homeTGDD_v2.min.v202303011050.js" type="text/javascript"></script>
    <script async="async" defer="defer" src="//cdn.tgdd.vn/mwgcart/mwgcore/js/bundle/homeGTM_V2.min.v202211261210.js" type="text/javascript"></script>


    <!--<script src ="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src ="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


   
    
</body>
</html>
