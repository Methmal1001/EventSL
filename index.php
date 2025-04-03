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


<?php
//Fetch the logged-in users count

// $select_query = "SELECT COUNT(*) AS logged_in_count FROM user_table WHERE login_status = 1";
// $result_query = mysqli_query($con, $select_query);
// $row = mysqli_fetch_assoc($result_query);
// $logged_in_count = $row['logged_in_count'];
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


/* Advertising */

.advertising {
    margin-top: 150px;
    display: flex; /* Align images in a row */
    gap: 20px; /* Space between the images */
    padding: 20px; /* Padding around the entire container */
    justify-content: center; /* Center the images horizontally */
    flex-wrap: wrap; /* Allow images to wrap to the next line */
}

.advertising a { 
    display: block; /* Make the anchor tag behave like a block element */
    padding: 10px; /* Padding around each image */
    flex: 1 1 100%; /* Make each anchor tag (and image) take 100% width */
    box-sizing: border-box; /* Include padding and border in width/height calculation */
}

.advertising img {
    width: 100%; /* Make the image fill the width of its parent (the anchor tag) */
    height: auto; /* Keep the aspect ratio of the image */
    object-fit: cover; /* Ensure the image covers the area without distortion */
    border-radius: 8px; /* Optional: Adds rounded corners to the images */
}

/* Media query for screens less than 850px (optional) */
@media (max-width: 850px) {
    .advertising a {
        flex: 1 1 100%; /* Ensure images are stacked on smaller screens */
    }
}

/* Media query for screens less than 816px (optional) */
@media (max-width: 816px) {
    .advertising a {
        flex: 1 1 100%; /* Images take up the full width (stack vertically) */
    }
}




/* More button styling */
.more-btn {
    display: flex;
    justify-content: center;
    margin-top: 70px;
    margin-bottom: 50px;
}

.more-btn .btn {
    background-color: #b50000; /* Button background color */
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 15px;
    font-weight: bold;
    transition: background-color 0.3s, transform 0.3s;
    text-align: center;
}

.more-btn .btn a {
    color: #fff; /* Text color */
    text-decoration: none;
}

.more-btn .btn:hover {
    background-color: #6c1010; /* Darker color on hover */
    transform: scale(1.05); /* Slight scale up on hover */
}

.more-btn .btn a:hover {
    color: #fff; /* Lighten text on hover */
}


/* Sponser advertisement */

.add-title {
    text-align: center;
    font-size: 25px;
    font-weight: bolder;
    font-family: sans-serif;
    padding: 50px 0;
    margin-bottom: 15px;
    margin-top: 30px;
    color: darkred;
}

.add-title h1 {
    color: #046398;
    font-weight: bold;
    font-family: sans-serif;
    font-size: 40px;
}

.sponser {
    align-items: center;
    justify-content: center;
}

.slider {
    height: 200px; /* Fixed height to fit images */
    margin: auto;
    overflow: hidden;
    position: relative;
    width: 100%; /* Full width of the container */
    margin-left: auto;
    margin-right: auto;
}

.slider .slide-track {
    display: flex;
    animation: scroll 60s linear infinite; /* Continuous loop */
}

.slider .slide {
    height: 200px; /* Fixed height for each slide */
    width: 200px;  /* Fixed width for each slide */
    margin-right: 30px; /* Spacing between images */
}

.slider .slide a {
    display: block; /* Make the link fill the slide */
    text-decoration: none; /* Remove underline from links */
}

.slider .slide img {
    width: 200px; /* Fixed width for images */
    height: 200px; /* Fixed height for images */
    object-fit: cover; /* Maintain aspect ratio while filling area */
}

.middle {
  margin-left: 100px;
  margin-right: 100px;
}

/* Keyframe to create a seamless scroll from right to left */
@keyframes scroll {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-100%); /* Scroll all images out of view */
    }
}

@media (max-width: 798px) {
    .slider .slide-track {
        animation: scroll 60s linear infinite;
    }
}

@media (max-width: 798px) {
  .middle {
    margin-left: 50px;
    margin-right: 50px;
  }
}

@media (max-width: 850px) {
  .middle {
    margin-left: 50px;
    margin-right: 50px;
  }
}


    </style>


     <!-- sponser image rotation -->
      <script>
        document.addEventListener("DOMContentLoaded", function() {
      const sliderTrack = document.querySelector('.slider .slide-track');
      const slides = document.querySelectorAll('.slider .slide');

      // Duplicate the slides to make the loop continuous
      slides.forEach(slide => {
          const clone = slide.cloneNode(true); // Clone each slide
          sliderTrack.appendChild(clone); // Append clone to the track
      });
  });

    </script>
    
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
        <!-- <li class="nav-item">
          <a class="nav-link" href="./users_area/user_login.php">Login</a>
        </li> -->
</ul>
</nav>


<!-- third child -->
<div class="bg-light">
  <h3 class="text-center" style='color:red; font-weight:bolder; font-size:90px;'>My<span  style='font-size:70px; font-weight:bold; color:#585858;'>Wedding</span></h3>
  <p class="text-center" style='font-weight:bold; color:#5F0A0A; font-size:20px;'>This is the best place to find your favoures.</p>
</div>


