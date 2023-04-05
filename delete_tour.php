<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <!-- <link href="site.css" rel="stylesheet" /> -->
    <title>Delete tour</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
</head>


<?php //include_once('style.php'); ?> 

<!--
<?php 
require_once('entities/tour.class.php');
require_once('entities/phuongtien.class.php');
?>

<?php 
// $prods là biến khởi tạo đối tượng từ class Product, function list_product()
if (!isset($_GET["maphuongtien"])){
  //  $prods = Product:: list_getById($productID);
}

?>-->

<!--
<?php 
// $prods là biến khởi tạo đối tượng từ class Product, function list_product()
if (isset($_GET["id"])){
    $maTour = $_GET["id"];
    $row = Tour:: get_tour($maTour);
}

?>

<?php 
// $prods là biến khởi tạo đối tượng từ class Product, function list_product()
if (!isset($_GET["maphuongtien"])){
    $tours = Tour::list_tour();
}
else{
    $mapphuongtien = $_GET["maphuongtien"];
    $tours = Tour::list_tour_by_maPhuongTien($mapphuongtien);
}
$cates = PhuongTien::list_phuongtien();
?> -->


<?php
if(isset($_GET["id"])){
 $maTour = $_GET["id"];
    $sql = "SELECT * FROM tour WHERE MaTour = $maTour";
    $result = mysqli_query($conn=mysqli_connect("localhost","root","","websitedattourdulichinfinitytravel") ,$sql);        //Đường dẫn kết nối
    $row = mysqli_fetch_assoc($result);

}
?>



<?php 
require_once("entities/tour.class.php");
require_once('entities/phuongtien.class.php');


/*
if ($_POST['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $pruduct = $this->ProductID->getById($id);
    require_once("update_product.php");
}*/


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
    //Khởi tạo đối tượng tour
    $newTour = new Tour($maTour, $maPhuongTien, $tenTour, $noiKhoiHanh, $ngayKhoiHanh, $thoiGian, $giaTour, $soLuongVeHienCo, $moTa, $hinh);
   // $loi = array();
  //  $loi_str = "";
    // Lưu xuống CSDL
    $result = $newTour -> delete($maTour);
    if(!$result){
        //Truy vấn lỗi
      // header("Location: add_product.php?status=failure");
      // foreach($loi as $item) $loi_tr = $loi_tr.$item."<br/>";
      ?>
      <script>alert('Xoá tour thất bại!');</script>
      <?php

    }else{
        //header("Location: add_product.php?status=inserted");
        ?>  
        <script>alert('Xoá tour thành công!');</script>
        <?php

   
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

    <h2> XOÁ TOUR </h2>

    <?php
    /*
    if(isset($_GET["status"])){
        if ($_GET["status"] == 'inserted') {
            echo "<h1>Thông báo: Update sản phẩm thành công!</h1>";
        }else{
            echo "<h1>Thông báo: Update sản phẩm thất bại!</h1>";    
        }
    }*/
    ?>

    <div class="container">
  <!-- Form Thêm sản phẩm -->
  <form method="post">

       <!-- ID sản phẩm -->
    <div class="row">
            <div class="form-group">
                <label>Mã Tour:</label>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="id" disabled value="<?php echo isset($_GET["id"]) ? $_GET["id"] : "" ?>">
                <input type="hidden" class="form-control" name="id" value="<?php echo isset($_GET["id"]) ? $_GET["id"] : "" ?>">
               
            </div>
        </div>

        <!-- Tên tour -->
        <div class="row">
            <div class="form-group">
                <label>Tên tour:</label>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="txttentour" value="<?php echo $row['TenTour'] ?>">
            </div>
        </div>
        <!-- Nơi khởi hành -->
        <div class="row">
            <div class="form-group">
                <label>Nơi khởi hành:</label>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="txtnoikhoihanh" value="<?php echo $row['NoiKhoiHanh'] ?>">
            </div>
        </div>
        <!-- Ngày khởi hành -->
        <div class="row">
            <div class="form-group">
                <label>Ngày khởi hành:</label>
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="txtngaykhoihanh" value="<?php echo $row['NgayKhoiHanh'] ?>">
            </div>
        </div>
        <!-- Thời gian -->
        <div class="row">
            <div class="form-group">
                <label>Thời gian</label>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="txtthoigian" value="<?php echo $row['ThoiGian'] ?>">
            </div>
        </div>
         <!-- Giá tour -->
         <div class="row">
            <div class="form-group">
                <label>Giá tour</label>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="txtgiatour" value="<?php echo $row['GiaTour'] ?>">
            </div>
        </div>
         <!-- Số lượng vé hiện có -->
         <div class="row">
            <div class="form-group">
                <label>Số lượng vé hiện có</label>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="txtsoluongvehienco" value="<?php echo $row['SoLuongVeHienCo'] ?>">
            </div>
        </div>
        <!-- Mô tả tour -->
        <div class="row">
            <div class="form-group">
                <label>Mô tả tour:</label>
            </div>
            <div class="form-groupt">
            <input type="text" class="form-control" name="txtmota" cols="21" rows="10" value="<?php echo $row['MoTa'] ?>"></textarea>
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
                    <?php  foreach ($phuongtiens as $item) { ?>
                    <option value="<?php echo  $item['MaPhuongTien'] ?>" <?php echo ($item['MaPhuongTien'] == $row['MaPhuongTien']) ? 'selected' : '' ?>><?php echo  $item['TenPhuongTien'] ?></option>
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
           <input type="file" name="txthinh" accept=".PNG,.GIF,.JPG,.JPGEG" value="<?php echo $row['Hinh'] ?>">
              
           <img src="uploads/<?php echo $row ['Hinh'] ?>" alt="" style="width: 50%">  
               
            </div>
        </div>
        <div class="row">
            <div class="lbltitle">
                   Click Xoá:
            </div>
            <div class="submit">
                <button type="submit" class="btn btn-primary" name="btnsubmit">Xoá</button>
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

