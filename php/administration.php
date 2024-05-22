<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
       
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

header {
    background-color: #008080;
    color: #fff;
    padding: 1rem;
    text-align: center;
}

nav ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
    background-color: #007070;
    display: flex;
    justify-content: center;
}

nav ul li {
    margin: 0 1rem;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    padding: 0.5rem;
}

nav ul li a:hover {
    background-color: #006060;
}

main {
    padding: 1rem;
}

section {
    background-color: #fff;
    margin: 1rem 0;
    padding: 1rem;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form label {
    display: block;
    margin: 0.5rem 0 0.2rem;
}

form input[type="text"],
form textarea,
form input[type="file"] {
    width: 80%;
    padding: 0.5rem;
    margin: 0.5rem 0 1rem;
    border: 1px solid #ccc;
    border-radius: 5px;
}

form input[type="submit"] {
    background-color: #006060;
    color: #fff;
    border: none;
    padding: 0.5rem 1rem;
    cursor: pointer;
    border-radius: 5px;
}

form input[type="submit"]:hover {
    background-color: #007070;
}

footer {
    text-align: center;
    padding: 1rem;
    background-color: #008080;
    color: #fff;
}

    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <nav aria-label="Main navigation">
        <ul>
            <li><a href="#upload-content" aria-label="Upload Course Content">Upload Content</a></li>
            <li><a href="#uploaded-documents" aria-label="uploaded-documents">Documents</a></li>
            <li><a href="#manage-users" aria-label="Manage Users">Manage Users</a></li>
            <li><a href="#settings" aria-label="Settings">Settings</a></li>
        </ul>
    </nav>
    <main>
        <section id="upload-content">
            <h2>Upload Course Content</h2>
            <form action="add_content.php" method="post" enctype="multipart/form-data">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="Title" aria-label="Course title" required><br>

                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Description" aria-label="Course description" required></textarea><br>

                <label for="document">Upload Document</label>
                <input type="file" id="document" name="document" accept=".pdf, .doc, .docx" aria-label="Upload course document" required><br>

                <input type="submit" value="Add Content" aria-label="Add content button">
            </form>
        </section>

        <section id="uploaded-documents">
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
        </section>

        <section id="manage-users">
            <h2>Manage Users</h2>
            <p>Manage user accounts and roles.</p>
            <!-- Add your user management content here -->
        </section>
        <section id="settings">
            <h2>Settings</h2>
            <p>Configure your account and website settings.</p>
            <!-- Add your settings content here -->
        </section>
    </main>
    <footer>
        <p>&copy; 2024 E-Learning Platform</p>
    </footer>
</body>
</html>
