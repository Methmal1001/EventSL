<?php
// Include the database connection
include('../includes/connect.php');

// Handle product confirmation and transfer from orders_pending to products
if (isset($_GET['confirm_product_id'])) {
    $product_id = $_GET['confirm_product_id'];

    // Start a transaction to ensure data consistency
    $con->begin_transaction();

    try {
        // Step 1: Fetch all product details from `orders_pending`
        $get_product_details = "
            SELECT product_id, title AS product_title, product_description, product_keywords, 
                   category_id, brand_id, product_image1, product_image2, product_image3, 
                   product_email, product_contact, product_price, district, date, status 
            FROM orders_pending WHERE product_id = ?";
        $stmt_details = $con->prepare($get_product_details);

        if (!$stmt_details) {
            die("Prepare failed: " . $con->error);
        }

        $stmt_details->bind_param("i", $product_id);
        $stmt_details->execute();
        $result_details = $stmt_details->get_result();

        if ($result_details->num_rows > 0) {
            $product = $result_details->fetch_assoc();

            // Step 2: Insert the fetched product data into the `products` table
            $insert_product_query = "
                INSERT INTO products (
                    product_id, product_title, product_description, product_keywords, 
                    category_id, brand_id, product_image1, product_image2, product_image3, 
                    product_email, product_contact, product_price, district, date, status
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE 
                    product_title = VALUES(product_title),
                    product_description = VALUES(product_description),
                    product_keywords = VALUES(product_keywords),
                    category_id = VALUES(category_id),
                    brand_id = VALUES(brand_id),
                    product_image1 = VALUES(product_image1),
                    product_image2 = VALUES(product_image2),
                    product_image3 = VALUES(product_image3),
                    product_email = VALUES(product_email),
                    product_contact = VALUES(product_contact),
                    product_price = VALUES(product_price),
                    district = VALUES(district),
                    date = VALUES(date),
                    status = VALUES(status)";

            $stmt_insert = $con->prepare($insert_product_query);

            if (!$stmt_insert) {
                die("Prepare failed: " . $con->error);
            }

            // Bind the fetched data directly to the insert query
            $stmt_insert->bind_param(
                "isssiisssssdssi",     // ** Details format as string, int or other
                $product['product_id'], 
                $product['product_title'], 
                $product['product_description'], 
                $product['product_keywords'], 
                $product['category_id'], 
                $product['brand_id'], 
                $product['product_image1'],  
                $product['product_image2'], 
                $product['product_image3'], 
                $product['product_email'], 
                $product['product_contact'], 
                $product['product_price'], 
                $product['district'], 
                $product['date'], 
                $product['status']
            );

            // Execute and check for errors
            if (!$stmt_insert->execute()) {
                echo "<script>console.log('Error in product insertion: " . $stmt_insert->error . "');</script>";
            }

            // Step 3: Mark the product as confirmed in `orders_pending`
            $update_status_query = "UPDATE orders_pending SET status = 1 WHERE product_id = ?";
            $stmt_update_status = $con->prepare($update_status_query);

            $stmt_update_status->bind_param("i", $product_id);
            $stmt_update_status->execute();

            echo "<script>alert('Product confirmed and transferred successfully.'); 
                  window.location='ads_pending.php';</script>";
        } else {
            echo "<script>alert('No product found with this ID.'); 
                  window.location='ads_pending.php';</script>";
        }

        // Commit the transaction
        $con->commit();

        // Close the prepared statements
        $stmt_details->close();
        $stmt_insert->close();
        $stmt_update_status->close();
    } catch (Exception $e) {
        // Rollback the transaction on error
        $con->rollback();
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}

// Handle product deletion
if (isset($_GET['delete_product_id'])) {
    $product_id_to_delete = $_GET['delete_product_id'];

    // Start a transaction to ensure data consistency
    $con->begin_transaction();

    try {
        // Delete the product from the orders_pending table
        $delete_query = "DELETE FROM orders_pending WHERE product_id = ?";
        $stmt_delete = $con->prepare($delete_query);

        if (!$stmt_delete) {
            die("Prepare failed: " . $con->error);
        }

        $stmt_delete->bind_param("i", $product_id_to_delete);

        if (!$stmt_delete->execute()) {
            echo "<script>console.log('Error in product deletion: " . $stmt_delete->error . "');</script>";
        } else {
            echo "<script>alert('Product deleted successfully.'); window.location='ads_pending.php';</script>";
        }

        // Commit the transaction
        $con->commit();

        // Close the prepared statement
        $stmt_delete->close();
    } catch (Exception $e) {
        // Rollback the transaction on error
        $con->rollback();
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}

// Fetch all pending orders (for displaying in the table) with descending order
$get_products = "
    SELECT product_id, title, product_image1, product_email, product_contact, 
           date, set_date, status FROM orders_pending
    ORDER BY date DESC";  // Change this line to sort by date in descending order
$result = mysqli_query($con, $get_products);

if (!$result) {
    die("Query Failed: " . mysqli_error($con));
}
?>

<h3 class="text-center text-success">Ads Pending</h3>

<table class="table table-bordered mt-5">
    <thead class="bg-primary text-light">
        <tr>
            <th>Product ID</th>
            <th>Title</th>
            <th>Image</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Date</th>
            <!-- <th>Set Date</th> -->
            <th>Status</th>
            <th>Confirm</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-light text-dark">
    <?php while ($row = mysqli_fetch_assoc($result)) { 
        $product_id = $row['product_id'];
        $title = $row['title'];
        $product_image1 = $row['product_image1'];
        $product_email = $row['product_email'];
        $product_contact = $row['product_contact'];
        $date = $row['date'];
        $set_date = $row['set_date'];
        $status = $row['status'] == 0 ? 'Pending' : 'Confirmed';
    ?>
        <tr class='text-center <?php echo ($row['status'] == 0) ? 'table-warning' : 'table-success'; ?>'>
            <td><?php echo $product_id; ?></td>
            <td><?php echo $title; ?></td>
            <td>
                <img src='../admin_area/product_images/<?php echo $product_image1; ?>' 
                     class='product_img' 
                     style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px; border: 1px solid #ddd;">
            </td>
            <td><?php echo $product_contact; ?></td>
            <td><?php echo $product_email; ?></td>
            <td><?php echo $date; ?></td>
            <!-- <td><?php echo $set_date; ?></td> -->
            <td><?php echo $status; ?></td>
            <td>
                <?php if ($row['status'] == 0) { ?>
                    <a href='ads_pending.php?confirm_product_id=<?php echo $product_id; ?>' class='btn btn-success'>OK</a>
                <?php } else { ?>
                    <button class='btn btn-secondary' disabled>Confirmed</button>
                <?php } ?>
            </td>
            <td>
                <a href="javascript:void(0);" 
                   onclick="confirmDelete(<?php echo $product_id; ?>);" 
                   class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<script type="text/javascript">
    function confirmDelete(productId) {
        if (confirm("Are you sure you want to delete this product?")) {
            // Redirect to a PHP script that will handle the deletion
            window.location = "ads_pending.php?delete_product_id=" + productId;
        }
    }
</script>