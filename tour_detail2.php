<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="HuynhDoMinhCuong" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="site.css" rel="stylesheet" />
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    
</head>

<?php //include_once("header.php");?>

<?php //include_once('style.php'); ?> <!-- style cũ -->

<?php 
require_once('entities/tour.class.php');
require_once('entities/phuongtien.class.php');
?>
<?php 


if(!isset($_GET["id"])){
    //Đường dẫn xem chi tiết sản phẩm không đúng
    //Dẫn tới trang not found
    header('Location: not_found.php');
}

else{
    $id = $_GET["id"];
    $tmp = Tour::get_tour($id); //Đường dẫn biến
    $prod = reset($tmp);
    $prods_relate = Tour::list_tour_relate($prod["MaPhuongTien"], $id);

   
    $tmp2 = PhuongTien::list_TenPhuongTien_by_maPhuongTien($prod["MaPhuongTien"], $id); //Đường dẫn biến
    $cate = reset($tmp2);
  //  $cates_relate = Category::list_categoryName_by_cateid($cate["CateID"], $id);

}

?>

<!--
<?php require 'header.php'; ?> -->
    <!--  -->
 <body>

    <?php require 'headerImages.php'; ?>

<link href="site.css" rel="stylesheet" />


    <h2> CHI TIẾT SẢN PHẨM </h2> 
   
    <div class="container text-center form-text">
    <div class="row">
        <div class="col-sm-12">
            <h2>  </h2>   
        </div>
    
        <div class="clearfix"></div> 
        <div class="container-productbox">

            <!-- -->
            <div id="preloader">
            <div id="loader"></div>
            </div>
            <!-- -->
            <ul class="listproduct"> 
     
                <div class="item ajaxed __cate_42" >             
            
                <a href="GioiThieuSanPham/GioiThieuSanPhamID=<?php echo $prod["ProductID"]; ?>.php">     <!-- Đường dẫn giới thiệu sản phẩm theo ProductID -->
 
               
                <div class="item-label">
                    <span class="lb-tragop">Trả góp 0%</span>
                </div>
              
                <div class="item-img item-img_42">
                    
                <img src="<?php echo $prod['Picture']; ?>" class="img-responsive" style="width: 100%" alt='Image' onerror="this.src='uploads/<?php echo $prod['Picture']; ?>'">
               
                <img src="https://cdn.tgdd.vn/ValueIcons/Label_01-05.png" width="40" height="40" class="lbliconimg lbliconimg_42 tgdd" />
                </div>
                    <p class="text-dark"><?php echo $prod['ProductName']; ?></p>
                    <p class="text-danger"><b>
                                <?php
                                    $price = $prod['Price'];
                                    $formattedPrice = number_format($price);
                                    printf("Giá: %s VND\n", $formattedPrice) ; 
                                ?></b>               
                    </p>
                    <p>
                    <a href="shopping_cart.php?id=<?php echo $prod["ProductID"]; ?>"> <button type="button" class="btn btn-primary">Mua hàng</button> </a>     
                </a>
                </p>
                </div>           
                <a class="text-dark"><b>Mã SP:</b> <?php echo $prod['ProductID']; ?></p>
                <p class="text-dark"><b>Mã Loại:</b> <?php echo $prod['CateID']; ?></p>
                <p class="text-dark"><b>Tên Loại:</b> <?php echo $cate['CategoryName']; ?></p>
                <p class="text-dark"><b>SL:</b> <?php echo $prod['Quantity']; ?></p>
                <p class="text-dark"><b>Mô tả:</b> <?php echo $prod['Description']; ?></p>

                <a></a>
                <!-- <a href="GioiThieuSanPhamid=<?php echo $prod["ProductID"]; ?>.php"> <button type="button" class="btn btn-primary">Giới thiệu sản phẩm</button> </a> -->
        
                </ul>
        
        </div>
    </div>    
 </div>

 <h2> SẢN PHẨM LIÊN QUAN </h2> 
   
    <div class="container text-center form-text">
    <div class="row">
        <div class="col-sm-12">
            <h2>  </h2>   
        </div>
    

        <div class="clearfix"></div> 
        <div class="container-productbox">

            <!-- -->
            <div id="preloader">
            <div id="loader"></div>
            </div>
            <!-- -->
            <ul class="listproduct"> 

            <?php foreach ($prods_relate as $item) { ?>
     
                <div class="item ajaxed __cate_42" >
            
                <a href="product_detail.php?id=<?php echo $item["ProductID"]; ?>">

                <div class="item-label">
                    <span class="lb-tragop">Trả góp 0%</span>
                </div>
              
                <div class="item-img item-img_42">
                <img src="<?php echo $item['Picture']; ?>" class="img-responsive" style="width: 100%" alt='Image' onerror="this.src='uploads/<?php echo $item['Picture']; ?>'">
                <img src="https://cdn.tgdd.vn/ValueIcons/Label_01-05.png" width="40" height="40" class="lbliconimg lbliconimg_42 tgdd" />
                </div>
                    <p class="text-dark"><?php echo $item['ProductName']; ?></p>
                    <p class="text-danger"><b>
                                <?php
                                    $price = $item['Price'];
                                    $formattedPrice = number_format($price);
                                    printf("Giá: %s VND\n", $formattedPrice) ; 
                                ?></b>               
                    </p>
                    <p>
                    <a href="shopping_cart.php?id=<?php echo $item["ProductID"]; ?>"> <button type="button" class="btn btn-primary">Mua hàng</button> </a>     
            
                </p>
                
                </a>
                </div>

                <?php } ?>

                </ul>
        </div>
    </div>    
 </div>

    <!--<script src ="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src ="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
  
</html>
<!-- Footer -->
<?php require 'footer.php'; ?>







