
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
    <title>Accessibility Settings</title>
    <style>
             body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            --contrast: 100%;
            --font-size: 16px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .option {
            margin-bottom: 15px;
        }

        .option label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .option input[type="range"] {
            width: 100%;
        }

        .btn {
            padding: 10px 20px;
            background-color: #008080;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #008080;
        }

        
        .next-btn {
            display: block;
            margin-top: 20px;
            text-align: center;
        }

        .next-btn a {
            color: #008080;
            text-decoration: none;
            font-weight: bold;
        }

        .next-btn a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Accessibility Settings</h2>
        <h3>If you are totally blind, kindly scroll down to then end of the page and click "Next"</h3>
        <div class="option">
            <label for="contrast">Adjust Contrast:</label>
            <input type="range" id="contrast" min="0" max="200" value="100" step="1">
        </div>

        <div class="option">
            <label for="fontSize">Adjust Font Size:</label>
            <input type="range" id="fontSize" min="10" max="30" value="16" step="1">
        </div>

        <button class="btn" onclick="applySettings()">Apply Settings</button>

   ->
        <div class="next-btn">
            <a href="login.php">Next</a>
        </div>
    </div>

    <script>
        function applySettings() {
            var contrastValue = document.getElementById('contrast').value;
            var fontSizeValue = document.getElementById('fontSize').value;

            // Save settings to localStorage
            localStorage.setItem('contrast', contrastValue);
            localStorage.setItem('fontSize', fontSizeValue);

            // Apply settings to the current page
            applySettingsLocally(contrastValue, fontSizeValue);
        }

        function applySettingsLocally(contrastValue, fontSizeValue) {
            document.body.style.filter = "contrast(" + contrastValue + "%)";
            document.body.style.setProperty('--contrast', contrastValue + "%");

            document.body.style.fontSize = fontSizeValue + "px";
            document.body.style.setProperty('--font-size', fontSizeValue + "px");
        }
    </script>
</body>
</html>

