<!-- connect php files -->
<?php
include('includes/connect.php');
include('functions/common_function.php');

session_start();

// Clear the cache for the page
header("Cache-Control: no-cache, no-store, must-revalidate"); // Prevent caching
header("Pragma: no-cache"); // For HTTP/1.0 compatibility
header("Expires: 0"); // Expiration time is set to 0, meaning the content is always fresh

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyWedding</title>
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
    crossorigin="anonymous">
    <!-- Fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  
    <!-- css -->
    <link rel="stylesheet" href="./style.css">

    <!-- Addressbar icon -->
    <link rel="icon" href="./images//logo.jpg" type="image/icon type">

    <style>
        /* footer section */
*,*:before,*:after{
    box-sizing: border-box;
}

/* body{
    font-family: poppins;
    margin: 0;
    display: grid;
    font-size: 14px;
} */

.footer{
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    flex-flow: row wrap;
    padding: 50px;
    color: #fff;
    background-color: #05506B;
}

.footer > *{
    flex: 1 100%;
}

.footer-left{
    margin-right: 1.25rem;
    margin-bottom: 2rem;
}

.footer-left img{
    background: white;
    margin-bottom: 15px;
    width: 100px;
}

h2{
    font-weight: 600;
    font-size: 17px;
}

.footer ul{
    list-style: none;
    padding-left: 0;
}

.footer li{
    line-height: 2rem;
}

.footer a{
    text-decoration: none;
}

.footer-right{
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    flex-flow: row wrap;
}

.footer-right > *{
    flex: 1 50%;
    margin-right: 1.25rem;
}

.box a{
    color: #999;
}

.box a:hover{
    color: #fff0f0;
}

.footer-bottom{
    text-align: center;
    color: #f1f1f1;
    padding-top: 50px;
}

.footer-left p{
    padding-right: 20%;
    color: #e2e1e1;
    margin: 15px 0px;
}

.socials a{
    background: #364a62;
    width: 40px;
    height: 40px;
    display: inline-block;
    margin-right: 10px;
}

.socials a:hover{
    background: #3b4757;
}

.socials a i{
    color: #808585ee;
    padding: 10px 12px;
    font-size: 20px;
}

.socials a i:hover{
    color: #ffffff;
}

@media screen and (min-width: 600px){
    .footer-right > *{
        flex: 1;
    }
    .footer-left{
        flex: 1 0px;
    }
    .footer-right{
        flex: 2 0px;
    }
}

@media (max-width: 600px){
    .footer{
        padding: 15px;
    }
    main{
        font-size: 55px;
    }
}
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="images//logo.jpg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="termscon.php">Terms & Condition</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="./users_area/profile.php">My Account</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="publish.php">Publish Ad</a>
        </li>
        
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
        name="search_data">
        <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
        <input type="submit" value="Search" name="search_data_product" class="btn btn-outline-light">
      </form>
    </div>
  </div>
</nav>


<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <ul class="navbar-nav me-auto">

        <?php

        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
        </li>";
        }
        
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/user_login.php'>Login</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/logout.php'>Logout</a>
        </li>";
        }
        
        ?>
</ul>
</nav>

<!-- third child -->
<div class="bg-light">
  <h3 class="text-center" style='color:red; font-weight:bolder; font-size:90px;'>My<span  style='font-size:70px; font-weight:bold; color:#585858;'>Wedding</span></h3>
  <p class="text-center" style='font-weight:bold; color:#5F0A0A; font-size:20px;'>This is the best place to find your favoures.</p>
</div>

<!-- fourth child -->
<div class="row px-1">
  <div class="col-md-10">
    <!-- products -->
      <div class="row">

      <!-- card -->
      <!-- <div class="col-md-4">
        
        <div class='card'>
              <img src='./images/pep1.jpg' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <a href='#' class='btn btn-info'>Add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
              </div>
            </div>
      </div> -->

      <!-- <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center text-info mb-4">Related Products</h4>
            </div>
            <div class="col-md-6">
            <img src='./images/cola2.jpg' class='card-img-top' alt='$product_title'>
            </div>
            <div class="col-md-6">
            <img src='./images/cola2.jpg' class='card-img-top' alt='$product_title'>
            </div>
        </div>
      </div> -->

        <!-- fetching products -->
        <?php
        //   $select_query = "SELECT * FROM products order by brand() limit 0,9";
        //   $result_query = mysqli_query($con, $select_query);
        //   // $row = mysqli_fetch_assoc($result_query);
        //   // echo $row['product_title'];
        //   while($row = mysqli_fetch_assoc($result_query)){
        //     $product_id=$row['product_id'];
        //     $product_title=$row['product_title'];
        //     $product_description=$row['product_description'];
        //     $product_image1=$row['product_image1'];
        //     $product_price=$row['product_price'];
        //     $category_id=$row['category_id'];
        //     $brand_id=$row['brand_id'];

        //     echo "<div class='col-md-4 mb-2'>
        //     <div class='card'>
        //       <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
        //       <div class='card-body'>
        //         <h5 class='card-title'>$product_title</h5>
        //         <p class='card-text'>$product_description</p>
        //         <a href='#' class='btn btn-info'>Add to cart</a>
        //         <a href='#' class='btn btn-secondary'>View more</a>
        //       </div>
        //     </div>
        // </div>";
        //   }

        // calling function
        // getproducts();
        view_details();
        get_unique_categories();
        get_unique_brands();
        ?>



        <!-- <div class="col-md-4 mb-2">
          <div class="card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzSauthm5Fs1M5HU-E-4phBGzoax79OtanfSFk12b_haR6GM00FaWeLgNtz3xa2p738P4&usqp=CAU" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-info">Add to cart</a>
              <a href="#" class="btn btn-secondary">View more</a>
            </div>
          </div>
      </div> -->
    <!-- row end -->

  </div> 
  <!-- column end -->
</div>
  
</div>



<!-- last child -->
<!-- Footer Section -->
<footer class="footer">
        <div class="footer-left">
            <a href="index.php">
                <img src="main_image/logo.jpg" alt="">
            </a>
            <p>MyWedding website is helped to plan your special events with best solutions.</p>

                <div class="socials">
                    <a href="navigation.html"><i class="fa-brands fa-square-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                    <!-- <a href="#"><i class="fa-brands fa-youtube"></i></a> -->
                </div>
        </div>

        <ul class="footer-right">
            <li>
                <h2>SERVICES</h2>

                <ul class="box">
                    <li><a href="#">24/7 Support and Monitoring</a></li>
                    <li><a href="#">Best Market place</a></li>
                </ul>
            </li>
            <li class="features">
                <h2>Useful Links</h2>

                <ul class="box">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </li>
            <li>
                <h2>CONTACT US</h2>

                <ul class="box">
                    <li><a href="#">+94 xx xxx xxxx</a></li>
                    <li><a href="#">mywedding@gmail.com</a></li>
                </ul>
            </li>
        </ul>

        <div class="footer-bottom">
            <p>All Right reserved by &copy; MyWedding.com</p>
        </div>
    </footer>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
crossorigin="anonymous"></script>

</body>
</html>