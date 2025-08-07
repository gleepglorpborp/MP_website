<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us - Deepfake Detection</title>
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
            text-align: left;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #38bdf8;
            text-align: center;
        }

        .info-box {
            background-color: #1e293b;
            border-left: 5px solid #38bdf8;
            padding: 1.5rem;
            border-radius: 12px;
            margin-top: 2rem;
            line-height: 1.8;
            color: #e2e8f0;
        }

        .info-box p {
            margin: 0.5rem 0;
        }

        .label {
            font-weight: 600;
            color: #94a3b8;
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
    <a href="contact.php">Contact Us</a>
</nav>

<div class="container">
    <h1>Contact Us</h1>

    <div class="info-box">
        <p><span class="label">Admin Name:</span> Dylon Lau</p>
        <p><span class="label">Email:</span> admin@deepfakedetect.com</p>
        <p><span class="label">Phone:</span> +65 9123 4567</p>
        <p><span class="label">Office Hours:</span> Mon–Fri, 9:00 AM – 5:00 PM</p>
    </div>
</div>

<footer>
    &copy; <?php echo date("Y"); ?> Deepfake Detection AI. Built with MesoNet.
</footer>

</body>
</html>
