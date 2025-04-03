<?php
include('../includes/connect.php');

if (isset($_POST['insert_product'])) {

    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $district = $_POST['district'];
    $product_email = $_POST['product_email'];
    $product_contact = $_POST['product_contact'];
    $product_status = 'true';

    // Accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    // Accessing image temporary names
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // Checking empty conditions
    if (empty($product_title) || empty($description) || empty($product_keywords) || 
        empty($product_category) || empty($product_brands) || empty($product_price) || 
        empty($district) || empty($product_email) || empty($product_contact) || 
        empty($product_image1) || empty($product_image2) || empty($product_image3)) {
        echo "<script>alert('Please fill all required fields')</script>";
        exit();
    } else {
        // Store uploaded images within the local machine file
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        // Insert query for products
        $insert_products = "INSERT INTO `products` 
            (product_title, product_description, product_keywords, category_id, 
            brand_id, product_image1, product_image2, product_image3, 
            product_price, district, product_email, product_contact, date, status) 
            VALUES 
            ('$product_title', '$description', '$product_keywords', '$product_category', 
            '$product_brands', '$product_image1', '$product_image2', '$product_image3', 
            '$product_price', '$district', '$product_email', '$product_contact', NOW(), 
            '$product_status')";

        $result_query = mysqli_query($con, $insert_products);

        if ($result_query) {
            echo "<script>alert('Product inserted successfully')</script>";
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
    <title>Insert Product - Admin Dashboard</title>

    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
          crossorigin="anonymous">

    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS -->
    <link rel="stylesheet" href="../style.css">
</head>

<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Product</h1>

        <!-- Form -->
        <form action="" method="post" enctype="multipart/form-data">

            <!-- Title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" 
                       class="form-control" placeholder="Enter product title" 
                       autocomplete="off" required>
            </div>

            <!-- Description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product Description</label>
                <input type="text" name="description" id="description" 
                       class="form-control" placeholder="Enter product description" 
                       autocomplete="off" required>
            </div>

            <!-- Keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" 
                       class="form-control" placeholder="Enter product keywords" 
                       autocomplete="off" required>
            </div>

            <!-- Categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" class="form-select">
                    <option value="">Select Category</option>
                    <?php
                    $select_query = "SELECT * FROM categories";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        echo "<option value='{$row['category_id']}'>{$row['category_title']}</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" class="form-select">
                    <option value="">Select Brand</option>
                    <?php
                    $select_query = "SELECT * FROM brands";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        echo "<option value='{$row['brand_id']}'>{$row['brand_title']}</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Images -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label class="form-label">Product Images</label>
                <input type="file" name="product_image1" class="form-control" required>
                <input type="file" name="product_image2" class="form-control mt-2" required>
                <input type="file" name="product_image3" class="form-control mt-2" required>
            </div>

            <!-- Email -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_email" class="form-label">Email Address</label>
                <input type="email" name="product_email" id="product_email" 
                       class="form-control" placeholder="Enter email address" required>
            </div>

            <!-- Contact -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_contact" class="form-label">Contact No</label>
                <input type="text" name="product_contact" id="product_contact" 
                       class="form-control" placeholder="Enter contact no" required>
            </div>

            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" 
                       class="form-control" placeholder="Enter product price" required>
            </div>

            <!-- District -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="district" class="form-label">District</label>
                <input type="text" name="district" id="district" 
                       class="form-control" placeholder="Enter district" required>
            </div>

            <!-- Insert Button -->
            <div class="w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3" value="Insert Product">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <a href="index.php">
                    <button type="button" class="btn btn-info mb-3 px-3">Back</button>
                </a>
            </div>
        </form>
    </div>
</body>
</html>
