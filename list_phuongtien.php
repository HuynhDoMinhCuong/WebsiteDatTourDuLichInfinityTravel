<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="site.css" rel="stylesheet" />
    <title>Danh sách phương tiện</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
</head>

<?php //include_once('style.php'); ?>

<?php 
require_once('entities/tour.class.php');
require_once('entities/phuongtien.class.php');
?>

<?php require 'headerImages.php'; ?>

<link href="site.css" rel="stylesheet" />


<?php 
// $prods là biến khởi tạo đối tượng từ class Product, function list_product()
if (!isset($_GET["phuongtienID"])){
    $tours = Tour::list_tour();                       //Danh sách tour

    // 
    $phuongtiens2 = PhuongTien::list_phuongtien();                 //Danh sách phương tiện


}
else{
    $maPhuongTien = $_GET["phuongtienID"];

    $tours = Tour::list_tour_by_maPhuongTien($maPhuongTien);       //Lấy danh sách tour theo mã    
    
    // 
    
}


?>


<!-- -->



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



<div class="container text-center form-text">
    <div class="row">
        <div class="col-sm-12">
            <h2>DANH SÁCH PHƯƠNG TIỆN</h2>   
        </div>
            <table border="1" class="table">
                <tr>
                   
                    <td><b><center>Mã phương tiện</center></b></td>
                    <td><b><center>Tên phương tiện</center></b></td>  
                    
                   <!-- <td><b><center>Url hình</center></b></td> -->
                    <td scope='col' colspan="2"><b><center>Thao tác</center></b></td>
                
                </tr>
                <?php 
                    foreach ($phuongtiens2 as $item2) {
                ?>
                <tr> 
                    
                    <td><center><?php echo $item2['MaPhuongTien']?></center></td>
                    
                    
                    <td><center><?php echo $item2['TenPhuongTien']?></center></td>     
                   
                   
                   <?php  echo "<td><a href='update_phuongtien.php?id=" .$item2['MaPhuongTien'] ."' class='text-primary'>Sửa</a></td>";
                          echo "<td><a href='delete_phuongtien.php?id=" .$item2['MaPhuongTien'] ."' class='text-danger'>Xoá</a></td> ";
                  
                    ?> 
                   
                    <!--
                   <td>
                    <a onclick="return confirm('Bạn có muốn xoá');"href="delete_product.php?id= <?php echo $item['ProductID'];?>" id="btnUpdate" class="text-danger">
                                <i class="fas fa-edit"></i> Xoá
                    </a>
                   
                    <a onclick="return confirm('Bạn có muốn sửa');"href="update_product.php?id= <?php echo $item['ProductID'];?>" id="btnUpdate" class="text-primary">
                                <i class="fas fa-edit"></i> Sửa
                    </a>
                    <td>-->

                </tr>
                <?php } ?>
            </table>

        </div>    
    </div>



</div>
 
   <!-- <script src ="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src ="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</body>
</html>
<?php include_once('footer.php'); ?>