<!-- Logged-in Users Count Box 
<div class="bg-light text-center py-3">
    <h4 class="text-info">Connected Audience 
        <span class="badge bg-success" id="userCount">0</span>
    </h4>
</div> -->

<!-- JavaScript for Count Animation 
<script>
    // Initialize variables
    const targetCount = <?php echo $logged_in_count; ?>;
    const duration = 60000; // 10 seconds
    const interval = 75; // 75ms intervals for smooth animation
    const increment = Math.ceil(targetCount / (duration / interval));
    
    let currentCount = 0;
    
    const counter = setInterval(() => {
        currentCount += increment;
        if (currentCount >= targetCount) {
            currentCount = targetCount; // Ensure it doesn't exceed the target
            clearInterval(counter);
        }
        document.getElementById('userCount').innerText = currentCount;
    }, interval);
</script> -->


<div class="middle">
  
<!-- fourth child -->
<div class="row px-1">
  <div class="col-md-10">
    <!-- products -->
      <div class="row">
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
        getproducts();
        get_unique_categories();
        get_unique_brands();
        // $ip = getIPAddress();  
        // echo 'User Real IP Address - '.$ip; 
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

  <div class="col-md-2 bg-secondary p-0">
    <!-- brands to be displayed -->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h4>Brands</h4></a>
      </li>

      <?php
      //   $select_brands="Select * from brands ";
      //   $result_brands=mysqli_query($con,$select_brands);
      //   // $row_data=mysqli_fetch_assoc($result_brands);
      //   // echo $row_data['brand_title'];

      //   while($row_data=mysqli_fetch_assoc($result_brands)){
      //     $brand_title = $row_data['brand_title'];
      //     $brand_id = $row_data['brand_id']; 
      //     echo "<li class='nav-item'>
      //               <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
      //           </li>";
      // }
      
      getbrands();
      ?>

      <!-- <li class="nav-item">
        <a href="#" class="nav-link text-light">Brand1</a>
      </li> -->
    </ul>

    <!-- categories to be displayed -->
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item bg-info">
        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
      </li>

      <?php
      //   $select_categories="Select * from categories ";
      //   $result_categories=mysqli_query($con,$select_categories);
      //   // $row_data=mysqli_fetch_assoc($result_brands);
      //   // echo $row_data['brand_title'];

      //   while($row_data=mysqli_fetch_assoc($result_categories)){
      //     $category_title = $row_data['category_title'];
      //     $category_id = $row_data['category_id'];
      //     echo "<li class='nav-item'>
      //               <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
      //           </li>";
      // }
      
      getcategories();
      ?>

      <!-- <li class="nav-item">
        <a href="#" class="nav-link text-light">category1</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-light">category2</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-light">category3</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-light">category4</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-light">category5</a>
      </li> -->
    </ul>

    <!-- Advertising -->
    <div class="add-space">
      <div class="advertising">
        <a href="#">
          <img src="https://c4.wallpaperflare.com/wallpaper/41/681/303/pc-hd-1080p-nature-1920x1080-wallpaper-preview.jpg" alt="">
        </a>
        <a href="#">
          <img src="https://images.pexels.com/photos/443446/pexels-photo-443446.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
        </a>
        <a href="#">
          <img src="https://www.pixelstalk.net/wp-content/uploads/2016/06/Peacock-background-hd-wallpaper-620x388.jpg" alt="">
        </a>
        <a href="#">
          <img src="https://c4.wallpaperflare.com/wallpaper/41/681/303/pc-hd-1080p-nature-1920x1080-wallpaper-preview.jpg" alt="">
        </a>
        <a href="#">
          <img src="https://images.pexels.com/photos/443446/pexels-photo-443446.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
        </a>
        <a href="#">
          <img src="https://www.pixelstalk.net/wp-content/uploads/2016/06/Peacock-background-hd-wallpaper-620x388.jpg" alt="">
        </a>
      </div>
    </div>
  </div>
</div>

<!-- More button -->
 <div class="more-btn">
    <div class="btn text-light">
      <h3><a href="display_all.php">More</a></h3>
    </div>
 </div>

<!-- Sponser advertisement -->

<div class="add-title">
    <h1>Our Sponsors</h1>
</div>

<div class="slider">
    <div class="slide-track">
        <div class="slide">
            <a href="#" target="_blank">
                <img src="./images/login.jpg" alt="Sponsor 1">
            </a>
        </div>
        <div class="slide">
            <a href="#" target="_blank">
                <img src="./images/logo.jpg" alt="Sponsor 2">
            </a>
        </div>
        <div class="slide">
            <a href="#" target="_blank">
                <img src="./images/avatar.jpg" alt="Sponsor 3">
            </a>
        </div>
        <div class="slide">
            <a href="#" target="_blank">
                <img src="./images/logo.jpg" alt="Sponsor 4">
            </a>
        </div>
        <div class="slide">
            <a href="#" target="_blank">
                <img src="./images/regi.jpg" alt="Sponsor 5">
            </a>
        </div>
        <div class="slide">
            <a href="#" target="_blank">
                <img src="./images/logo.jpg" alt="Sponsor 6">
            </a>
        </div>
    </div>
</div>



</div>


<!-- last child -->
<?php
    include("./includes/footer.php")
?>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
crossorigin="anonymous"></script>

</body>
</html>