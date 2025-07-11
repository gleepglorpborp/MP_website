<?php

$host = 'localhost';
$dbname = 'mp'; // Updated for clarity
$user = 'root';
$pass = '';

// Connect to the database
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_COOKIE['user_id'])){
    $user_id = bin2hex(random_bytes(16));
    setcookie('user_id', $user_id, time() + (86400 * 365), "/"); // 1 year expiry
}else{
    $user_id = $_COOKIE['user_id'];
}


// Server-side validation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image'])) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        $fileType = mime_content_type($_FILES['image']['tmp_name']);

        if (!in_array($fileType, $allowedTypes)) {
            die('Error: Only JPG, JPEG, and PNG files are allowed.');
        }

        // Here you can proceed to save the file or run prediction
        // For example:
        // move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $_FILES['image']['name']);
        
        $dir = "../images/";
        $image = basename($_FILES['image']['name']);
        $path = $dir . $image;

        move_uploaded_file($_FILES["image"]["tmp_name"], $path);

        $sql = "INSERT INTO image (image, user_id) values (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $path, $user_id);

        if ($stmt->execute()){
            $link = "detect.php/?path=" . $path;
            header('Location:'. $link);
            echo "<img src='$path' style='max-width:300px'><br>";
            echo "File is valid and ready for processing.";
        }else{
            die('Error: No file uploaded.');
        }

        exit; // Stop after validation message for demo
    } else {
        die('Error: No file uploaded.');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deepfake Detection - MesoNet</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #0f172a;
            color: #f1f5f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #38bdf8;
        }

        p {
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }

        .upload-form {
            background: #1e293b;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        input[type="file"] {
            margin-bottom: 1rem;
            color: #f1f5f9;
        }

        input[type="submit"] {
            background-color: #38bdf8;
            color: #0f172a;
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        }

        input[type="submit"]:hover {
            background-color: #0ea5e9;
        }
    </style>
</head>
<body>

    <h1>Deepfake Detection</h1>
    <p>Upload a face image to check if it is real or AI-generated using our AI model.</p>

    <form class="upload-form" action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" accept=".jpg, .jpeg, .png" required><br>
        <input type="submit" value="Check Now">
    </form>

</body>
</html>
