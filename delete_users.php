<?php
// Include database connection
include('../includes/connect.php'); 

if(isset($_GET['delete_users'])){
    $delete_users=$_GET['delete_users'];
    // echo $delete_cbrand;

    $delete_query="DELETE FROM user_table WHERE user_id=$delete_users";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('User has been deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_users','_self')</script>";
    }
}
?>
