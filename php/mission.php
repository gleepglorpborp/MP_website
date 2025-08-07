<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Our Mission - Deepfake Detection AI</title>
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

        h1 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            color: #38bdf8;
        }

        h2 {
            color: #38bdf8;
            margin-top: 2rem;
        }

        p {
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 1rem;
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
    <a href="index.php">Home</a>
    <a href="mission.php">Mission</a>
    <a href="vision.php">Vision</a>
    <a href="learnmore.php">Learn More</a>
    <a href="contact.php">Contact Us</a>
</nav>

<div class="container">
    <h1>Our Mission</h1>

    <p>
        Our team developed a deepfake detection AI using the <strong>MesoNet framework</strong> — a lightweight neural network designed to analyze facial cues in images.
        This project aims to help individuals and organizations verify whether a face image is authentic or AI-generated.
    </p>

    <p>
        We believe that misinformation and media manipulation are growing threats in the digital era. Our mission is to empower people with accessible tools to identify deepfakes,
        raise awareness about synthetic media, and promote a safer online environment for everyone.
    </p>

    <p>
        Our system processes uploaded face images and returns whether the image is likely <strong>real</strong> or a <strong>deepfake</strong>, along with a confidence score.
        All uploads are private and used strictly for evaluation purposes.
    </p>

    <p>
        Whether you're a student, journalist, or casual social media user, Deepfake Detection AI helps you verify images and make informed decisions before trusting what you see online.
    </p>
</div>

<footer>
    &copy; <?php echo date("Y"); ?> Deepfake Detection AI. Built with MesoNet.
</footer>

</body>
</html>
