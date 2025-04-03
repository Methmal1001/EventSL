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
          <a class="nav-link" href="#">Terms & Condition</a>
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


    <!-- Terms & Conditions -->
    <div class="about mt-5 text-center mb-5 w-50" style="background-color:#d0d0d2; padding:20px; margin-left:auto; margin-right:auto;">
            <h3 style="color:#bb0404; font-weight: bold; font-size: 40px; padding: 20px;">Terms & Conditions</h3>

        <div class="details mt-2 text-center">
        <p style="background-color:#edf1f1; margin-left:auto; margin-right:auto; padding:20px; color:#000; font-family: Arial (sans-serif); text-align: left;">
        <span style="font-weight: bolder; font-size: 18px;">For Advertisers:</span> <br><br>

        1. Contact Responsibility: MyWedding is not responsible for any personal issues related to the provided contact details in your advertisement. <br><br>
        2. Advertising Duration: We offer a limited period for free advertising, as specified. <br><br>
        3. Publication Timing: Your advertisement will be published within 24 hours if it meets our guidelines. <br><br>
        4. Image Support: We support up to 3 images per advertisement. <br><br>
        5. Platform Purpose: MyWedding provides a platform to display your advertisement to users but is not responsible for any interactions or concerns related 
        to your contacts.<br><br>

        <span style="font-weight: bolder; font-size: 18px;">For Users:</span> <br><br>

        Viewing Only: MyWedding is a view-only platform, without a messaging box or direct chat options with advertisers.

        </p>
        
        </div>
    </div>



    <!-- last child -->
    <?php
        include("./includes/footer.php")
    ?>
  </div>
  </div>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
crossorigin="anonymous"></script>

</body>
</html>