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
            padding: 2rem;
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            color: #38bdf8;
        }

        .images {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .images img {
            width: 300px;
            height: auto;
            border-radius: 12px;
            border: 3px solid #1e293b;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
        }

        .question {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
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
            text-align: center;
            font-size: 0.9rem;
            color: #94a3b8;
        }
    </style>
</head>
<body>

<nav>
    <a href="guess.php">Play Game</a>
    <a href="mission.php">Mission</a>
    <a href="vision.php">Vision</a>
    <a href="contact.php">Contact Us</a>
</nav>

<div class="container">
    <h1>Can you tell the difference between a real and an AI-generated image?</h1>

    <div class="images">
        <img src="../images/real.jpg" alt="Real Face">
        <img src="../images/fake.jpg" alt="Fake Face">
    </div>

    <div class="question">
        Real or Fake?
    </div>

    <div class="question">
        Test and try it out!
    </div>


    <div class="cta">
        <a href="upload.php">Upload an Image to Detect</a>
    </div>
</div>

<footer>
    &copy; <?php echo date("Y"); ?> Deepfake Detection AI. Built with MesoNet.
</footer>

</body>
</html>
