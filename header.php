<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="author" content="HuynhDoMinhCuong" />
    <link href="site.css" rel="stylesheet" />
    <title> Project training - website bán hàng</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
 
</head>

<body>
    <div id="wrapper">
        <h1>  </h1>
    
    <?php
    session_start();
    if(isset($_SESSION['user'])!="")
    {
        echo "<h3> Xin chào! ".$_SESSION['user']."<a href='logout.php'> Đăng xuất </a></h3>";  
    }
    else {
        echo "<h3> Bạn chưa đăng nhập! <a href='login.php'> Đăng nhập </a> - <a href='register.php'> Đăng ký </a></h3>";  
    } 
    ?> 
</body> 
</html>

