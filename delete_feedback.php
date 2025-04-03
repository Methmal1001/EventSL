<?php
// Include database connection
include('../includes/connect.php'); 

if(isset($_GET['delete_feedback'])){
    $delete_feedback=$_GET['delete_feedback'];
    // echo $delete_cbrand;

    $delete_query="DELETE FROM feedback_details WHERE id=$delete_feedback";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('Feedback has been deleted successfully')</script>";
        echo "<script>window.open('./index.php?userfeedback','_self')</script>";
    }
}
?>
