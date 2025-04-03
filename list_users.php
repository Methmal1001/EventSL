<h3 class="text-center text-success">All Users</h3>

<table class="table table-bordered mt-5">
    <thead>
        <?php
        $get_payments = "SELECT * FROM user_table";
        $result = mysqli_query($con, $get_payments);
        
        echo "<tr>
                <th class='bg-info'>Sl No</th>
                <th class='bg-info'>Username</th>
                <th class='bg-info'>User email</th>
                <th class='bg-info'>User address</th>
                <th class='bg-info'>User mobile</th>
                <th class='bg-info'>Delete</th>
              </tr>";
        ?>
    </thead>
    <tbody>
        <?php
        // Initialize the counter
        $number = 0;

        if ($con) {
            $select_brnd = "SELECT * FROM user_table";
            $result = mysqli_query($con, $select_brnd);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $user_id = $row['user_id'];
                    $username = $row['Username'];
                    $user_email = $row['user_email'];
                    $user_address = $row['user_address'];
                    $user_mobile = $row['user_mobile'];
                    $number++;
        ?>
                    <tr class="text-center">
                        <td class="bg-secondary text-light"><?php echo $number; ?></td>
                        <td class="bg-secondary text-light"><?php echo $username; ?></td>
                        <td class="bg-secondary text-light"><?php echo $user_email; ?></td>
                        <td class="bg-secondary text-light"><?php echo $user_address; ?></td>
                        <td class="bg-secondary text-light"><?php echo $user_mobile; ?></td>
                        <td class="bg-secondary text-light">
                            <a 
                                href="delete_users.php?delete_users=<?php echo $user_id; ?>" 
                                onclick="return confirm('Are you sure you want to delete this user?');" 
                                class="btn btn-primary text-light"
                            >
                                <i class="fa-solid fa-trash bg-danger"></i>
                            </a>
                        </td>
                    </tr>
        <?php
                }
            } else {
                echo "Error: " . mysqli_error($con);
            }

            mysqli_close($con);
        } else {
            echo "Failed to connect to the database.";
        }
        ?>
    </tbody>
</table>
