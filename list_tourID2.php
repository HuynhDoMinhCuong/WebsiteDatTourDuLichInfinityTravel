
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="HuynhDoMinhCuong" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="site.css" rel="stylesheet" />
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    
</head>


<?php //include_once('style.php'); ?>

<?php 
require_once('entities/tour.class.php');
require_once('entities/phuongtien.class.php');
?>
<?php 
// $prods là biến khởi tạo đối tượng từ class Product, function list_product()
if (!isset($_GET["phuongtienID"])){
    $tours = Tour::list_tourID2();
}
else{
    $maPhuongTien = $_GET["phuongtienID"];
    $tours = Tour::list_tour_by_maPhuongTien($maPhuongTien);
}
$phuongtiens = PhuongTien::list_phuongtien();
?>


<!--
<?php require 'header.php'; ?> -->

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
                <a href="list_productSmartPhone.php" class="navbar-brand">Danh sách SmartPhone</a>
                <a href="list_productLaptop.php" class="navbar-brand">Danh sách Laptop</a>
            </div>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
    </header> -->

    <?php require 'headerImages.php'; ?>

<link href="site.css" rel="stylesheet" />

    <h2> TOUR HOT </h2> 
   
    <div class="container text-center form-text">
    <div class="row">
        <div class="col-sm-12">
            <h2>  </h2>   
        </div>
       
       <!-- <thead>
                <tr>
                <th><img src="<?php echo $item['Picture']; ?>" class="img-responsive" style="width: 100%" alt='Image' onerror="this.src='uploads/230311081445HinhTrangChu.png'"></th>
                <th></th>

                
                </tr>
            </thead> -->



       <!-- <section ID="Slider">
                <div class="aspect-radio-169">
                    <img src="uploads/230311081445HinhTrangChu.png" alt="">
                    <img src="uploads/230311055548Iphone7plus.jpg" alt="">
                    <img src="uploads/230311083612Iphone14ProMax.jpg" alt="">

                </div>
                <div class="dot-container">
                    <div class="dot active"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                </div>
            </section> -->

	<!-- END: box-wrap -->
	

        


  <!--
            <section ID="Slider">
                <div class="aspect-radio-169">
                    <img src="uploads/230311081445HinhTrangChu.png" alt="">
                    <img src="uploads/230311055548Iphone7plus.jpg" alt="">
                    <img src="uploads/230311083612Iphone14ProMax.jpg" alt="">

                </div>
                <div class="dot-container">
                    <div class="dot active"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                </div>
            </section> 

            <?php echo '<hr>';?> -->
            <!--
            <tbody id="table-content">
                <tr>
                    <a><img src="<?php echo $item['Picture']; ?>" class="img-responsive" style="width: 20%" alt='Image' onerror="this.src='uploads/230311055548Iphone7plus.jpg'"></a>
                    <a><img src="<?php echo $item['Picture']; ?>" class="img-responsive" style="width: 20%" alt='Image' onerror="this.src='uploads/230311083612Iphone14ProMax.jpg'"></a>
                    <a><img src="<?php echo $item['Picture']; ?>" class="img-responsive" style="width: 20%" alt='Image' onerror="this.src='uploads/230311055956LaptopAsusTufF152022.jpg'"></a>
                </tr>
                <tr>

                </tr>
            </tbody>
            <?php echo '<hr>';?>      
    <div class=" navbar-dark bg-primary navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <h2 href="Index.php" class="navbar-brand">SẢN PHẨM HOT</h2>
            </div>
        </div>
    </div>  -->

     <!--
       <div class="container text-center form-text">
         <div class="row">
            <div class="col-sm-12">
            <h2> </h2>   
            </div>
            <?php foreach ($prods as $item) { ?>
            <div class="col-sm-4">
                <thead>
                <tr>
                <th><img src="<?php echo $item['Picture']; ?>" class="img-responsive" style="width: 60%" alt='Image' onerror="this.src='uploads/<?php echo $item['Picture']; ?>'"></p>
                    <p class="text"><?php echo $item['ProductName']; ?></p>
                    <a class="text-danger"><b>
                                <?php
                                    $price = $item['Price'];
                                    $formattedPrice = number_format($price);
                                    printf("Giá: %s VND\n", $formattedPrice) ; 
                                ?></b>
                            
                    </a>
                    <p>
                    <a href="Index"> <button type="button" class="btn btn-primary">Mua hàng</button> </a>     
            
                </p>
                    </tr>
                </thead>
                
                </div>
                <?php } ?>
            </div>
            -->
        <div class="col-sm-3">
        <h2> Phương tiện </h2>
        <ul class = "list-group">
                    <a href="Index.php" class="list-group-item">Tất cả</a>     
            <?php
                foreach($phuongtiens as $item) {
                    echo "<li class = 'list-group-item'><a href=/Index.php?phuongtienID=".$item["MaPhuongTien"].">".$item["TenPhuongTien"]."</a></li>" ;
                }?>
        </ul>
        </div>
        
        <hr></hr>


        <div class="clearfix"></div> 
        <div class="container-productbox">

            <!-- -->
            <div id="preloader">
            <div id="loader"></div>
            </div>
            <!-- -->
            <ul class="listproduct"> 

            <?php foreach ($tours as $item) { ?>
     
                <div class="item ajaxed __cate_42" >
            
                <a href="tour_detail.php?id=<?php echo $item["MaTour"]; ?>">  <!-- Đường dẫn đến trang chi tiết tour theo Mã Tour --> 

               <!-- <div class="item-label">
                    <span class="lb-tragop">Trả góp 0%</span>
                </div> -->
              
                <div class="item-img item-img_42">
                <img src="<?php echo $item['Hinh']; ?>" class="img-responsive" style="width: 100%" alt='Image' onerror="this.src='uploads/<?php echo $item['Hinh']; ?>'">
               <!-- <img src="https://cdn.tgdd.vn/ValueIcons/Label_01-05.png" width="40" height="40" class="lbliconimg lbliconimg_42 tgdd" /> -->
                </div>
                    <p class="text-dark"><?php echo $item['TenTour']; ?></p>
                    <p class="text-danger"><b>
                                <?php
                                    $giaTour = $item['GiaTour'];
                                    $formattedPrice = number_format($giaTour);
                                    printf("Giá: %s VND\n", $formattedPrice) ; 
                                ?></b>               
                    </p>
                    <p>
                    <a href="tour_cart.php?id=<?php echo $item["MaTour"]; ?>"> <button type="button" class="btn btn-primary"> Đặt tour </button> </a>   

                    <!-- <button type="button" class="btn btn-primary" onclick="location.href='shopping_cart.php?id=<?php echo $item["ProductID"]; ?>'"> Mua hànggggg </button> -->

                </p>
                
                </a>
                </div>

                <?php } ?>

                </ul>
        </div>
    </div>    

   
    <!--<script src ="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src ="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
  
</html>
<!-- Footer -->
<?php require 'footer.php'; ?>







