<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link href="site.css" rel="stylesheet" /> -->
    <title>Thêm phương tiện</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
</head>

<?php //include_once('style.php'); 
?>

<?php
require_once("entities/tour.class.php");
require_once('entities/phuongtien.class.php');

if (isset($_POST["btnsubmit-phuongtien"])) {
    //Lấy giá trị từ form

    $tenPhuongTien = $_POST["txttenphuongtien"];


    //Kiểm tra tour đã nhập liệu đầy đủ chưa
    if (!$tenPhuongTien) {

?>
        <script>
            alert('Vui lòng nhập đầy đủ thông tin phương tiện!');
        </script>
        <?php

        //echo "Vui lòng nhập đầy đủ thông tin phương tiện. <a href= add_phuongtien.php>Trở lại</a>";
        // exit;
    } else {
        //Khởi tạo đối tượng phương tiện
        $newPhuongTien = new PhuongTien($tenPhuongTien);
        // $loi = array();
        //  $loi_str = "";
        // Lưu xuống CSDL
        $result = $newPhuongTien->save();
        if (!$result) {
            //Truy vấn lỗi
            // header("Location: add_product.php?status=failure");
            // foreach($loi as $item) $loi_tr = $loi_tr.$item."<br/>";
        ?>
            <script>
                alert('Thêm phương tiện thất bại!');
            </script>
        <?php

        } else {
            //header("Location: add_product.php?status=inserted");
        ?>
            <script>
                alert('Thêm phương tiện thành công!');
            </script>
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

    <h2> THÊM PHƯƠNG TIỆN </h2>

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
                    <label>Tên phương tiện:</label>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="txttenphuongtien" value="<?php echo isset($_POST["txttenphuongtien"]) ? $_POST["txttenphuongtien"] : "" ?>">
                </div>
            </div>

            <div class="row">
                <div class="lbltitle">
                    Click thêm:
                </div>
                <div class="submit">
                    <button type="submit" class="btn btn-primary" name="btnsubmit-phuongtien">Thêm phương tiện</button>
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