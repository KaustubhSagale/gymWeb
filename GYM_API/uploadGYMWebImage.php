<?php
$folder = "C://xampp//htdocs//GYM_API//uploads/";
$path = $folder . basename($_FILES['file']['name']);
if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
    echo "The file " . basename(
        $_FILES['file']['name']
    ) . " has been uploaded";
} else {
    echo "There was an error uploading the file, please try again!";
}

?>