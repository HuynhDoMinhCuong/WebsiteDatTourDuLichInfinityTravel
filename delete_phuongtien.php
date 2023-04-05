<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <!-- <link href="site.css" rel="stylesheet" /> -->
    <title>Delete phương tiện</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
</head>


<?php //include_once('style.php'); ?> 

<?php 
require_once('entities/tour.class.php');
require_once('entities/phuongtien.class.php');
?>



<?php
if(isset($_GET["id"])){
    $maPhuongTien = $_GET["id"];
    $sql = "SELECT * FROM phuongtien WHERE MaPhuongTien = $maPhuongTien";
    $result = mysqli_query($conn=mysqli_connect("localhost","root","","websitedattourdulichinfinitytravel") ,$sql);        //Đường dẫn kết nối
    $row = mysqli_fetch_assoc($result);

  

}
?>



<?php 


/*
if ($_POST['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $pruduct = $this->ProductID->getById($id);
    require_once("update_product.php");
}*/


if(isset($_POST["btnsubmit-xoaphuongtien"])){
    //Lấy giá trị từ form
    
    $tenPhuongTien = $_POST["txttenphuongtien"];
   
   // $picture = $_FILES["txtpic"];   //Lấy giá trị để lưu file hình vào floder tên là uploads
    //Khởi tạo đối tượng tour
    $newPhuongTien = new PhuongTien($maPhuongTien, $tenPhuongTien);
   // $loi = array();
  //  $loi_str = "";
    // Lưu xuống CSDL
    $result = $newPhuongTien -> delete($maPhuongTien);
    if(!$result){
        //Truy vấn lỗi
      // header("Location: add_product.php?status=failure");
      // foreach($loi as $item) $loi_tr = $loi_tr.$item."<br/>";
      ?>
      <script>alert('Xoá phương tiện thất bại!');</script>
      <?php

    }else{
        //header("Location: add_product.php?status=inserted");
        ?>  
        <script>alert('Xoá phương tiện thành công!');</script>
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

    <h2> XOÁ PHƯƠNG TIỆN </h2>

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
                <label>Mã phương tiện:</label>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="id" disabled value="<?php echo isset($_GET["id"]) ? $_GET["id"] : "" ?>">
                <input type="hidden" class="form-control" name="id" value="<?php echo isset($_GET["id"]) ? $_GET["id"] : "" ?>">
               
            </div>
        </div>

        <!-- Tên tour -->
        <div class="row">
            <div class="form-group">
                <label>Tên phương tiện:</label>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="txttenphuongtien" value="<?php echo $row['TenPhuongTien'] ?>">
            </div>
        </div>
        
        <div class="row">
            <div class="lbltitle">
                   Click xoá:
            </div>
            <div class="submit">
                <button type="submit" class="btn btn-primary" name="btnsubmit-xoaphuongtien">Xoá</button>
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

