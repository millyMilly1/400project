<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
</head>
<body>
    <form action="add_content.php" method="post" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Title" required><br>
        <textarea name="description" placeholder="Description" required></textarea><br>
        <input type="file" name="document" accept=".pdf, .doc, .docx" required><br>
        <input type="submit" value="Add Content">
    </form>

    <div>
        <h2>Uploaded Documents</h2>
        <?php
        
        $upload_dir = "uploads/";

        
        if (is_dir($upload_dir)) {
           
            if ($handle = opendir($upload_dir)) {
               
                while (false !== ($file = readdir($handle))) {
                    if ($file != "." && $file != "..") {
                       
                        echo "<a href='$upload_dir$file'>$file</a><br>";
                    }
                }
             
                closedir($handle);
            }
        } else {
            echo "Uploads folder not found.";
        }
        ?>
    </div>
</body>
</html>
