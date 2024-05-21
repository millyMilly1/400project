
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

<style>
  body {
    background-color: #008080;
    font-family: Arial, sans-serif;
  }
  .container {
    width: 300px;
    margin: 0 auto;
    margin-top: 100px;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  }
  input[type="text"], input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
  }
  input[type="submit"] {
    width: 100%;
    padding: 10px;
    border: none;
    background-color: #008080;
    color: #fff;
    cursor: pointer;
    border-radius: 3px;
  }
</style>
</head>
<body>
<div class="container">
  <h2>Login</h2>
  <form action="login_process.php" method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="submit" value="Login">
  </form>
  <p>Don't have an account? <a href="signup.php">Signup</a></p>
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

</body>
</html>
