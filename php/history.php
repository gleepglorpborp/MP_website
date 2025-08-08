<?php
$host = 'localhost';
$dbname = 'mp';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_COOKIE['user_id'] ?? null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deepfake Detection - History</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #0f172a;
            color: #f1f5f9;
        }

        nav {
            display: flex;
            justify-content: flex-start;
            background-color: #1e293b;
            padding: 1rem 2rem;
        }

        nav a {
            color: #ffffff;
            text-decoration: none;
            margin-left: 1.5rem;
            font-weight: 600;
        }

        nav a:hover {
            color: #0ea5e9;
        }

        .container {
            max-width: 960px;
            margin: auto;
            padding: 3rem 2rem;
        }

        h2 {
            font-size: 2rem;
            color: #38bdf8;
            margin-bottom: 2rem;
        }

        .image-box {
            background-color: #1e293b;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            position: relative;
        }

        img {
            max-width: 200px;
            border-radius: 8px;
            display: block;
            margin-bottom: 0.5rem;
        }

        .timestamp {
            font-size: 0.9rem;
            color: #94a3b8;
        }

        .delete-btn {
            display: inline-block;
            padding: 0.4rem 1rem;
            font-size: 0.9rem;
            background-color: #ef4444;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .delete-btn:hover {
            background-color: #dc2626;
        }

        .cta {
            margin-top: 2rem;
        }

        .cta a {
            display: inline-block;
            padding: 0.8rem 1.6rem;
            font-size: 1rem;
            background-color: #38bdf8;
            color: #0f172a;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .cta a:hover {
            background-color: #0ea5e9;
        }
    </style>

<!--
    <script>
        function confirmAndRemove(button, image) {
            const confirmed = confirm("Do you want to delete it?");
            if (confirmed) {
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "is_deleted.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Remove the image box from DOM
                        const imageBox = button.closest('.image-box');
                        imageBox.remove();
                    }
                };
                xhr.send("image=" + encodeURIComponent(image));
            }
        }
    </script>
!-->

</head>
<body>
    <nav>
    <a href="index.php">Home</a>
    <a href="guess.php">Play Game</a>
    <a href="mission.php">Mission</a>
    <a href="vision.php">Vision</a>
    <a href="learnmore.php">Learn More</a>
    <a href="contact.php">Contact Us</a>
</nav>

    <div class="container">
        <div class="cta">
            <a href="upload.php">Back to Upload</a>
        </div>
        <h2>Your Uploaded Images</h2>
        <p>Images uploaded from URL will not be saved in history</p>
        
        <?php
        if ($user_id == null) {
            echo "No history available";
        } else {
            $sql = "SELECT id, image, CREATED_TIME, deepfake, genai, conclusion FROM image WHERE user_id = ? AND is_deleted = 0 ORDER BY CREATED_TIME DESC";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows < 1){
                echo "no history available";
            }

            while ($row = $result->fetch_assoc()) {
                $image = htmlspecialchars($row['image'], ENT_QUOTES, 'UTF-8');
                $id = $row['id'];
                $deepfake = $row['deepfake'];
                $genai = $row['genai'];
                $conc = $row['conclusion'];

                echo "<div class='image-box'>
                        <img src='$image' alt='Uploaded Image'>
                        <p> Ai-generated score: $genai% </p>
                        <p> Deepfake score: $deepfake% </p>
                        <p> $conc </p>
                        <div class='timestamp'>Uploaded at: {$row['CREATED_TIME']}</div>
                        <br>
                        <form method='POST' action='is_deleted.php' onsubmit=\"return confirm('Confirm Delete?');\">
                        <input type = 'hidden' name = 'id' value = '" . htmlspecialchars($row['id']) . "'>
                        <input class = 'delete-btn' type='submit' name='delete' value='Delete'>
                        </form>
                      </div>";
            }
        }
        ?>


    </div>
</body>
</html>
