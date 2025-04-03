<h3 class="text-center text-success">All Details</h3>

<table class="table table-bordered mt-5">
    <thead class="bg-info" style="background-color: blue;">
        <tr>
            <th class="bg-info">Product ID</th>
            <th class="bg-info">Product Title</th>
            <th class="bg-info">Product Image</th>
            <th class="bg-info">Product Price</th>
            <th class="bg-info">Status</th>
            <th class="bg-info">Edit</th>
            <th class="bg-info">Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
    <?php
    $get_products = "SELECT * FROM `products`";
    $result = mysqli_query($con, $get_products);
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $status = $row['status'];
    ?>
        <tr class='text-center'>
            <td class="bg-secondary text-light"><?php echo $product_id?></td>
            <td class="bg-secondary text-light"><?php echo $product_title?></td>
            <td class="bg-secondary text-light"><img src='../admin_area/product_images/<?php echo $product_image1 ?>' class='product_img'></td>   
            <td class="bg-secondary text-light"><?php echo $product_price ?></td>
            <td class="bg-secondary text-light"><?php echo $status ?></td>

            <td class="bg-secondary text-light"><a href='index.php?edit_products=<?php echo $product_id?>' class='text-light'><i class='fa-solid fa-pen-to-square bg-info'></i></a></td>
            <td class="bg-secondary text-light">
                <button type="button" class="btn btn-primary text-light" data-toggle="modal" data-target="#exampleModal<?php echo $product_id; ?>">
                    <i class='fa-solid fa-trash bg-danger'></i>
                </button>
            </td>
        </tr>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?php echo $product_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this product?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <a href='index.php?delete_product=<?php echo $product_id; ?>' class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </tbody>
</table>

<!-- Bootstrap JS and jQuery should be included in your HTML for modals to work properly -->
<!-- Example of including Bootstrap and jQuery scripts -->
<!-- Make sure to adjust the paths based on your project structure -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
