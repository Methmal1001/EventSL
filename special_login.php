<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPAdmin login</title>

    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
    crossorigin="anonymous">

    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="icon" href="../images/newlogo.jpg" type="image/icon type">

    <style>
        body {
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">SPAdmin Login</h2>

        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-4">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form_outline mb-4">
                        <label for="userid" class="form-label">UserID</label>
                        <input type="text" id="userid" name="userid" placeholder="Enter your userID" required="required" class="form-control">
                    </div>
                    <div class="form_outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required="required" class="form-control">
                    </div>
                    <div class="form_outline mb-4">
                        <label for="special_character" class="form-label">SPCharacter</label>
                        <input type="password" id="special_character" name="special_character" placeholder="Enter spCharacter" required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="SPadmin_login" value="Go">
                        <p class="small fw-bold mt-2 pt-1">Don't have an account? <a href="special_registration.php" class="link-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['SPadmin_login'])){
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    $special_character = $_POST['special_character'];

    // Use backticks around table and column names, not single quotes
    $select_query = "SELECT * FROM `special_login` WHERE sp_id='$userid' AND sp_character='$special_character'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);

    if($row_count > 0){
        $row_data = mysqli_fetch_assoc($result);
        
        if(password_verify($password, $row_data['sp_password'])){
            session_start(); // Start the session if not already started
            $_SESSION['userid'] = $userid; // Store the user ID in session
            echo "<script>alert('Special Login successful')</script>";
            echo "<script>window.open('index.php','_self')</script>"; // Redirect to dashboard or any other appropriate page
            exit(); // Exit to prevent further execution
        }else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>
