<?php


$target_directory = "upload/";
$target_file = $target_directory .  basename ($_FILES["fileUpload"]["name"]);  //file-uploading-field's name of the form
$uploadOK = 1;
$imageFileType = strtolower (pathinfo ($target_file, PATHINFO_EXTENSION));

//Check if the file is actually an image or something else, only if the "submit" btn is presssed
if(isset ($_POST["save_faculty"])){
     $check = getimagesize ($_FILES["fileUpload"]["tmp_name"]);
     if($check !== false){
          echo "File is an image - " .  $check["mime"] . "." . "<br>";
          $uploadOK = 1;
     }else{
          echo "File is not an image. <br>";
          $uploadOK = 0;
     }
}

//if the "uploadOK" flag is no equal  to zero then the next code block will upload the image file to 
//your mentioned directory (basically copying image file to one directory to another ;)   )
if($uploadOK == 0){
     echo "Image upload is not successful.";
}else{
     if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)){
          echo "The file" . basename ($_FILES["fileUpload"]["name"]) . " has been uploaded";
     }else{
          echo "Sorry, there was an error uploading your file";
     }
}
?>