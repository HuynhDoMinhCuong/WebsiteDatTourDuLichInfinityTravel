<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <!-- <link href="site.css" rel="stylesheet" /> -->
    <title>Thêm tour</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
</head>

<?php //include_once('style.php'); ?>

<?php 
require_once("entities/tour.class.php");
require_once('entities/phuongtien.class.php');

if(isset($_POST["btnsubmit"])){
    //Lấy giá trị từ form
    $maPhuongTien = $_POST["txtmaphuongtien"];
    $tenTour = $_POST["txttentour"];
    $noiKhoiHanh = $_POST["txtnoikhoihanh"];
    $ngayKhoiHanh = $_POST["txtngaykhoihanh"];
    $thoiGian = $_POST["txtthoigian"];
    $giaTour = $_POST["txtgiatour"];    //Lấy giá trị để lưu tên hình vào MySQL
    $soLuongVeHienCo = $_POST["txtsoluongvehienco"];    //Lấy giá trị để lưu tên hình vào MySQL
    $moTa = $_POST["txtmota"];
    $hinh= $_POST["txthinh"];
   // $picture = $_FILES["txtpic"];   //Lấy giá trị để lưu file hình vào floder tên là uploads

    //Kiểm tra tour đã nhập liệu đầy đủ chưa
    if (!$tenTour || !$noiKhoiHanh || !$ngayKhoiHanh || !$thoiGian || !$giaTour || !$soLuongVeHienCo || !$moTa || !$hinh)
    {
          
        ?>
        <script>alert('Vui lòng nhập đầy đủ thông tin tour!');</script>
        <?php

        //echo "Vui lòng nhập đầy đủ thông tin tour. <a href= index.php>Trở lại</a>";
       // exit;
    }
    else {
    //Khởi tạo đối tượng tour
    $newTour = new Tour($maPhuongTien, $tenTour, $noiKhoiHanh, $ngayKhoiHanh, $thoiGian, $giaTour, $soLuongVeHienCo, $moTa, $hinh);
    // $loi = array();
    //  $loi_str = "";
    // Lưu xuống CSDL
    $result = $newTour -> save();
    if(!$result){
        //Truy vấn lỗi
      // header("Location: add_product.php?status=failure");
      // foreach($loi as $item) $loi_tr = $loi_tr.$item."<br/>";
      ?>
      <script>alert('Thêm tour thất bại!');</script>
      <?php

    }else{
        //header("Location: add_product.php?status=inserted");
        ?>  
        <script>alert('Thêm tour thành công!');</script>
        <?php

    }
 }
}

?>




<?php require 'headerImages.php'; ?>


<link href="site.css" rel="stylesheet" />

    <!--  -->
    
 <body>
    <!-- 
 <header class="bg-primary text-white py-3">
    <div class="navbar navbar-dark bg-primary navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a href="Index.php" class="navbar-brand">Trang chủ</a>
                <a href="uploads_product.php" class="navbar-brand">Uploads hình ảnh</a>
                <a href="add_product.php" class="navbar-brand">Thêm sản phẩm</a>
                <a href="list_product.php" class="navbar-brand">Danh sách sản phẩmm</a>
            </div>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
    </header>  -->

    <h2> THÊM TOUR </h2>

    <?php
    /*if(isset($_GET["status"])){
        if ($_GET["status"] == 'inserted') {
            echo "<h1>Thông báo: Thêm sản phẩm thành công!</h1>";
        }else{
            echo "<h1>Thông báo: Thêm sản phẩm thất bại!</h1>";    
        }
    }*/
    ?>

      

    <div class="container">
    <!-- Form Thêm tour -->
    <form method="post">
        <!-- Tên sản phẩm -->
        <div class="row">
            <div class="form-group">
                <label>Tên tour:</label>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="txttentour" value="<?php echo isset($_POST["txttentour"]) ? $_POST["txttentour"] : "" ?>">
            </div>
        </div>
        <!-- Nơi khởi hành -->
        <div class="row">
            <div class="form-group">
                <label>Nơi khởi hành:</label>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="txtnoikhoihanh" value="<?php echo isset($_POST["txtnoikhoihanh"]) ? $_POST["txtnoikhoihanh"] : "" ?>">
            </div>
        </div>
        <!-- Ngày khởi hành -->
        <div class="row">
            <div class="form-group">
                <label>Ngày khởi hành:</label>
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="txtngaykhoihanh" value="<?php echo isset($_POST["txtngaykhoihanh"]) ? $_POST["txtngaykhoihanh"] : "" ?>">
            </div>
        </div>
        <!-- Thời gian -->
        <div class="row">
            <div class="form-group">
                <label>Thời gian:</label>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="txtthoigian" value="<?php echo isset($_POST["txtthoigian"]) ? $_POST["txtthoigian"] : "" ?>">
            </div>
        </div>
        <!-- Giá tour -->
        <div class="row">
            <div class="form-group">
                <label>Giá tour:</label>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="txtgiatour" value="<?php echo isset($_POST["txtgiatour"]) ? $_POST["txtgiatour"] : "" ?>">
            </div>
        </div>
        <!-- Số lượng vé hiện có -->
        <div class="row">
            <div class="form-group">
                <label>Số lượng vé hiện có:</label>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="txtsoluongvehienco" value="<?php echo isset($_POST["txtsoluongvehienco"]) ? $_POST["txtsoluongvehienco"] : "" ?>">
            </div>
        </div>
        <!-- Mô tả -->
        <div class="row">
            <div class="form-group">
                <label>Mô tả</label>
            </div>
            <div class="form-group">
            <textarea type="text" class="form-control" name="txtmota" cols="21" rows="10" value="<?php echo isset($_POST["txtmota"]) ? $_POST["txtmota"] : "" ?>"></textarea>
            </div>
        </div>
        <!-- Tên phương tiện -->
        <div class="row">
            <div class="form-group">
                <label>Tên phương tiện:</label>
            </div>
            <div class="form-group">
                <select class="form-control" name="txtmaphuongtien">
                    <option value="" selected>-- Chọn tên --</option>
                    <?php $phuongtiens = PhuongTien::list_phuongtien() ?>
                    <?php    foreach ($phuongtiens as $item) { ?>
                    <option value="<?php echo $item['MaPhuongTien'] ?>"><?php echo $item['TenPhuongTien'] ?></option>
                    <?php } ?>
                </select>
               
            </div>
        </div>
        <!-- Hình ảnh tour -->
        <div class="row">
            <div class="lbltitle">
                <label>Url Hình ảnh:</label>
            </div>
            <div class="lblinput">
                <input type="file" name="txthinh" accept=".PNG,.GIF,.JPG,.JPGEG">
            </div>
        </div>
        <div class="row">
            <div class="lbltitle">
                   Click thêm:
            </div>
            <div class="submit">
                <button type="submit" class="btn btn-primary" name="btnsubmit">Thêm tour</button>
            </div>
        </div>
    </form>
    </div>

    <!--
    <script src ="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src ="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
</body>
    </html>
<!-- Footer -->
<?php require 'footer.php'; ?>