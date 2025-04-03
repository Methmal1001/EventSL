<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
include('../includes/connect.php');

// Handle the form submission for updating the set date
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $set_date = $_POST['set_date'];

    // Update the set_date in the database
    $update_query = "UPDATE orders_pending SET set_date = ? WHERE product_id = ?";
    $stmt = $con->prepare($update_query);

    if ($stmt) {
        $stmt->bind_param("si", $set_date, $product_id);
        $stmt->execute();
        $stmt->close();
        echo "<script>alert('Set date updated successfully.'); window.location='ads_pending.php';</script>";
    } else {
        echo "<script>alert('Error updating set date: " . $con->error . "');</script>";
    }
}

// Automatically delete expired products and move them to delete_data
$current_time = new DateTime();
$current_time_formatted = $current_time->format('Y-m-d H:i:s');

// Start a transaction to ensure atomic operations
$con->begin_transaction();

try {
    // Select expired products from orders_pending
    $select_expired_orders = "SELECT product_id, title AS product_title, product_contact, date 
                              FROM orders_pending WHERE set_date < ?";
    $stmt_select = $con->prepare($select_expired_orders);

    if (!$stmt_select) {
        throw new Exception("Prepare failed (select expired): " . $con->error);
    }

    $stmt_select->bind_param("s", $current_time_formatted);
    $stmt_select->execute();
    $result_expired = $stmt_select->get_result();

    // Prepare the insertion query for delete_data table
    $insert_delete_data = "INSERT INTO delete_data (product_id, product_title, product_contact, date) 
                           VALUES (?, ?, ?, ?)";
    $stmt_insert = $con->prepare($insert_delete_data);

    if (!$stmt_insert) {
        throw new Exception("Prepare failed (insert into delete_data): " . $con->error);
    }

    // Loop through the expired orders and insert them into delete_data
    while ($row = $result_expired->fetch_assoc()) {
        $stmt_insert->bind_param(
            "isss", 
            $row['product_id'], 
            $row['product_title'], 
            $row['product_contact'], 
            $row['date']
        );
        $stmt_insert->execute();
    }

    // Delete the expired orders from orders_pending
    $delete_orders_query = "DELETE FROM orders_pending WHERE set_date < ?";
    $stmt_delete_orders = $con->prepare($delete_orders_query);

    if (!$stmt_delete_orders) {
        throw new Exception("Prepare failed (delete expired orders): " . $con->error);
    }

    $stmt_delete_orders->bind_param("s", $current_time_formatted);
    $stmt_delete_orders->execute();

    // Commit the transaction
    $con->commit();

    // Close all prepared statements
    $stmt_select->close();
    $stmt_insert->close();
    $stmt_delete_orders->close();

    // echo "<script>alert('Expired products processed successfully.');</script>";

} catch (Exception $e) {
    // Roll back the transaction in case of an error
    $con->rollback();
    echo "<script>alert('Error processing data: " . $e->getMessage() . "');</script>";
}

// Fetch all pending orders for display
$get_products = "SELECT product_id, title, product_image1, product_contact, product_email, date, set_date, status 
                 FROM orders_pending
                 ORDER BY date DESC";

$result = mysqli_query($con, $get_products);

if (!$result) {
    die("Query Failed: " . mysqli_error($con));
}
?>

<h3 class="text-center text-success">Deleted Ads</h3>

<table class="table table-bordered mt-5">
    <thead class="bg-primary text-light">
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Date</th>
            <th>Status</th>
            <th>Confirmation</th>
            <th>Delete</th>
            <th>Active</th> <!-- Column to show the number of days, hours, and minutes -->
        </tr>
    </thead>
    <tbody class="bg-light text-dark">
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['product_id'];
        $title = $row['title'];
        $product_image1 = $row['product_image1'];
        $product_contact = $row['product_contact'];
        $product_email = $row['product_email'];
        $date = $row['date'];  // The product's insertion date
        $status = $row['status'] == 0 ? 'Pending' : 'Confirmed';

        // Calculate the number of days, hours, and minutes since the product was inserted
        $current_time = new DateTime();  // Get current date and time
        $product_date = new DateTime($date); // Convert the product's insertion date to DateTime
        $interval = $current_time->diff($product_date);  // Calculate the difference

        $days_active = $interval->days;  // Number of days
        $hours_active = $interval->h;   // Number of hours
        $minutes_active = $interval->i; // Number of minutes

        // Format the output with colors
        $active_time = "<span style='color: blue;'>" . $days_active . " day" . ($days_active != 1 ? "s" : "") . "</span>";  // Apply red color to days
        if ($hours_active > 0 || $minutes_active > 0) {
            // Apply yellow color to hours
            $active_time .= ", <span style='color: green;'>" . $hours_active . " hour" . ($hours_active != 1 ? "s" : "") . "</span>, " . $minutes_active . " minute" . ($minutes_active != 1 ? "s" : "");
        }

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
            <td><?php echo $status; ?></td>
            <td>
                <?php if ($row['status'] == 0) { ?>
                    <a href='ads_pending.php?confirm_product_id=<?php echo $product_id; ?>' class='btn btn-success'>OK</a>
                <?php } else { ?>
                    <button class='btn btn-secondary' disabled>Confirmed</button>
                <?php } ?>
            </td>
            <td>
                <button type="button" class="btn btn-danger text-light" 
                        data-toggle="modal" 
                        data-target="#deleteModal<?php echo $product_id; ?>">
                    <i class='fa-solid fa-trash'></i>
                </button>
            </td>
            <td><?php echo $active_time; ?></td> <!-- Display the active time (days, hours, minutes) -->
        </tr>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteModal<?php echo $product_id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">Are you sure you want to delete this product?</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <a href='ads_pending.php?delete_product=<?php echo $product_id; ?>' class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </tbody>
</table>

<!-- Include Bootstrap JS and jQuery for modals -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
