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
            text-align: center;
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

<div class="container">
    <h2 style="text-align: center;">Welcome to Deepfake Detection AI</h2>


    <h3>What are Deepfakes?</h3>
    <p>
        Deepfakes are synthetic media where a person’s face or voice is replaced with someone else’s using artificial intelligence. 
        While this technology can be entertaining, it can also be dangerous — spreading misinformation, damaging reputations, and threatening online trust.
    </p>

    <h3>Our mission</h3>
    <p>
        Our team developed a deepfake detection AI using the <strong>MesoNet framework</strong> — a lightweight neural network designed to analyze facial cues in images. 
        This project aims to help individuals and organizations verify whether a face image is authentic or AI-generated. 
    </p>

    <p>
        Our model processes uploaded face images and returns whether the image is likely <strong>real</strong> or a <strong>deepfake</strong>, along with a confidence score. 
        All uploads are private and used strictly for evaluation purposes.
    </p>

    <div class="cta">
        <a href="upload.php">Try it for free!</a>
    </div>
    
    <div class="cta">
        <a href="signup.php">Sign in to become a member</a>
    </div>
    
    <div class="cta">
        <a href="login.php">Log in to your account</a>
    </div>

    <footer>
        &copy; <?php echo date("Y"); ?> Deepfake Detection AI. Built with MesoNet.
    </footer>
</div>

</body>
</html>
