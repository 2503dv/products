<?php
session_start();
$connection = mysqli_connect("localhost","root","","admin");

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    $email_query = "SELECT * FROM adminregister WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO adminregister (username,email,password) VALUES ('$username','$email','$password')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
               
                $_SESSION['success'] = "Admin Profile Added Successfully ! ";
                // $_SESSION['status_code'] = "success";
                header('Location: register.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added !  ";
                // $_SESSION['status_code'] = "error";
                header('Location: register.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match ! Check it Again";
            // $_SESSION['status_code'] = "warning";
            header('Location: register.php');  
        }
    }

}



if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];

    $query = "UPDATE adminregister SET username='$username', email='$email',password='$password' WHERE id='$id'";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        $_SESSION['success'] = "your data is Updated";
        header('Location: register.php');
    }
    else{
        $_SESSION['status'] = "your data is Not Updated";
        header('Location: register.php');
    }
}






if(isset($_POST['delete_btn'])){
    $id = $_POST['delete_id'];

    $query = "DELETE FROM adminregister WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "your data is Deleted";
        header('Location: register.php');
    } else {
        $_SESSION['status'] = "your data is Not Deleted";
        header('Location: register.php');
    }
}


// if(isset($_POST['login_btn']))
// {
//     $name_login = $_POST['username'];
//     $password_login =$_POST['password'];

//     $query = "SELECT *FROM adminregister WHERE username='$name_login' AND password='$password_login";
//     $query_run= mysqli_query($connection,$query);

//     if (mysqli_fetch_array($query_run)) {
//         $_SESSION['username'] = $name_login;
//         header('Location: index.php');
//     } else {
//         $_SESSION['status'] = 'Username or password wrong';
//         header('Location: login.php');
//     }
// }




?>