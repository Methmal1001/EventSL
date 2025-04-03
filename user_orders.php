<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
</head>
<body>

<?php
// Include the database connection file
include('../includes/connect.php');

// Handle status update request
if (isset($_GET['confirm_product_id'])) {
    $product_id = (int)$_GET['confirm_product_id']; // Cast to int for security

    // Update the status to 1 (confirmed) for the selected product
    $update_status_query = "UPDATE `orders_pending` SET status = 1 WHERE product_id = $product_id";
    $update_result = mysqli_query($con, $update_status_query);

    if ($update_result) {
        header("Location: ads_pending.php"); // Redirect to avoid resubmission
        exit();
    } else {
        echo "<script>alert('Failed to update status.');</script>";
    }
}
?>

<h3 class="text-center text-success">Ads Pending</h3>

<table class="table table-bordered mt-5">
    <thead class="bg-info" style="background-color: blue;">
        <tr>
            <th class="bg-info">Product ID</th>
            <th class="bg-info">Product Title</th>
            <th class="bg-info">Product Image</th>
            <th class="bg-info">Date</th>
            <th class="bg-info">Status</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
    <?php
    // Fetch all pending orders
    $get_products = "SELECT * FROM `orders_pending`";
    $result = mysqli_query($con, $get_products);

    // Loop through the fetched products and display them in the table
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['product_id'];
        $title = $row['title'];
        $product_image1 = $row['product_image1'];
        $date = $row['date'];
        $status = $row['status'] == 0 ? 'Pending' : 'Confirmed';
    ?>
        <tr class='text-center'>
            <td class="bg-secondary text-light"><?php echo $product_id; ?></td>
            <td class="bg-secondary text-light"><?php echo $title; ?></td>
            <td class="bg-secondary text-light">
                <img src='../admin_area/product_images/<?php echo $product_image1; ?>' 
                     class='product_img' 
                     style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px; border: 1px solid #ddd;">
            </td>
            <td class="bg-secondary text-light"><?php echo $date; ?></td>
            <td class="bg-secondary text-light"><?php echo $status; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<!-- Bootstrap JS and jQuery should be included for modals to work -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
