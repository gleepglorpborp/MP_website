<?php 
$path = $_GET["path"];
//echo $path;
$input_path = $path;
$web_path = str_replace("../", "/MP_website/", $input_path);

$img ="<img src='$web_path' style='max-width:200px; max-height:200px'><br>";
//secho "File is valid and ready for processing.";
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

<div class="container">
    <?php echo $img ?>
    <p> file is valid and ready for processing </p>
    <div class="cta">
        <a href="upload.php">Upload another image</a>
    </div>
</div>

</body>
</html>
