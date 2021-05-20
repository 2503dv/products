<?php

include('includes/header.php');
include('includes/navbar.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="upload.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>



    <div class="container">
        <h1 class="text-white bg-dark text-center">
            PRODUCTS
        </h1>
        <div class="col-lg-8 m-auto d-block">
            <form action="upload2.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="user">PRODUCT NAME: </label>
                    <input type="text" name="prname" id="user" class="form-control">
                </div>
                <div class="form-group">
                    <label for="user">PRODUCT DETAILS: </label>
                    <input type="text" name="prdetails" id="prd" class="form-control">
                </div>
                <div class="form-group">
                    <label for="user"> QUANTITY: </label>
                    <input type="number" name="qty" id="qty" class="form-control">
                </div>

                <div class="form-group">
                    <label for="user"> IMAGE: </label>
                    <input type="file" name="file" id="file" class="form-control">
                </div> <br>
                <input type="submit" name="submit" value="submit" class="btn btn-success">
            </form>
        </div>
    </div>
</body>

</html>
<?php
include('includes/script.php');
include('includes/footer.php');
?>