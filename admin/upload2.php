<?php

include('includes/header.php');
include('includes/navbar.php');

?>
<!DOCTYPE html>
<html lang=" en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="upload.css">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="text-center text-white bg-dark">
            products
        </h1>
        <br>
        <table class="table table-bordered table-striped table-hover text-center">
            <!-- <thead class=" bg-dark text-white">
                <th>id</th>
                <th>username</th>
                <th>pic</th>
            </thead> -->
            <tbody>
                <?php
                $conn = mysqli_connect('localhost', 'root');
                mysqli_select_db($conn, 'productdisplayupload');

                if (isset($_POST['submit'])) {
                    $username = $_POST['prname'];
                    $prdetails = $_POST['prdetails'];
                    $qty = $_POST['qty'];
                    $files = $_FILES['file'];

                    // print_r($username);
                    echo "<br>";
                    // print_r($files);

                    $filename = $files['name'];
                    $fileerror = $files['error'];
                    $filetmp = $files['tmp_name'];


                    $fileext = explode('.', $filename);
                    $filecheck = strtolower(end($fileext));

                    $fileextstored = array('png', 'jpg', 'jpeg');

                    if (in_array($filecheck, $fileextstored)) {
                        $destinationfile = 'upload/' . $filename;
                        move_uploaded_file($filetmp, $destinationfile);


                        $q = "INSERT INTO `imgupload`(`username`, `image`,`prdetails`, `qty`) VALUES ('$username','$destinationfile','$prdetails','$qty')";
                        $query = mysqli_query($conn, $q);

                        $displayquery = "select *from imgupload";
                        $querydisplay = mysqli_query($conn, $displayquery);
                ?>
                        <div class="row container-fluid up">

                            <?php
                            while ($result = mysqli_fetch_array($querydisplay)) {
                            ?>


                                <div class="notecard my-2 mx-2 card row" style="width: 18rem;">
                                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                                    <img src=" <?php echo $result['image']; ?>" alt="" height="200px" width="100px" class="card-img-top my-3">
                                    <div class="card-body">
                                        <h3 class="card-title"><?php echo $result['username']; ?></h3>

                                        <p class="card-text"><?php echo $result['prdetails']; ?></p>
                                        <h6><?php echo $result['qty']; ?></h6>
                                        <form action="pcode.php" method="POST">
                                            <input name="delete_id" value="<?php echo $result['id']; ?>">
                                            <input type="hidden" name="delete_img" value="<?php echo $result['image']; ?>">

                                            <button type="submit" name="delete_imgs" class="btn btn-danger"> Delete </button>
                                        </form>
                                        <form action="register_edit.php" method="POST">
                                            <input type="hidden" name="edit_id" value="<?php echo $result['id']; ?>">
                                            <button type="submit" name="edit_btn" class="btn btn-success"> Edit </button>
                                        </form>
                                    </div>
                                </div>











                            <?php

                            }
                            ?>
                        </div>
                <?php
                    } else {
                        echo "Extension Not matched !";
                    }
                }
                ?>
            </tbody>




        </table>


    </div>
</body>

</html>
<?php
include('includes/script.php');
include('includes/footer.php');
?>