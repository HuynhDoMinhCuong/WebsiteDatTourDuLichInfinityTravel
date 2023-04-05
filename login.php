
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <!-- <link href="site.css" rel="stylesheet" /> -->
    <title>Trang đăng nhập</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
</head>

    

<h1> ĐĂNG NHẬP TÀI KHOẢN </h1>
<?php include_once("header.php"); ?> 
<?php
    if (isset($_SESSION['user'])!="") {
        header("Location: index.php");
    }
    require_once("entities/user.class.php");
    if (isset($_POST['btn-login'])) { 
        $u_name = $_POST['txtname']; 
        $u_email = $_POST['txtemail']; 
        $u_pass = $_POST['txtpass'];
        $account = new User ($u_name, $u_email, $u_pass);
        $result = $account->checkLogin($u_name, $u_pass);
        if (!$result) {
        ?>
        <script>alert('Tài khoản và mật khẩu không đúng! Vui lòng nhập lại!');</script>
        <?php
        }
        else {
        $_SESSION['user'] = $u_name;
        header("Location: index.php");
        }
    }
    
?>

<?php //include_once('style.php'); ?>


<?php // require 'headerImages.php'; ?>


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

    <h2> </h2>

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
  <!-- Form Thêm sản phẩm -->
  <form method="post">
        <!-- Tk -->
        <div class="row">
            <div class="form-group">
                <label>Tài khoản:</label>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="txtname" value="<?php echo isset($_POST["txtname"]) ? $_POST["txtname"] : "" ?>">
            </div>
        </div>
        <!-- Pass -->
        <div class="row">
            <div class="form-group">
                <label>Mật khẩu:</label>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="txtpass" value="<?php echo isset($_POST["txtquantity"]) ? $_POST["txtpass"] : "" ?>">
            </div>
        </div>

          <!-- Email -->
          
            <div class="form-group">
               
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" name="txtemail" value="<?php echo isset($_POST["txtemail"]) ? $_POST["txtemail"] : "" ?>">
            </div>
       
     
        <div class="row">
           
            <div class="submit">
                <button type="submit" class="btn btn-primary" name="btn-login">Đăng nhập</button>
                <button type='button' onclick="location.href= 'Index.php'" class='btn btn-success'> Quay lại trang chủ </button>
             
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

