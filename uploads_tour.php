<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Uploads hình ảnh</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
</head>

<?php //include_once('style.php'); ?>

<?php 
require_once("entities/uploads.class.php");
 
if(isset($_POST["btnsubmituploads"])){
    //Lấy giá trị từ form
    $picture = $_FILES["txtpic02"];   //Lấy giá trị để lưu file hình vào floder tên là uploads
    //Khởi tạo đối tượng product
    $newProduct = new  Uploads($picture);
    $loi = array();
    $loi_str = "";
    // Lưu xuống CSDL
    $result = $newProduct -> saveuploads($loi);
    if(!$result){
        //Truy vấn lỗi
       //header("Location: add_product.php?status=failure");
       foreach($loi as $item) $loi_tr = $loi_tr.$item."<br/>";
       ?>
       <script>alert('Thêm hình thành công!');</script>
       <?php
    }else{
        header("Location: add_product.php?status=inserted02");
        ?>
        <script>alert('Thêm hình thất bại!');</script>
        <?php
    }
}

?>

<?php require 'headerImages.php'; ?>

<link href="site.css" rel="stylesheet" />

<?php
    if(isset($_GET["status"])){
        if ($_GET["status"] == 'inserted') {
            echo "<h3>Thông báo: Thêm sản phẩm thành công!</h3>";
        }else{
            echo "<h3>Thông báo: Thêm sản phẩm thất bại!</h3>";    
        }
    }
?>

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
    </header> -->

    <h2> UPLOADS HÌNH ẢNH </h2>
    <div class="container">
      <!-- Form Uploads thêm hình ảnh vào mục uploads-->
      <form method="post" enctype="multipart/form-data">
      <div class="row">
            <div class="lbltitle">
                <label>Chọn hình ảnh:</label>
            </div>
            <div class="lblinput">
                <input type="file" name="txtpic02" accept=".PNG,.GIF,.JPG,.JPGEG">
            </div>
        </div>
        <div class="row">
            <div class="lbltitle">
                   Click uploads:
            </div>
            <div class="submit">
                <button type="submit" class="btn btn-primary" name="btnsubmituploads">Uploads hình ảnh</button>
            </div>
        </div>
    </div>
    </form>


  <!--  <script src ="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src ="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
    </body>
    </html>
<!-- Footer -->
<?php require 'footer.php'; ?>