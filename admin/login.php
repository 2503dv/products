<script>
    function validateform() {
        var x = document.forms["f1"]["username"].value;
        var y = document.forms["f1"]["password"].value;
        // var z = document.forms["f1"]["account"].value;
        if (x !== "dhruvi") {
            alert("Enter Correct Email !");
            return false;
        } else if (y !== "dhruvi123") {
            alert("Enter Correct password !");
            return false;
        } else if (x !== "dhruvi" && y !== "dhruvi123") {

            alert("Enter Correct details !");
            return false;
        }
    }
</script>

<?php
session_start();
include('includes/header.php');
?>


<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-6 col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Log In Here!</h1>
                                    <?Php
                                    if (isset($_SESSION['status']) && isset($_SESSION['status']) != '') {
                                        echo '<h2 class="bg-danger" style=" color:white;">' . $_SESSION['status'] . '</h2>';
                                        unset($_SESSION['status']);
                                    }
                                    ?>
                                </div>
                                <form class="user" action="index.php" method="POST" name="f1" onsubmit="return validateform()">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control form-control-user" placeholder="USERNAME" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                                    </div>

                                    <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                    <hr>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>


<?php
include('includes/script.php');

?>