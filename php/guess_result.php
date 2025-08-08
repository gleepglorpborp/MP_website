<?php
session_start();
$total = $_SESSION['total'] ?? 0;
$correct = $_SESSION['correct'] ?? 0;
$percentage = $total > 0 ? round(($correct / $total) * 100) : 0;

// Clear session for new game
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Score</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0f172a;
            color: #f1f5f9;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #1e293b;
            padding: 1rem 2rem;
            text-align: left;
        }

        nav a {
            color: #ffffff;
            text-decoration: none;
            margin-right: 2rem;
            font-weight: 600;
        }

        nav a:hover {
            color: #38bdf8;
        }

        .content {
            padding: 4rem 2rem;
        }

        h1 {
            color: #38bdf8;
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
        }

        .button-group a {
            background-color: #38bdf8;
            color: #0f172a;
            padding: 1rem 2rem;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            margin: 0 1rem;
        }

        .button-group a:hover {
            background-color: #0ea5e9;
        }
    </style>
</head>
<body>

<header>
    <nav>
        <a href="index.php">Home</a>
        <a href="mission.php">Mission</a>
        <a href="vision.php">Vision</a>
        <a href="contact.php">Contact Us</a>
    </nav>
</header>

<div class="content">
    <h1>Your Score</h1>
    <p>You got <strong><?php echo $correct; ?></strong> out of <strong><?php echo $total; ?></strong> correct.</p>
    <p>That's <strong><?php echo $percentage; ?>%</strong> accuracy!</p>

    <div class="button-group">
        <a href="guess.php">Play Again?</a>
        <a href="upload.php">Test out our Detector!</a>
    </div>
</div>

</body>
</html>
