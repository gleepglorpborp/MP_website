<?php
session_start();

// Initialize session counters
if (!isset($_SESSION['total'])) {
    $_SESSION['total'] = 0;
    $_SESSION['correct'] = 0;
}

// Get image files
$real_images = glob('../real/*.jpg');
$fake_images = glob('../fake/*.jpg');

$selected_real = $real_images[array_rand($real_images)];
shuffle($fake_images);
$selected_fakes = array_slice($fake_images, 0, 3);

$options = array_merge([$selected_real], $selected_fakes);
shuffle($options); // Randomize display order

// Store answer
$_SESSION['answer'] = $selected_real;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Guess the Real Face</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0f172a;
            color: #f1f5f9;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #1e293b;
            padding: 1rem 2rem;
            text-align: right;
        }

        nav a {
            color: #38bdf8;
            margin-left: 1.5rem;
            text-decoration: none;
            font-weight: 600;
        }

        .container {
            max-width: 960px;
            margin: 2rem auto;
            text-align: center;
        }

        h1 {
            color: #38bdf8;
            margin-bottom: 2rem;
        }

        .images {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .images form {
            display: inline-block;
        }

        .images img {
            width: 200px;
            height: auto;
            border-radius: 10px;
            border: 3px solid #1e293b;
            box-shadow: 0 4px 10px rgba(0,0,0,0.4);
        }

        .done-button {
            margin-top: 2rem;
        }

        .done-button a {
            background-color: #38bdf8;
            color: #0f172a;
            padding: 0.8rem 1.5rem;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
        }

        .done-button a:hover {
            background-color: #0ea5e9;
        }
    </style>
</head>
<body>

<nav>
    <a href="index.php">Home</a>
    <a href="mission.php">Mission</a>
    <a href="vision.php">Vision</a>
    <a href="contact.php">Contact Us</a>
</nav>

<div class="container">
    <h1>Guess Which Face is Real</h1>

    <div class="images">
        <?php foreach ($options as $img): ?>
            <form action="guess_handler.php" method="post">
                <input type="hidden" name="selected" value="<?php echo htmlspecialchars($img); ?>">
                <button type="submit" style="background: none; border: none; padding: 0;">
                    <img src="<?php echo $img; ?>" alt="Face Option">
                </button>
            </form>
        <?php endforeach; ?>
    </div>

    <div class="done-button">
        <a href="result.php">Done</a>
    </div>
</div>

</body>
</html>
