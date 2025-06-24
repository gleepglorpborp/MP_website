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
    <p>Upload a face image to check if it is real or AI-generated our AI model.</p>

    <form class="upload-form" action="predict.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*" required><br>
        <input type="submit" value="Check Now">
    </form>

</body>
</html>
