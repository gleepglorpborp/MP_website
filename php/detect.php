<?php
session_start();


$host = 'localhost';
$dbname = 'mp';
$user = 'root';
$pass = '';

// Connect to DB
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$image_url = $_SESSION['image_url'] ?? '';
$response = $_SESSION['detection_result'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deepfake Detection</title>
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

        h1, h2, h3 {
            color: #38bdf8;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        h2 {
            font-size: 2rem;
            margin-top: 2rem;
        }

        p {
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 1rem;
        }

        .cta {
            margin-top: 3rem;
            text-align: left;
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

        footer {
            margin-top: 4rem;
            text-align: left;
            font-size: 0.9rem;
            color: #94a3b8;
        }
    </style>
</head>
<body>

<nav>
    <a href="/mp_website/php/index.php">Home</a>
    <a href="/mp_website/php/guess.php">Play Game</a>
    <a href="/mp_website/php/mission.php">Mission</a>
    <a href="/mp_website/php/vision.php">Vision</a>
    <a href="/mp_website/php/learnmore.php">Learn More</a>
    <a href="/mp_website/php/contact.php">Contact Us</a>
</nav>

<div class="container">

    <h2>Uploaded Image:</h2>
    <?php if ($image_url): ?>
        <img src="<?= htmlspecialchars($image_url) ?>" width="300"><br><br>
    <?php endif; ?>

    <h2> Detection Results: </h2>
    <?php 
        if ($response) {
            $deepfake = $response['type']['deepfake'] ?? 0;
            $genai = $response['type']['ai_generated'] ?? 0;

            $deepfakeround = round($deepfake * 100, 2);
            $genairound = round($genai * 100, 2);

            echo "<p>Ai-Generated score: " . round($genai * 100, 2) . "%<p>";
            echo "<p>Deepfake score: " . round($deepfake * 100, 2) . "%<p>";

            if ($deepfake > 0.7 && $deepfake > $genai) {
                $conclusion = "<p>Conclusion: This image is most likely Deepfaked.</p>";
            } elseif ($genai > 0.7 && $genai > $deepfake) {
                $conclusion = "<p>Conclusion: This image is most likely ai-generated.</p>";
            } elseif ($genai < 0.7 && $deepfake < 0.7) {
                $conclusion = "<p>Conclusion: This image is likely not AI-generated or deepfaked.</p>";
            } else {
                $conclusion = "<p> Results cannot be determined.</p>";
            }

            echo $conclusion;

            if (isset($_SESSION['id'])){
                $id = $_SESSION['id'];
                $sql = "UPDATE image set deepfake = ?, genai = ?, conclusion = ? where id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ddsi", $deepfakeround, $genairound, $conclusion, $id);
                $stmt->execute();
            }
            
            
        } else {
                echo "<p> No Response from the API.</p>";
        }
    ?>
    <div class="cta">
        <a href="/mp_website/php/upload.php">Upload another image</a>
    </div>
    <div class="cta">
        <a href="/mp_website/php/history.php">View history</a>
    </div>
    <div class="cta">
        <a href="/mp_website/php/index.php">Home Page</a>
    </div>
</div>

</body>
</html>
