<?php
session_start();

if (!isset($_SESSION['total'])) {
    $_SESSION['total'] = 0;
    $_SESSION['correct'] = 0;
}

$real_images = glob('../real/*.jpg');
$fake_images = glob('../fake/*.jpg');

if (count($real_images) < 1 || count($fake_images) < 3) {
    die("Not enough images to run the game.");
}

$selected_real = $real_images[array_rand($real_images)];
shuffle($fake_images);
$selected_fakes = array_slice($fake_images, 0, 3);

$options = array_merge([$selected_real], $selected_fakes);
shuffle($options);

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
            text-align: left;
        }

        nav a {
            color: #ffffff;
            margin-left: 1.5rem;
            text-decoration: none;
            font-weight: 600;
        }

        nav a:hover {
            color: #0ea5e9;
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

        .images img {
            width: 200px;
            height: auto;
            border-radius: 10px;
            border: 3px solid #1e293b;
            box-shadow: 0 4px 10px rgba(0,0,0,0.4);
            cursor: pointer;
            transition: border 0.3s, transform 0.2s;
        }

        .images img.selected {
            border: 3px solid #38bdf8;
            transform: scale(1.05);
        }

        .submit-section {
            margin-top: 2rem;
        }

        .submit-section button {
            background-color: #38bdf8;
            color: #0f172a;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
        }

        .submit-section button:hover {
            background-color: #0ea5e9;
        }

        .done-button {
            margin-top: 1rem;
        }

        .done-button a {
            background-color: #64748b;
            color: #f8fafc;
            padding: 0.6rem 1.3rem;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
        }

        .done-button a:hover {
            background-color: #475569;
        }
    </style>
</head>
<body>

<nav>
    <a href="index.php">Home</a>
    <a href="mission.php">Mission</a>
    <a href="vision.php">Vision</a>
    <a href="learnmore.php">Learn More</a>
    <a href="contact.php">Contact Us</a>
</nav>

<div class="container">
    <h1>Guess Which Face is Real</h1>

    <form action="guess_handler.php" method="post" id="guessForm">
        <input type="hidden" name="selected" id="selectedInput">

        <div class="images">
            <?php foreach ($options as $img): ?>
                <img src="<?php echo $img; ?>" alt="Face Option" data-img="<?php echo htmlspecialchars($img); ?>">
            <?php endforeach; ?>
        </div>

        <div class="submit-section">
            <button type="submit">Submit</button>
        </div>
    </form>

    <div class="done-button">
        <a href="result.php">Done</a>
    </div>
</div>

<script>
    const images = document.querySelectorAll('.images img');
    const hiddenInput = document.getElementById('selectedInput');

    images.forEach(img => {
        img.addEventListener('click', () => {
            images.forEach(i => i.classList.remove('selected')); // Remove from all
            img.classList.add('selected'); // Highlight selected
            hiddenInput.value = img.dataset.img; // Set value to hidden input
        });
    });

    // Optional: prevent submission if nothing is selected
    document.getElementById('guessForm').addEventListener('submit', function (e) {
        if (!hiddenInput.value) {
            alert("Please select an image before submitting!");
            e.preventDefault();
        }
    });
</script>

</body>
</html>
