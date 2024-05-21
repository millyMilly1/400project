<?php
include 'db_connection.php'; 



// File upload handling
$targetDirectory = "../uploads/"; // Directory where uploaded files will be saved
$targetFile = $targetDirectory . basename($_FILES["document"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));


if (file_exists($targetFile)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}


if ($_FILES["document"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}


if ($fileType != "pdf" && $fileType != "doc" && $fileType != "docx") {
    echo "Sorry, only PDF, DOC, and DOCX files are allowed.";
    $uploadOk = 0;
}


if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
   
    if (move_uploaded_file($_FILES["document"]["tmp_name"], $targetFile)) {
        
        $title = $_POST['title'];
        $description = $_POST['description'];
        
        
        $sql = "INSERT INTO contents (title, description, document_path) VALUES ('$title', '$description', '$targetFile')";
        if (mysqli_query($conn, $sql)) {
            echo "Content added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


mysqli_close($conn);
?>
