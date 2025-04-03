<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();

// Function to sanitize input data
function sanitizeInput($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

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

    <link rel="icon" href="../images/newlogo.jpg" type="image/icon type">

    <style>
        body{
            overflow-x: hidden;
        }
        /* Add your custom styles here */
        .error-message {
            color: red;
        }
    </style>

</head>
<body>

    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username"
                        autocomplete="off" required="required" name="user_username"/>
                    </div>

                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Enter Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password"
                        autocomplete="off" required="required" name="user_password"/>
                    </div>

                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0" style="font-size: 16px;">Don't have an account ? <a href="user_registration.php" class="text-info" style="font-size: 18px;"> Register</a></p>
                    </div>

                    <!-- admin login -->
                    <div class="mt-4 pt-2">
                        
                        <p class="small fw-bold mt-2 pt-1 mb-0" style="font-size: 16px;"><a href="../admin_area/admin_login.php" class="text-danger" style="font-size: 15px;">Admin login</a> | 
                        <a href="../manager_area/manager_login.php" class="text-danger" style="font-size: 15px;">Manager login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
if (isset($_POST['user_login'])) {
    $user_username = sanitizeInput($_POST['user_username']);
    $user_password = sanitizeInput($_POST['user_password']);

    // Prepared statement to fetch user data
    $select_query = "SELECT * FROM user_table WHERE username = ?";
    $stmt = mysqli_prepare($con, $select_query);
    mysqli_stmt_bind_param($stmt, "s", $user_username);

    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        $row_count = mysqli_num_rows($result);

        if ($row_count > 0) {
            $row_data = mysqli_fetch_assoc($result);

            // Verify password
            if (password_verify($user_password, $row_data['user_password'])) {
                $_SESSION['username'] = $user_username;

                // Update login_status to '1' (Online)
                $update_query = "UPDATE user_table SET login_status = 1 WHERE username = ?";
                $update_stmt = mysqli_prepare($con, $update_query);
                mysqli_stmt_bind_param($update_stmt, "s", $user_username);
                mysqli_stmt_execute($update_stmt);
                mysqli_stmt_close($update_stmt);

                echo "<script>alert('Login successful');</script>";
                echo "<script>window.open('profile.php', '_self');</script>";
            } else {
                echo "<script>alert('Invalid Credentials');</script>";
            }
        } else {
            echo "<script>alert('Invalid Credentials');</script>";
        }
    } else {
        echo "<script>alert('Database error. Please try again.');</script>";
    }

    mysqli_stmt_close($stmt);
}
?>


</body>
</html>