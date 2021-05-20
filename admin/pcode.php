<?php

$conn = mysqli_connect('localhost', 'root');
mysqli_select_db($conn, 'productdisplayupload');
if(isset($_POST['delete_imgs'])){
    $id = $_POST['delete_id'];
    $img = $_POST['delete_img'];

    $query = "DELETE FROM `imgupload` WHERE id='$id'";
    $query_run = mysqli_query($conn,$query);
    if($query_run)
    {
        unlink("".$img);
        echo "<script> alert('Deleted successfully'); </script>";
        header("Location: pp.php");
    }
    else{
        echo "<script> alert('unsuccessfully'); </script>";
        header("Location: pp.php");
    }
  
}
?>