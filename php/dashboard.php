<?php

session_start();


if(isset($_SESSION['username'])) {
  
    $username = $_SESSION['username'];
} else {
   
    header("Location: login.php");
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        .welcome {
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .content {
            margin-top: 20px;
        }
        .content-item {
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="welcome">
            <h1>Welcome <?php echo $username; ?>!</h1>
            <p>Here you can access various contents uploaded by lecturers.</p>
        </div>
        <div class="content">
            <?php
            $uploadsFolder = '../uploads/';

            
            if (file_exists($uploadsFolder) && is_dir($uploadsFolder)) {
               
                $files = scandir($uploadsFolder);

               
                $files = array_diff($files, array('.', '..'));

                
                if (count($files) > 0) {
                    foreach ($files as $file) {
                        echo "<div class='content-item'>";
                        echo "<h2>" . pathinfo($file, PATHINFO_FILENAME) . "</h2>";
                        echo "<a href='" . $uploadsFolder . $file . "' download>Download File</a>";
                        echo "</div>";
                    }
                } else {
                    echo "No content available.";
                }
            } else {
                echo "The uploads folder does not exist or cannot be accessed.";
            }
            ?>
        </div>
        <script>
            // Retrieve settings from localStorage and apply them
            var contrastValue = localStorage.getItem('contrast') || 100;
            var fontSizeValue = localStorage.getItem('fontSize') || 16;
            applySettingsLocally(contrastValue, fontSizeValue);

            function applySettingsLocally(contrastValue, fontSizeValue) {
                document.body.style.filter = "contrast(" + contrastValue + "%)";
                document.body.style.setProperty('--contrast', contrastValue + "%");

                document.body.style.fontSize = fontSizeValue + "px";
                document.body.style.setProperty('--font-size', fontSizeValue + "px");
            }
        </script>
    </div>
</body>
</html>
