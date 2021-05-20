<?php

include('includes/header.php');
include('includes/navbar.php');
?>

<div class="modal fade" id="facultyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="code2.php" method="POST" enctype="multipart/form-data">

                <div class="modal-body">

                    <div class="form-group">
                        <label> Name </label>
                        <input type="text" name="faculty_name" class="form-control" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group">
                        <label> Designation </label>
                        <input type="text" name="faculty_designation" class="form-control" placeholder="Enter Designation" required>
                    </div>
                    <div class="form-group">
                        <label> description </label>
                        <input type="text" name="faculty_description" class="form-control" placeholder="Enter  description" required>
                    </div>
                    <div class="form-group">
                        <label> upload image </label>
                        <input type="file" name="fileUpload" id="faculty_image" class="form-control" required>
                    </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="save_faculty" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Faculties
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#facultyModal">
                    Add faculty Profile
                </button>
            </h6>
        </div>
        <div class="card-body">
            <?php
            if (isset($_SESSION['success']) && isset($_SESSION['success']) != '') {
                echo '<h2 class="bg-primary" style=" color:white;">' . $_SESSION['success'] . '</h2>';
                unset($_SESSION['success']);
            }
            if (isset($_SESSION['status']) && isset($_SESSION['status']) != '') {
                echo '<h2 class="bg-danger" style=" color:white;">' . $_SESSION['status'] . '</h2>';
                unset($_SESSION['status']);
            }


            ?>
            <div <div class="table-responsive">

                <table class="table table-bordered" id="dataT" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>description</th>
                            <th>image</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><a href="" class="btn btn-success"> EDIT </a></td>
                            <td><a href="" class="btn btn-danger"> DELETE </a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?php
include('includes/script.php');
include('includes/footer.php');
?>