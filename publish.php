<!-- connect php files -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');

session_start();
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
    <link rel="icon" href="images/newlogo.jpg" type="image/icon type">
    
    <style>
        body{
            overflow-x: hidden;
        }
        section{
            min-height: 100%;
        }

        .contact-container{
            max-width: 1000px;
            margin: auto;
            width: 100%;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            background: #606379;
            box-shadow: 0 0 1rem hsla(0, 0%, 100%, 0.16);
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .form-container{
            padding: 20px;
        }

        .form-container h3{
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #fff;
        }

        .contact-form{
            display: grid;
            row-gap: 1rem;
        }

        .contact-form input,
        .contact-form textarea{
            width: 100%;
            border: none;
            outline: none;
            background: #3f414e;
            padding: 10px;
            font-size: 0.9rem;
            color: #fff;
            border-radius: 0.4rem;
        }

        .contact-form textarea{
            resize: none;
            height: 200px;
            width: 450px;
        }

        .contact-form .send-button{
            border: none;
            outline: none;
            background: #0597BE;
            font-size: 1rem;
            font-weight: 500;
            text-transform: uppercase;
            cursor: pointer;
        }

        .contact-form .send-button:hover{
            background: hsl(181, 100%, 44%, 0.8);
            transition: 0.3s all linear;
        }

        /* .map iframe{
            width: 100%;
            height: 100%;
        } */

        @media (max-width: 964px){
            .contact-container{
                margin: 0 auto;
                width: 100%;
            }
        }

        @media (max-width: 700px){
            .contact-container{
                grid-template-columns: 1fr;
                gap: 1rem;
                margin-top: 0rem !important;
            }
            .map iframe{
                height: 400px;
            }
        }
        /* hero image */
        .hero-text h1{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 40px;
            text-align: center;
            margin-top: 100px;
            color: #ffffff;
        }

        .hero-text p{
            color: rgb(221, 223, 224);
            text-align: center;
            margin-top: 100px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: 25px;
        }

        
        /* Contact information*/
        .con-intro{
            text-align: center;
            margin: 30px 0px;
        }

        .con-intro h3{
            font-family: sans-serif;
            font-size: 23px;
            letter-spacing: 0.5px;
        }

        .con-intro h3 span{
            color: red;
        }

        .con-intro p{
            font-family: sans-serif;
            font-weight: 200;
            color: rgb(90, 90, 114);
            font-size: 15px;
            padding-top: 10px;
        }


        /* Description */
        .des{
            margin: 20px 0px;
            text-align: center;
        }

        .des h2{
            font-size: 25px;
            font-weight: 400;
            font-family: 'Times New Roman', Times, serif;
        }

        .des h2 span{
            font-size: 30px;
            color: red;
            font-weight: bold;
        }

        @media (max-width: 2700px){
            .des{
                margin-top: -180px;
            }
        }
        @media (max-width: 1564px){
            .des{
                margin: 50px auto;
                margin-top: -200px;
                width: 90%;
            }
        }
        @media (max-width: 700px){
            .des{
                margin-top: 250px;
                margin-bottom: 100px;
            }
        }

        /* contact boxes */
        .contact-box{
            background-color: #f1f1f1;
            min-height: 50vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .contact-info{
            display: flex;
            width: 100%;
            max-width: 1200px;
            align-items: center;
            justify-content: center;
            padding: 0 20px;
        }

        .card{
            background: #2f3542;
            padding: 0 20px;
            margin: 0 10px;
            width: calc(33% - 20px);
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .card-icon{
            font-size: 28px;
            background: #ff6348;
            width: 60px;
            height: 60px;
            text-align: center;
            line-height: 60px !important;
            border-radius: 50%;
            transition: 0.3s linear;
        }

        .card:hover .card-icon{
            background: none;
            color: #ff6348;
            transform: scale(1.6);
        }

        .card h3{
            text-align: center;
            color: #f1f1f1;
            padding: 10px 0px;
            font-family: sans-serif;
        }

        .card p{
            margin-top: 10px;
            font-weight: 300;
            letter-spacing: 2px;
            max-height: 0;
            opacity: 0;
            transition: 0.3s linear;
            text-align: center;
        }

        .card:hover p{
            max-height: 40px;
            opacity: 1;
        }

        @media screen and (max-width:800px) {
            .contact-info{
                flex-direction: column;
            }
            .card{
                width: 100%;
                max-width: 300px;
                margin: 10px 0;
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
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../about.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Publish Ad</a>
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

<?php

if (isset($_POST['insert_product'])) {

    // Collect form data
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = (int)$_POST['product_category'];  // Cast to integer
    $product_brands = (int)$_POST['product_brands'];  // Cast to integer
    $product_price = (float)$_POST['product_price'];  // Cast to float
    $district = $_POST['district'];
    $product_email = $_POST['product_email'];
    $product_contact = $_POST['product_contact'];
    $product_status = 'true';

    // Supported image formats
    $supported_formats = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'jfif'];

    // Image handling function
    function handle_image_upload($image, $temp_image, $supported_formats) {
        $image_ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
        if (!in_array($image_ext, $supported_formats)) {
            echo "<script>alert('Unsupported image format: $image. Allowed formats: " . implode(', ', $supported_formats) . "')</script>";
            exit();
        }
        move_uploaded_file($temp_image, "./product_images/$image");
    }

    // Accessing and validating images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    handle_image_upload($product_image1, $temp_image1, $supported_formats);
    handle_image_upload($product_image2, $temp_image2, $supported_formats);
    handle_image_upload($product_image3, $temp_image3, $supported_formats);


    // Checking empty conditions
    if (empty($product_title) || empty($description) || empty($product_keywords) || empty($product_category) || empty($product_brands)
        || empty($product_price) || empty($district) || empty($product_email) || empty($product_contact) || empty($product_image1) || empty($product_image2) || empty($product_image3)) {
        echo "<script>alert('Please fill all required fields')</script>";
        exit();
    } else {
        // Store uploaded images within the local machine file
        move_uploaded_file($temp_image1, "../admin_area/product_images/$product_image1");
        move_uploaded_file($temp_image2, "../admin_area/product_images/$product_image2");
        move_uploaded_file($temp_image3, "../admin_area/product_images/$product_image3");

        // Insert query for products
        $insert_products = "
            INSERT INTO `user_ads` 
            (product_title, product_description, product_keywords, category_id, brand_id, 
            product_image1, product_image2, product_image3, product_price, district, 
            product_email, product_contact, date, status) 
            VALUES 
            ('$product_title', '$description', '$product_keywords', $product_category, $product_brands, 
            '$product_image1', '$product_image2', '$product_image3', $product_price, 
            '$district', '$product_email', '$product_contact', NOW(), '$product_status')";

        $result_query = mysqli_query($con, $insert_products);
        if ($result_query) {
            // Get the last inserted product ID
            $product_id = mysqli_insert_id($con);

            // Insert into 'orders_pending' table
            $insert_order_pending = "
                INSERT INTO `orders_pending` 
                (product_id, title, product_description, product_keywords, category_id, brand_id, 
                product_image1, product_image2, product_image3, product_email, product_contact, 
                product_price, district, date, status) 
                VALUES 
                ($product_id, '$product_title', '$description', '$product_keywords', 
                $product_category, $product_brands, '$product_image1', '$product_image2', 
                '$product_image3', '$product_email', '$product_contact', $product_price, 
                '$district', NOW(), 'pending')";

            $result_order_pending = mysqli_query($con, $insert_order_pending);

            if ($result_order_pending) {
                echo "<script>alert('Details inserted successfully')</script>";
                echo "<script>window.location.href='profile.php';</script>";
            } else {
                echo "Error inserting into orders_pending: " . mysqli_error($con);
            }
        } else {
            echo "Error inserting into products: " . mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert product-Admin Dashboard</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS -->
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center mb-5">Publish Details</h1>
        <!-- Form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
            </div>

            <!-- Description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
            </div>

            <!-- Keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">
            </div>

            <!-- Categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select" required>
                    <option value="">Select Category</option>
                    <?php
                    $select_query = "Select * from categories";
                    $result_query = mysqli_query($con, $select_query);

                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];

                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select" required>
                    <option value="">Select Brands</option>
                    <?php
                    $select_query = "SELECT * FROM brands";
                    $result_query = mysqli_query($con, $select_query);

                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];

                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" autocomplete="off" required="required" placeholder="add jpg images">
            </div>

            <!-- Image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" autocomplete="off" required="required">
            </div>

            <!-- Image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" autocomplete="off" required="required">
            </div>

            <!-- Email -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_email" class="form-label">Email Address</label>
                <input type="email" name="product_email" id="product_email" class="form-control" placeholder="Enter email address" autocomplete="off" required="required">
            </div>

            <!-- Contact -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_contact" class="form-label">Contact No</label>
                <input type="text" name="product_contact" id="product_contact" class="form-control" placeholder="Enter contact no" autocomplete="off" required="required">
            </div>

            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="number" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
            </div>

            <!-- District -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="district" class="form-label">District</label>
                <input type="text" name="district" id="district" class="form-control" placeholder="Enter district" autocomplete="off" required="required">
            </div>

            <!-- Buttons -->
            <div class="w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3" value="Publish">
                <a href="profile.php" class="btn btn-secondary mb-3">Back</a>
            </div>

        </form>
    </div>

    <!-- last child -->
    <?php
        include("../includes/footer.php")
    ?>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
    crossorigin="anonymous"></script>
</body>
</html>
